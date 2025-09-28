<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description"content="ACCUEIL GameLink">
        <title>Recherche | GameLink</title>
        <link rel="stylesheet" href="CSS/HEADER.css" type="text/css"/>
        <link rel="stylesheet" href="CSS/STYLE_RECHERCHE.css" type="text/css"/>
        <link rel="stylesheet" href="/PA/CSS/GAME_CARD.css">
        <link rel="icon" type="image/png" sizes="32x32" href="ICON/LogoFinal.svg">
    </head>
    <body>
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
            <section class="search-area">
                <form class="search" role="search" action="RECHERCHE.php" method="get"> 
                    <input type="text" type="search"
                        placeholder="Titre du jeu, platforme, genre, etc..." 
                        autocomplete="off"/>
                    <img src="ICON/loupe.png" alt="Icône de loupe" />
                    
                </form>

                <div class="filters">
                    <button class="chip">Plateformes</button>
                    <button class="chip">Genres</button>
                    <button class="chip">Autres</button>
                    <button class="chip">Note</button>
                    <button class="chip">Trier</button>
                    <button class="chip">Date</button>
                </div>
            </section>

            <section>
                <ul id="Game-list"></ul>
            </section>  
        
        </main>
        <script src="/PA/JS/RECHERCHE.js?v=3" defer></script>
    </body>