
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <title>Admin | GameLink</title>
  <link rel="stylesheet" href="CSS/HEADER.css" type="text/css"/>
  <link rel="stylesheet" href="CSS/STYLE_ADMIN.css" type="text/css"/>
  <link rel="icon" type="image/png" sizes="32x32" href="ICON/LogoFinal.svg">
</head>

<body class="admin">
  <header>
            <nav class="Menu">
                <a href="">
                    <img  class="logo" src="ICON/LogoComplet.svg" alt="Logo GameLink" width="">
                </a>
                <a href="ACCUEIL.php">ACCUEIL</a>
                <a href="RECHERCHE.php">RECHERCHE</a>
                <a href="COMMUNAUTE.php">COMMUNAUTÉ</a>
                <a href="ADMIN.php">ADMIN</a>
            </nav>
            <a href="">
                <img src="ICON/iconProfil.svg" alt="Logo Profil" width="">
            </a>
  </header>
  
  <main>
    <section class="admin-surface">

      
      <div class="kpi-row">
        <div class="kpi-card">
          <div class="kpi-label">DAU :</div>
          <div class="kpi-main">
            <span class="kpi-value">1,785</span>
            <span class="delta up">▲ +1,4%</span>
          </div>
        </div>
        <div class="kpi-card">
          <div class="kpi-label">Connexions (temps réel) :</div>
          <div class="kpi-main">
            <span class="kpi-value">2,762</span>
            <span class="delta down">▼ −9,2%</span>
          </div>
        </div>
        <div class="kpi-card">
          <div class="kpi-label">Nouvelles inscriptions :</div>
          <div class="kpi-main">
            <span class="kpi-value">2,762</span>
            <span class="delta up">▲ +6,02%</span>
          </div>
        </div>
        <div class="kpi-card">
          <div class="kpi-label">Signalements (jours) :</div>
          <div class="kpi-main">
            <span class="kpi-value">171</span>
            <span class="delta up">▲ +71,0%</span>
          </div>
        </div>
      </div>

    
      <div class="admin-grid">
        <div class="stack">
          <div class="card chart">
            <div class="card-title">Signalements journaliers</div>
            <div class="chart-placeholder"></div>
          </div>
          <div class="card chart">
            <div class="card-title">Utilisateurs actifs en temps réel</div>
            <div class="chart-placeholder"></div>
          </div>
        </div>

  
        <div class="card chart big">
          <div class="card-title">—</div>
          <div class="chart-placeholder"></div>
        </div>

        
        <aside class="card sidecard">
          <div class="card-title">TOP jeux joués actuellement</div>
          <ul class="toplist">
            <li><span>League of Legends</span><b>1250</b></li>
            <li><span>CS:GO</span><b>1077</b></li>
            <li><span>FIFA</span><b>977</b></li>
            <li><span>Valorant</span><b>905</b></li>
            <li><span>Minecraft</span><b>859</b></li>
            <li><span>Fortnite</span><b>623</b></li>
            <li><span>Roblox</span><b>567</b></li>
          </ul>
        </aside>
      </div>

      
      <div class="reports-grid">
        <section class="card">
          <div class="card-title">Contenu signalé</div>
          <table class="report-table">
            <thead>
              <tr>
                <th>Users</th>
                <th>Contenu</th>
                <th>Raison</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><span class="avatar"></span>Zepkenio77</td>
                <td>« salopard mid diff »</td>
                <td>Inapproprié</td>
                <td>OCT 6</td>
              </tr>
              <tr>
                <td><span class="avatar"></span>YUIAuber</td>
                <td>« report noob botlane »</td>
                <td>Inapproprié</td>
                <td>OCT 6</td>
              </tr>
              <tr>
                <td><span class="avatar"></span>SamsiLaFrappe</td>
                <td>« esp3ce de retard »</td>
                <td>Inapproprié</td>
                <td>OCT 6</td>
              </tr>
              <tr>
                <td><span class="avatar"></span>CiscoKillerDu92</td>
                <td>« go troll dog »</td>
                <td>Inapproprié</td>
                <td>OCT 6</td>
              </tr>
            </tbody>
          </table>
        </section>

        <aside class="card alert-card">
          <div class="alert-icon"⚠️</div>
          <div class="alert-text">Surveillez la hausse des signalements.</div>
        </aside>
      </div>

      </section>
    </div>
  </main>
</body>
</html>
