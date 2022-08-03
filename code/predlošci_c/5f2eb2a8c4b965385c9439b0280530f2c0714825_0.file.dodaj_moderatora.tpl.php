<?php
/* Smarty version 4.0.0, created on 2022-06-06 09:49:37
  from 'C:\xampp\htdocs\webdip-projekt\predlošci\dodaj_moderatora.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_629db191763cb3_34974536',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f2eb2a8c4b965385c9439b0280530f2c0714825' => 
    array (
      0 => 'C:\\xampp\\htdocs\\webdip-projekt\\predlošci\\dodaj_moderatora.tpl',
      1 => 1654501775,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629db191763cb3_34974536 (Smarty_Internal_Template $_smarty_tpl) {
?><main id="main" class="main">
    <div class="main__inner">
        <div class="main__form-container">
            <div class="main__form-message">
                <?php if ((isset($_GET['user'])) && $_GET['user'] == "mod") {?>
                    <p class="main__form-success">Uspješno ste dodali moderatora!</p>
                <?php } elseif ((isset($_GET['error'])) && $_GET['error'] == "alreadymod") {?>
                    <p class="main__form-error bigger">Korisnik već moderira ovu državu!</p>
                <?php }?>
            </div>
            <form id="sign-race-form" method="post" action="./dodaj_moderatora.php" class="main__form">
                <div class="main__form-element">
                    <label for="country">Država</label><br>
                    <input type="text" name="country" id="country" class="form__input"
                    value="<?php if ((isset($_COOKIE['countryid']))) {
echo $_smarty_tpl->tpl_vars['country']->value->naziv;
}?>" disabled>
                    <p class="main__form-error"></p>
                </div>
                <div class="main__form-element">
                    <label for="users">Korisnik:</label><br>
                    <select name="users" class="form__input select">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                            <option name="<?php echo $_smarty_tpl->tpl_vars['user']->value["username"];?>
" value="<?php echo $_smarty_tpl->tpl_vars['user']->value["id"];?>
">
                                <?php echo $_smarty_tpl->tpl_vars['user']->value["username"];?>

                            </option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
                <div class="main__form-element">
                    <input type="submit" name="submit" id="submit" value="Dodaj moderatora" class="form__button">
                </div>
            </form>
        </div>
    </div>
</main><?php }
}
