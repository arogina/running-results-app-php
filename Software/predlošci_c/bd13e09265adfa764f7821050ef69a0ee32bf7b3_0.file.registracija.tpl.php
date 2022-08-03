<?php
/* Smarty version 4.0.0, created on 2022-06-04 11:06:59
  from 'C:\xampp\htdocs\webdip-projekt\predlošci\registracija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_629b20b3c997f8_67467783',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd13e09265adfa764f7821050ef69a0ee32bf7b3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\webdip-projekt\\predlošci\\registracija.tpl',
      1 => 1654333602,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629b20b3c997f8_67467783 (Smarty_Internal_Template $_smarty_tpl) {
?><main id="main" class="main">
    <div class="main__inner">
        <div class="main__form-container">
            <div class="main__form-message">
                <?php if ((isset($_GET['success'])) && $_GET['success'] == "true") {?>
                    <p class="main__form-success">Uspješna registracija! <br>Na mail je poslan link za aktivaciju korisničkog računa!</p>
                <?php }?>
            </div>
            <form id="register-form" method="post" action="registracija.php" class="main__form">
                <div class="main__form-element">
                    <label for="name">Ime:</label><br>
                    <input type="text" name="name" id="name" class="form__input">
                    <div id="error-name" class="main__form-error">
                    <?php if ((isset($_GET['error'])) && $_GET['error'] == "emptyvalues") {?>
                        Polje ne smije biti prazno!
                    <?php } elseif ((isset($_GET['error'])) && $_GET['error'] == "invalidname") {?>
                        Ime ne može sadržavati brojeve (0-9)<br> ili razmak!
                    <?php }?>
                    </div>
                </div>
                <div class="main__form-element">
                    <label for="surname">Prezime:</label><br>
                    <input type="text" name="surname" id="surname" class="form__input">
                    <div id="error-surname" class="main__form-error">
                    <?php if ((isset($_GET['error'])) && $_GET['error'] == "emptyvalues") {?>
                        Polje ne smije biti prazno!
                    <?php } elseif ((isset($_GET['error'])) && $_GET['error'] == "invalidsurname") {?>
                        Prezime ne može sadržavati brojeve (0-9)<br> ili razmak!
                    <?php }?>
                    </div>
                </div>
                <div class="main__form-element">
                    <label for="username">Korisničko ime:</label><br>
                    <input type="text" name="username" id="username" class="form__input">
                    <div id="error-username" class="main__form-error">
                    <?php if ((isset($_GET['error'])) && $_GET['error'] == "emptyvalues") {?>
                        Polje ne smije biti prazno!
                    <?php } elseif ((isset($_GET['error'])) && $_GET['error'] == "invalidusername") {?>
                        Korisničko ime ne može započeti s <br> brojevima (0-9) ili razmakom!
                    <?php }?>
                    </div>
                </div>
                <div class="main__form-element">
                    <label for="email">E-mail:</label><br>
                    <input type="email" name="email" id="email" class="form__input">
                    <div id="error-email" class="main__form-error">
                    <?php if ((isset($_GET['error'])) && $_GET['error'] == "emptyvalues") {?>
                        Polje ne smije biti prazno!
                    <?php } elseif ((isset($_GET['error'])) && $_GET['error'] == "invalidemail") {?>
                        Nevažeći email!
                    <?php }?>
                    </div>
                </div>
                <div class="main__form-element">
                    <label for="password">Lozinka:</label><br>
                    <input type="password" name="password" id="password" class="form__input">
                    <div id="error-password" class="main__form-error">
                    <?php if ((isset($_GET['error'])) && $_GET['error'] == "emptyvalues") {?>
                        Polje ne smije biti prazno!
                    <?php } elseif ((isset($_GET['error'])) && $_GET['error'] == "passwordchars") {?>
                        Lozinka mora sadržavati velika i mala slova,<br> brojeve te specijalne znakove (!*?#$.)
                    <?php } elseif ((isset($_GET['error'])) && $_GET['error'] == "passwordlength") {?>
                        Lozinka mora sadržavati najmanje 8 znakova!
                    <?php }?>
                    </div>
                </div>
                <div class="main__form-element">
                    <label for="confirm-password">Potvrda lozinke:</label><br>
                    <input type="password" name="confirm-password" id="confirm-password" class="form__input">
                    <div id="error-confpassword" class="main__form-error">
                    <?php if ((isset($_GET['error'])) && $_GET['error'] == "emptyvalues") {?>
                        Polje ne smije biti prazno!
                    <?php } elseif ((isset($_GET['error'])) && $_GET['error'] == "confirmpassword") {?>
                        Lozinke moraju biti iste!
                    <?php }?>
                    </div>
                </div>
                <div class="main__form-element checkbox">
                    <input type="checkbox" name="terms" id="terms">
                    <label for="terms">Uvjeti korištenja</label>
                    <div class="main__form-error"></div>
                </div>
                <div class="main__form-element">
                    <div class="g-recaptcha" data-sitekey="6LeBhjUgAAAAAH137gAmGaKyuhipesksVglcTSPC"></div>
                    <div class="main__form-error">
                    <?php if ((isset($_GET['error'])) && $_GET['error'] == "recaptchafalse") {?>
                        Potrebno je potvrditi reCAPTCHA polje!
                    <?php }?>
                    </div>
                </div>
                <div class="main__form-element">
                    <input type="submit" name="submit" id="submit" value="Registriraj se" class="form__button">
                </div>
            </form>
        </div>
    </div>
</main><?php }
}
