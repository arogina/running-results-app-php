<?php
/* Smarty version 4.0.0, created on 2022-06-01 12:39:22
  from 'C:\xampp\htdocs\webdip-projekt\predlošci\prijava.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_629741daebf3c3_69167282',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '57c27ca7cd8ec34c42361d606743635cdc0630f2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\webdip-projekt\\predlošci\\prijava.tpl',
      1 => 1654079943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629741daebf3c3_69167282 (Smarty_Internal_Template $_smarty_tpl) {
?><main id="main" class="main">
    <div class="main__inner">
        <div class="main__form-container">
            <div class="main__form-message">
                <?php if ((isset($_GET['user'])) && $_GET['user'] == "blocked") {?>
                    <p class="main__form-error bigger">Korisnik je blokiran!</p>
                <?php }?>
            </div>
            <form id="login-form" method="post" action="../skripte/prijava.validacija.php" class="main__form">
                <div class="main__form-element">
                    <label for="username">Korisničko ime:</label><br>
                    <input type="text" name="username" id="username" class="form__input"
                    value="<?php if ((isset($_COOKIE['remember_me']))) {
echo $_COOKIE['remember_me'];
}?>">
                    <p class="main__form-error"></p>
                </div>
                <div class="main__form-element">
                    <label for="username">Lozinka:</label><br>
                    <input type="password" name="password" id="password" class="form__input">
                    <p class="main__form-error"></p>
                </div>
                <div class="main__form-element checkbox">
                    <input type="checkbox" name="remember-me" id="remember-me">
                    <label for="remember-me">Zapamti me?</label>
                </div>
                <div class="main__form-element">
                    <input type="submit" name="submit" id="submit" value="Prijavi se" class="form__button">
                </div>
            </form>
            <a href="#" class="main__form-link">Zaboravljena lozinka?</a>
        </div>
    </div>
</main><?php }
}
