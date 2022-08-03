<?php
/* Smarty version 4.0.0, created on 2022-06-03 14:32:32
  from 'C:\xampp\htdocs\webdip-projekt\predlošci\prijava_utrke.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_6299ff60011265_14327375',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cdf3e3060af5e1b45ce6076916d56035610986b1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\webdip-projekt\\predlošci\\prijava_utrke.tpl',
      1 => 1654259545,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6299ff60011265_14327375 (Smarty_Internal_Template $_smarty_tpl) {
?><main id="main" class="main">
    <div class="main__inner">
        <div class="main__form-container">
            <div class="main__form-message">
                <?php if ((isset($_GET['race'])) && $_GET['race'] == "signed") {?>
                    <p class="main__form-success">Uspješno ste prijavili utrku!</p>
                <?php } elseif ((isset($_GET['race'])) && $_GET['race'] == "updated") {?>
                    <p class="main__form-success">Uspješno ste ažurirali prijavu!</p>
                <?php } elseif ((isset($_GET['error'])) && $_GET['error'] == "alreadysigned") {?>
                    <p class="main__form-error bigger">Već ste prijavili ovu utrku!</p>
                <?php }?>
            </div>
            <form id="sign-race-form" method="post" action="./prijava_utrke.php" class="main__form" enctype="multipart/form-data">
                <div class="main__form-element">
                    <label for="race">Utrka:</label><br>
                    <select name="race" class="form__input select">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['races']->value, 'race');
$_smarty_tpl->tpl_vars['race']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['race']->value) {
$_smarty_tpl->tpl_vars['race']->do_else = false;
?>
                            <option name="<?php echo $_smarty_tpl->tpl_vars['race']->value["name"];?>
" value="<?php echo $_smarty_tpl->tpl_vars['race']->value["id"];?>
" 
                            <?php if ((isset($_GET['raceid'])) && $_GET['raceid'] == $_smarty_tpl->tpl_vars['race']->value["id"]) {?>selected<?php }?>>
                                <?php echo $_smarty_tpl->tpl_vars['race']->value["name"];?>

                            </option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
                <div class="main__form-element">
                    <label for="birth-date">Godina rođenja:</label><br>
                    <input type="text" name="birth-date" id="birth-date" class="form__input"
                    value="<?php if ((isset($_GET['raceid']))) {
echo $_smarty_tpl->tpl_vars['birth_date']->value;
}?>">
                    <p class="main__form-error">
                        <?php if ((isset($_GET['error'])) && $_GET['error'] == "emptydate") {?>
                            Polje ne smije biti prazno!
                        <?php } elseif ((isset($_GET['error'])) && $_GET['error'] == "baddate") {?>
                            Godina smije sadržavati samo brojeve i <br> ne smije biti veća od 4 znaka.
                        <?php }?>
                    </p>
                </div>
                <div class="main__form-element">
                    <label for="picture">Slika:</label><br>
                    <input type="file" name="picture" id="picture" class="form__input">
                    <p class="main__form-error">
                        <?php if ((isset($_GET['error'])) && $_GET['error'] == "emptyfile") {?>
                            Potrebno je uploadati sliku!
                        <?php } elseif ((isset($_GET['error'])) && $_GET['error'] == "badextension") {?>
                            Datoteka smije imati sljedeće ekstenzije: .jpg ili .png.
                        <?php } elseif ((isset($_GET['error'])) && $_GET['error'] == "largefile") {?>
                            Slika ne smije biti veća od 1MB!
                        <?php }?>
                    </p>
                </div>
                <div class="main__form-element">
                    <input type="submit" name="submit" id="submit" value="Prijavi utrku" class="form__button">
                </div>
            </form>
        </div>
    </div>
</main><?php }
}
