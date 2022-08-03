<?php
/* Smarty version 4.0.0, created on 2022-06-06 21:23:10
  from 'C:\xampp\htdocs\webdip-projekt\predlošci\dodaj_etapu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_629e541e458b51_30211887',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50d6314902ecef2711554ba02c32a0255aa7f3a4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\webdip-projekt\\predlošci\\dodaj_etapu.tpl',
      1 => 1654543385,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629e541e458b51_30211887 (Smarty_Internal_Template $_smarty_tpl) {
?><main id="main" class="main">
    <div class="main__inner">
        <div class="main__form-container">
            <div class="main__form-message">
                <?php if ((isset($_GET['stage'])) && $_GET['stage'] == "created") {?>
                    <p class="main__form-success">Uspješno ste dodali etapu!</p>
                <?php } elseif ((isset($_GET['stage'])) && $_GET['stage'] == "updated") {?>
                    <p class="main__form-success">Uspješno ste ažurirali etapu!</p>
                <?php }?>
            </div>
            <form id="add-stage-form" method="post" action="./dodaj_etapu.php" class="main__form">
                <div class="main__form-element">
                    <label for="stage">Naziv etape:</label><br>
                    <input type="text" name="stage" id="stage" class="form__input" value="<?php if ($_smarty_tpl->tpl_vars['stage']->value != '') {
echo $_smarty_tpl->tpl_vars['stage']->value->naziv;
}?>">
                    <p class="main__form-error">
                        <?php if ((isset($_GET['error'])) && $_GET['error'] == "emptyvalues") {?>
                            Polje ne smije biti prazno!
                        <?php }?>
                    </p>
                </div>
                <div class="main__form-element">
                    <label for="start-date">Vrijeme početka:</label><br>
                    <input type="datetime-local" name="start-date" id="start-date" class="form__input" value="<?php if ($_smarty_tpl->tpl_vars['stage']->value != '') {
echo $_smarty_tpl->tpl_vars['stage']->value->vrijeme_pocetka;
}?>">
                    <p class="main__form-error">
                        <?php if ((isset($_GET['error'])) && $_GET['error'] == "emptyvalues") {?>
                            Polje ne smije biti prazno!
                        <?php }?>
                    </p>
                </div>
                <div class="main__form-element">
                    <label for="race">Utrka:</label><br>
                    <select id="race" name="race" class="form__input select">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['races']->value, 'race');
$_smarty_tpl->tpl_vars['race']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['race']->value) {
$_smarty_tpl->tpl_vars['race']->do_else = false;
?>
                            <option name="<?php echo $_smarty_tpl->tpl_vars['race']->value["name"];?>
" value="<?php echo $_smarty_tpl->tpl_vars['race']->value["id"];?>
" <?php if ($_smarty_tpl->tpl_vars['stage']->value != '' && $_smarty_tpl->tpl_vars['race']->value["id"] == $_smarty_tpl->tpl_vars['stage']->value->utrka_utrka_id) {?>selected<?php }?>>
                                <?php echo $_smarty_tpl->tpl_vars['race']->value["name"];?>

                            </option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
                <div class="main__form-element">
                    <input type="submit" name="submit" id="submit" value="<?php if ((isset($_GET['stageid']))) {?>Ažuriraj etapu<?php } else { ?>Dodaj etapu<?php }?>" class="form__button">
                </div>
            </form>
        </div>
    </div>
</main><?php }
}
