<?php
/* Smarty version 4.0.0, created on 2022-06-07 11:44:35
  from 'C:\xampp\htdocs\webdip-projekt\predlošci\dodaj_drzavu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_629f1e03861e51_70630416',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '06d2c52f2ab6c72cafdaf7f6ec7d5d021f7abf5f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\webdip-projekt\\predlošci\\dodaj_drzavu.tpl',
      1 => 1654543593,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629f1e03861e51_70630416 (Smarty_Internal_Template $_smarty_tpl) {
?><main id="main" class="main">
    <div class="main__inner">
        <div class="main__form-container">
            <div class="main__form-message">
                <?php if ((isset($_GET['country'])) && $_GET['country'] == "created") {?>
                    <p class="main__form-success">Država uspješno dodana!</p>
                <?php } elseif ((isset($_GET['country'])) && $_GET['country'] == "updated") {?>
                    <p class="main__form-success">Država uspješno ažurirana!</p>
                <?php }?>
            </div>
            <form id="login-form" method="post" action="dodaj_drzavu.php" class="main__form">
                <div class="main__form-element">
                    <label for="name">Naziv države:</label><br>
                    <input type="text" name="name" id="name" class="form__input" value="<?php if ($_smarty_tpl->tpl_vars['country']->value != '') {
echo $_smarty_tpl->tpl_vars['country']->value->naziv;
}?>">
                    <p class="main__form-error">
                        <?php if ((isset($_GET['error'])) && $_GET['error'] == "emptyvalues") {?>
                            Polje ne smije biti prazno!
                        <?php } elseif ((isset($_GET['error'])) && $_GET['error'] == "namelength") {?>
                            Naziv smije imati najviše 45 znakova!
                        <?php } elseif ((isset($_GET['error'])) && $_GET['error'] == "namechars") {?>
                            Naziv ne može sadržavati brojeve i <br> prvi znak ne smije biti razmak!
                        <?php }?>
                    </p>
                </div>
                <div class="main__form-element">
                    <label for="label">Oznaka:</label><br>
                    <input type="text" name="label" id="label" class="form__input" value="<?php if ($_smarty_tpl->tpl_vars['country']->value !== '') {
echo $_smarty_tpl->tpl_vars['country']->value->oznaka;
}?>">
                    <p class="main__form-error">
                        <?php if ((isset($_GET['error'])) && $_GET['error'] == "emptyvalues") {?>
                            Polje ne smije biti prazno!
                        <?php } elseif ((isset($_GET['error'])) && $_GET['error'] == "labellength") {?>
                            Oznaka smije imati najviše 3 znaka!
                        <?php } elseif ((isset($_GET['error'])) && $_GET['error'] == "labelchars") {?>
                            Oznaka ne može sadržavati brojeve i <br> prvi znak ne smije biti razmak!
                        <?php }?>
                    </p>
                </div>
                <div class="main__form-element">
                    <label for="continent">Kontinent:</label><br>
                    <input type="text" name="continent" id="continent" class="form__input" value="<?php if ($_smarty_tpl->tpl_vars['country']->value !== '') {
echo $_smarty_tpl->tpl_vars['country']->value->kontinent;
}?>">
                    <p class="main__form-error">
                        <?php if ((isset($_GET['error'])) && $_GET['error'] == "emptyvalues") {?>
                            Polje ne smije biti prazno!
                        <?php } elseif ((isset($_GET['error'])) && $_GET['error'] == "continentlength") {?>
                            Kontinent smije imati najviše 15 znakova!
                        <?php } elseif ((isset($_GET['error'])) && $_GET['error'] == "continentchars") {?>
                            Kontinent ne može sadržavati brojeve i <br> prvi znak ne smije biti razmak!
                        <?php }?>
                    </p>
                </div>
                <div class="main__form-element">
                    <input type="submit" name="submit" id="submit" 
                    value="<?php if ((isset($_GET['countryid']))) {?>Ažuriraj državu<?php } else { ?>Dodaj državu<?php }?>" class="form__button">
                </div>
            </form>
        </div>
    </div>
</main><?php }
}
