<?php
/* Smarty version 4.0.0, created on 2022-06-03 14:24:23
  from 'C:\xampp\htdocs\webdip-projekt\predlošci\prijavljene_utrke.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_6299fd77b831c1_79228103',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d482227b961855229a0e2d3456fe4d14c57ae7c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\webdip-projekt\\predlošci\\prijavljene_utrke.tpl',
      1 => 1654259002,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6299fd77b831c1_79228103 (Smarty_Internal_Template $_smarty_tpl) {
?><main id="main" class="main">
    <div class="main__inner">
        <div class="main__table-container">
            <table class="main__table">
                <caption class="main__table-caption">Prijavljene utrke</caption>
                <thead>
                    <tr class="main__table-row">
                        <td class="main__table-head">ID utrke</td>
                        <td class="main__table-head">Naziv utrke</td>
                        <td class="main__table-head">Datum prijave</td>
                        <td class="main__table-head">Godina rođenja</td>
                        <td class="main__table-head">Slika</td>
                        <td class="main__table-head">Ažurirati?</td>
                    </tr>
                </thead>
                <tbody id="races-body">
                
                </tbody>
            </table>
            <div class="main__table-pagination">
                <button id="btn-first" class="main__table-button">Prva stranica</button>
                <button id="btn-prev" class="main__table-button">Prethodna</button>
                <button id="btn-next" class="main__table-button">Sljedeća</button>
            </div>
            <div class="main__table-link">
                <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/obrasci/prijava_utrke.php" class="button__primary">Prijavi utrku</a>
            </div>
        </div>
    </div>
</main><?php }
}
