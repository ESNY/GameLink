const API_BASE = '/PA/API/igdb_top.php';
const LIST_ID  = 'Game-list';

const urlFor = q => q ? `${API_BASE}?q=${encodeURIComponent(q)}` : API_BASE;

async function load(q = '') {
  const root = document.getElementById(LIST_ID);
  if (!root) return console.error(`#${LIST_ID} introuvable`);
  root.innerHTML = '<p style="color:#fff;opacity:.8">Chargement…</p>';

  try {
    const res = await fetch(urlFor(q), { cache: 'no-store' });
    if (!res.ok) throw new Error('HTTP ' + res.status);
    const data = await res.json();

    root.replaceChildren();
    if (!Array.isArray(data) || data.length === 0) {
      root.textContent = 'Aucun jeu.'; return;
    }
    const frag = document.createDocumentFragment();
    data.forEach(g => {
      const card = document.createElement('article');
      card.className = 'game-card';

      const img = document.createElement('img');
      img.className = 'game-card__cover';
      img.src = g.cover || `https://placehold.co/264x352?text=${encodeURIComponent(g.name)}`;
      img.alt = g.name;

      const h3 = document.createElement('h3');
      h3.className = 'game-card__title';
      h3.textContent = g.name;

      card.append(img, h3);
      frag.appendChild(card);
    });

    root.appendChild(frag);
    console.log('[OK] chargés :', data.length, 'jeux', q ? `(q=${q})` : '(top)');
  } catch (e) {
    console.error(e);
    root.textContent = 'Erreur de chargement.';
  }
}

// 1) Afficher un TOP au chargement
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => load());
} else {
  load();
}

// 2) Brancher la recherche (Enter ou submit)
document.addEventListener('DOMContentLoaded', () => {
  // On essaie plusieurs sélecteurs pour trouver TON input
  const input =
    document.getElementById('search-input') ||
    document.querySelector('form#search-form input[type="search"]') ||
    document.querySelector('.search input') ||
    document.querySelector('input[type="search"]') ||
    document.querySelector('input[placeholder^="Titre du jeu"]');

  if (!input) {
    console.warn('Champ de recherche introuvable — ajoute un id="search-input" si besoin');
    return;
  }

  // 2a) Si l’input est dans un <form>, on intercepte le submit
  const form = input.form || document.getElementById('search-form');
  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      load(input.value.trim());
    });
  }

  // 2b) Au cas où il n’y a PAS de <form>, Enter déclenche la recherche
  input.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') {
      e.preventDefault();
      load(input.value.trim());
    }
  });

  // Option : si on efface tout, revenir au TOP
  input.addEventListener('input', () => {
    if (input.value.trim() === '') load();
  });
});
