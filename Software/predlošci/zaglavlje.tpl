<!DOCTYPE html>
    <html lang="hr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Alan Rogina">
        <meta name="description" content="Aplikacija za upravljanje utrkama trčanja i praćenja svojih rezultata">
        <link rel="stylesheet" href="{$path}/css/style.css">
        <title>{$title}</title>
        {if $subtitle === "Registracija"}
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        {/if}
    </head>

    <body>
        <header class="header">
            <div class="header__right">
                <div id="hamburger" class="header__hamburger-container">
                    <div class="hamburger__line"></div>
                    <div class="hamburger__line"></div>
                    <div class="hamburger__line"></div>
                </div>
                <a href="{$path}/index.php" class="header__logo">
                    <img src="{$path}/materijali/logo.jpeg" alt="logo" class="header__logo-img">
                    <p class="header__logo-text">Trčanje</p>
                </a>
            </div>
            <h1 id="subtitle" class="header__title">{$subtitle}</h1>
            {if !isset($smarty.session.user_id)}
                <div class="header__buttons">
                    <a href="{$path}/obrasci/prijava.php" class="button__primary">Prijava</a>
                    <a href="{$path}/obrasci/registracija.php" class="button__primary">Registracija</a>
                </div>
            {else}
                <p class="header__message">Pozdrav, {$smarty.session.username}!</p>
            {/if}
        </header>
        <nav id="nav" class="navbar">
            <a href="{$path}/index.php" class="navbar__link">Početna</a>
            {if isset($smarty.session.user_id)}
                <div class="navbar__dropdown">
                    <a href="#" class="navbar__dropdown-btn navbar__link">Utrke ></a>
                    <div class="navbar__dropdown-content">
                        {if isset($smarty.session.user_id) && $smarty.session.role > 1}
                            <a href="{$path}/utrke.php" class="navbar__link">Sve utrke</a>
                        {/if}
                        <a href="{$path}/prijavljene_utrke.php" class="navbar__link">Prijavljene utrke</a>
                        <a href="{$path}/buduce_utrke.php" class="navbar__link">Buduće utrke</a>
                    </div>
                </div>
            {/if}
            {if isset($smarty.session.user_id) && $smarty.session.role > 1}
                <div class="navbar__dropdown">
                    <a href="#" class="navbar__dropdown-btn navbar__link">Etape ></a>
                    <div class="navbar__dropdown-content">
                        <a href="{$path}/etape.php" class="navbar__link">Popis etapa</a>
                    </div>
                </div>
            {/if}
            {if isset($smarty.session.user_id) && $smarty.session.role == 3}
                <div class="navbar__dropdown">
                    <a href="#" class="navbar__dropdown-btn navbar__link">Države ></a>
                    <div class="navbar__dropdown-content">
                        <a href="{$path}/popis_drzava.php" class="navbar__link">Popis država</a>
                    </div>
                </div>
            {/if}
            <a href="{$path}/galerija.php" class="navbar__link">Galerija slika</a>
            <a href="{$path}/rang_lista.php" class="navbar__link">Rang lista</a>
            <a href="{$path}/dokumentacija.php" class="navbar__link">Dokumentacija</a>
            <a href="{$path}/o_autoru.php" class="navbar__link">O autoru</a>
            {if isset($smarty.session.user_id)}
                <a href="{$path}/odjava.php" class="navbar__link">Odjava</a>
            {/if}
        </nav>