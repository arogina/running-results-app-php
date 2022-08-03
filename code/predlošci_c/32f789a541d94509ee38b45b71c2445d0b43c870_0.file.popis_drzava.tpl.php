<?php
/* Smarty version 4.0.0, created on 2022-06-04 13:47:47
  from 'C:\xampp\htdocs\webdip-projekt\predlošci\popis_drzava.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_629b46635b48c8_88238943',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32f789a541d94509ee38b45b71c2445d0b43c870' => 
    array (
      0 => 'C:\\xampp\\htdocs\\webdip-projekt\\predlošci\\popis_drzava.tpl',
      1 => 1654343208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629b46635b48c8_88238943 (Smarty_Internal_Template $_smarty_tpl) {
?><main id="main" class="main">
    <div class="main__inner">
        <div class="main__table-container">
            <table class="main__table">
                <caption class="main__table-caption">Popis država</caption>
                <thead>
                    <tr class="main__table-row">
                        <td class="main__table-head">ID države</td>
                        <td class="main__table-head">Naziv države</td>
                        <td class="main__table-head">Oznaka</td>
                        <td class="main__table-head">Kontinent</td>
                        <td class="main__table-head">Moderatori</td>
                        <td class="main__table-head">Ažuriraj</td>
                        <td class="main__table-head">Dodaj moderatora</td>
                    </tr>
                </thead>
                <tbody id="countries-body">
                    
                </tbody>
            </table>
            <div class="main__table-pagination">
                <button id="btn-first" class="main__table-button">Prva stranica</button>
                <button id="btn-prev" class="main__table-button">Prethodna</button>
                <button id="btn-next" class="main__table-button">Sljedeća</button>
            </div>
            <div class="main__table-link">
                <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/obrasci/dodaj_drzavu.php" class="button__primary">Dodaj državu</a>
            </div>
        </div>
    </div>
</main><?php }
}
