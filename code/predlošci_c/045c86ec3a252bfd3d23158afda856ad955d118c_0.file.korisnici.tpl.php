<?php
/* Smarty version 4.0.0, created on 2022-06-01 18:44:33
  from 'C:\xampp\htdocs\webdip-projekt\predlošci\korisnici.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62979771451c74_33190103',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '045c86ec3a252bfd3d23158afda856ad955d118c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\webdip-projekt\\predlošci\\korisnici.tpl',
      1 => 1654101871,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62979771451c74_33190103 (Smarty_Internal_Template $_smarty_tpl) {
?><main id="main" class="main">
    <div class="main__inner">
        <div class="main__table-container">
            <table class="main__table">
                <caption class="main__table-caption">Korisnici</caption>
                <thead>
                    <tr class="main__table-row">
                        <td class="main__table-head">Korisničko ime</td>
                        <td class="main__table-head">Ime</td>
                        <td class="main__table-head">Prezime</td>
                        <td class="main__table-head">Email</td>
                        <td class="main__table-head">Lozinka</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                        <tr class="main__table-row">
                            <td class="main__table-data"><?php echo $_smarty_tpl->tpl_vars['user']->value["username"];?>
</td>
                            <td class="main__table-data"><?php echo $_smarty_tpl->tpl_vars['user']->value["name"];?>
</td>
                            <td class="main__table-data"><?php echo $_smarty_tpl->tpl_vars['user']->value["surname"];?>
</td>
                            <td class="main__table-data"><?php echo $_smarty_tpl->tpl_vars['user']->value["email"];?>
</td>
                            <td class="main__table-data"><?php echo $_smarty_tpl->tpl_vars['user']->value["password"];?>
</td>
                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
            <div class="main__table-pagination">
                <button class="main__table-button">Prva stranica</button>
                <button class="main__table-button">Prethodna</button>
                <button class="main__table-button">Sljedeća</button>
            </div>
        </div>
    </div>
</main><?php }
}
