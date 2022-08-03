<?php
/* Smarty version 4.0.0, created on 2022-06-06 21:23:29
  from 'C:\xampp\htdocs\webdip-projekt\predlošci\dodaj_utrku.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_629e5431c1a7c5_42483405',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f2e4c992718aed0994045d5816d75c5e154927c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\webdip-projekt\\predlošci\\dodaj_utrku.tpl',
      1 => 1654543374,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629e5431c1a7c5_42483405 (Smarty_Internal_Template $_smarty_tpl) {
?><main id="main" class="main">
    <div class="main__inner">
        <div class="main__form-container">
            <div class="main__form-message">
                <?php if ((isset($_GET['race'])) && $_GET['race'] == "created") {?>
                    <p class="main__form-success">Uspješno ste dodali utrku!</p>
                <?php } elseif ((isset($_GET['race'])) && $_GET['race'] == "updated") {?>
                    <p class="main__form-success">Uspješno ste ažurirali utrku!</p>
                <?php }?>
            </div>
            <form id="add-race-form" method="post" action="./dodaj_utrku.php" class="main__form">
                <div class="main__form-element">
                    <label for="race">Naziv utrke:</label><br>
                    <input type="text" name="race" id="race" class="form__input" value="<?php if ($_smarty_tpl->tpl_vars['race']->value != '') {
echo $_smarty_tpl->tpl_vars['race']->value->naziv;
}?>">
                    <p class="main__form-error">
                        <?php if ((isset($_GET['error'])) && $_GET['error'] == "emptyvalues") {?>
                            Polje ne smije biti prazno!
                        <?php }?>
                    </p>
                </div>
                <div class="main__form-element">
                    <label for="due-date">Rok prijave:</label><br>
                    <input type="date" name="due-date" id="due-date" class="form__input" value="<?php if ($_smarty_tpl->tpl_vars['race']->value != '') {
echo $_smarty_tpl->tpl_vars['race']->value->rok_prijave;
}?>">
                    <p class="main__form-error">
                        <?php if ((isset($_GET['error'])) && $_GET['error'] == "emptyvalues") {?>
                            Polje ne smije biti prazno!
                        <?php }?>
                    </p>
                </div>
                <div class="main__form-element">
                    <label for="race-type">Tip utrke:</label><br>
                    <select id="race-type" name="race-type" class="form__input select">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['types']->value, 'type');
$_smarty_tpl->tpl_vars['type']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->do_else = false;
?>
                        <option name="<?php echo $_smarty_tpl->tpl_vars['type']->value["name"];?>
" value="<?php echo $_smarty_tpl->tpl_vars['type']->value["id"];?>
" <?php if ($_smarty_tpl->tpl_vars['race']->value != '' && $_smarty_tpl->tpl_vars['type']->value["id"] == $_smarty_tpl->tpl_vars['race']->value->tip_utrke_tip_utrke_id) {?>selected<?php }?>>
                                <?php echo $_smarty_tpl->tpl_vars['type']->value["name"];?>

                            </option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
                <div class="main__form-element">
                    <label for="country">Država:</label><br>
                    <select id="country" name="country" class="form__input select">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'country');
$_smarty_tpl->tpl_vars['country']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->do_else = false;
?>
                            <option name="<?php echo $_smarty_tpl->tpl_vars['country']->value["label"];?>
" value="<?php echo $_smarty_tpl->tpl_vars['country']->value["id"];?>
" <?php if ($_smarty_tpl->tpl_vars['race']->value != '' && $_smarty_tpl->tpl_vars['country']->value["id"] == $_smarty_tpl->tpl_vars['race']->value->drzava_drzava_id) {?>selected<?php }?>>
                                <?php echo $_smarty_tpl->tpl_vars['country']->value["label"];?>

                            </option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
                <div class="main__form-element">
                    <input type="submit" name="submit" id="submit" value="<?php if ((isset($_GET['raceid']))) {?>Ažuriraj utrku<?php } else { ?>Dodaj utrku<?php }?>" class="form__button">
                </div>
            </form>
        </div>
    </div>
</main><?php }
}
