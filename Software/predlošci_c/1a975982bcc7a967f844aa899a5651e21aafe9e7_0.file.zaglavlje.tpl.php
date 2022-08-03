<?php
/* Smarty version 4.0.0, created on 2022-06-07 08:58:10
  from 'C:\xampp\htdocs\webdip-projekt\predlošci\zaglavlje.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_629ef70261c476_88101632',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a975982bcc7a967f844aa899a5651e21aafe9e7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\webdip-projekt\\predlošci\\zaglavlje.tpl',
      1 => 1654585087,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629ef70261c476_88101632 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
    <html lang="hr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Alan Rogina">
        <meta name="description" content="Aplikacija za upravljanje utrkama trčanja i praćenja svojih rezultata">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/css/style.css">
        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
        <?php if ($_smarty_tpl->tpl_vars['subtitle']->value === "Registracija") {?>
            <?php echo '<script'; ?>
 src="https://www.google.com/recaptcha/api.js" async defer><?php echo '</script'; ?>
>
        <?php }?>
    </head>

    <body>
        <header class="header">
            <div class="header__right">
                <div id="hamburger" class="header__hamburger-container">
                    <div class="hamburger__line"></div>
                    <div class="hamburger__line"></div>
                    <div class="hamburger__line"></div>
                </div>
                <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/index.php" class="header__logo">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/materijali/logo.jpeg" alt="logo" class="header__logo-img">
                    <p class="header__logo-text">Trčanje</p>
                </a>
            </div>
            <h1 id="subtitle" class="header__title"><?php echo $_smarty_tpl->tpl_vars['subtitle']->value;?>
</h1>
            <?php if (!(isset($_SESSION['user_id']))) {?>
                <div class="header__buttons">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/obrasci/prijava.php" class="button__primary">Prijava</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/obrasci/registracija.php" class="button__primary">Registracija</a>
                </div>
            <?php } else { ?>
                <p class="header__message">Pozdrav, <?php echo $_SESSION['username'];?>
!</p>
            <?php }?>
        </header>
        <nav id="nav" class="navbar">
            <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/index.php" class="navbar__link">Početna</a>
            <?php if ((isset($_SESSION['user_id']))) {?>
                <div class="navbar__dropdown">
                    <a href="#" class="navbar__dropdown-btn navbar__link">Utrke ></a>
                    <div class="navbar__dropdown-content">
                        <?php if ((isset($_SESSION['user_id'])) && $_SESSION['role'] > 1) {?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/utrke.php" class="navbar__link">Sve utrke</a>
                        <?php }?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/prijavljene_utrke.php" class="navbar__link">Prijavljene utrke</a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/buduce_utrke.php" class="navbar__link">Buduće utrke</a>
                    </div>
                </div>
            <?php }?>
            <?php if ((isset($_SESSION['user_id'])) && $_SESSION['role'] > 1) {?>
                <div class="navbar__dropdown">
                    <a href="#" class="navbar__dropdown-btn navbar__link">Etape ></a>
                    <div class="navbar__dropdown-content">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/etape.php" class="navbar__link">Popis etapa</a>
                    </div>
                </div>
            <?php }?>
            <?php if ((isset($_SESSION['user_id'])) && $_SESSION['role'] == 3) {?>
                <div class="navbar__dropdown">
                    <a href="#" class="navbar__dropdown-btn navbar__link">Države ></a>
                    <div class="navbar__dropdown-content">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/popis_drzava.php" class="navbar__link">Popis država</a>
                    </div>
                </div>
            <?php }?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/galerija.php" class="navbar__link">Galerija slika</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/rang_lista.php" class="navbar__link">Rang lista</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/dokumentacija.php" class="navbar__link">Dokumentacija</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/o_autoru.php" class="navbar__link">O autoru</a>
            <?php if ((isset($_SESSION['user_id']))) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/odjava.php" class="navbar__link">Odjava</a>
            <?php }?>
        </nav><?php }
}
