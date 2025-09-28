<?php
// /PA/API/igdb_top.php
// ------------------------------------------------------------------
// Renvoie du JSON : 500 jeux (name, cover) depuis IGDB.
// - Sans "q"  : top populaire aléatoire (on prend 40, on mélange, on garde 500)
// - Avec "q"  : recherche texte (on garde 500)
// ------------------------------------------------------------------

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate');

const IGDB_CLIENT_ID = 'spy0n0vev24kqu6gg3m6t9gh0a9d6r';
const IGDB_TOKEN     = 'cqdy5e7cw51circ2o5c59yv1ngjm9i'; // token "client_credentials" (expire régulièrement)

$q = isset($_GET['q']) ? trim($_GET['q']) : '';

// Body IGDB (API Query Language)
if ($q !== '') {
  // Recherche par texte (500 résultats)
  $qEsc = addslashes($q); // échappe guillemets pour la requête IGDB
  $body = 'search "' . $qEsc . '"; '
        . 'fields name, cover.image_id; '
        . 'where cover != null; '
        . 'limit 500;';
} else {
  // Top populaire (on en demande 40, on mélangera ensuite côté PHP)
  $body = 'fields name, cover.image_id; '
        . 'where cover != null; '
        . 'sort popularity desc; '
        . 'limit 500;';
}

// Appel IGDB via cURL (POST + headers)
$ch = curl_init('https://api.igdb.com/v4/games');
curl_setopt_array($ch, [
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POST => true,
  CURLOPT_HTTPHEADER => [
    'Client-ID: ' . IGDB_CLIENT_ID,
    'Authorization: Bearer ' . IGDB_TOKEN,
    'Accept: application/json',
    'Content-Type: text/plain'
  ],
  CURLOPT_POSTFIELDS => $body,
  CURLOPT_TIMEOUT => 12,
]);
$resp = curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$err  = curl_error($ch);
curl_close($ch);

// Gestion d’erreurs réseau / HTTP
if ($resp === false) {
  http_response_code(502);
  echo json_encode(['error' => 'IGDB request failed', 'details' => $err], JSON_UNESCAPED_UNICODE);
  exit;
}
if ($code >= 400) {
  http_response_code($code);
  echo json_encode(['error' => 'IGDB HTTP '.$code, 'details' => $resp], JSON_UNESCAPED_UNICODE);
  exit;
}

// Parse JSON IGDB
$data = json_decode($resp, true);
if (!is_array($data)) {
  http_response_code(502);
  echo json_encode(['error' => 'Invalid JSON from IGDB', 'raw' => substr($resp,0,200)], JSON_UNESCAPED_UNICODE);
  exit;
}

// Option 2 : si pas de recherche, mélange et garde 500
if ($q === '') {
  shuffle($data);
  $data = array_slice($data, 0, 500);
}

// Output minimal propre pour le front
$out = array_map(function($g){
  return [
    'id'    => $g['id'] ?? null,
    'name'  => $g['name'] ?? '',
    'cover' => isset($g['cover']['image_id'])
      ? 'https://images.igdb.com/igdb/image/upload/t_cover_big/' . $g['cover']['image_id'] . '.jpg'
      : null
  ];
}, $data);

echo json_encode($out, JSON_UNESCAPED_UNICODE);
