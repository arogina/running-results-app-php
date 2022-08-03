<?php
/* Smarty version 4.0.0, created on 2022-06-06 21:25:04
  from 'C:\xampp\htdocs\webdip-projekt\predlošci\etape.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_629e54902e5f73_29003355',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5bfcfeb84f8c4fd176b15d788385694f677bd55' => 
    array (
      0 => 'C:\\xampp\\htdocs\\webdip-projekt\\predlošci\\etape.tpl',
      1 => 1654543475,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629e54902e5f73_29003355 (Smarty_Internal_Template $_smarty_tpl) {
?><main id="main" class="main">
    <div class="main__inner">
        <div class="main__table-container">
            <table class="main__table">
                <caption class="main__table-caption">Popis etapa</caption>
                <thead>
                    <tr class="main__table-row">
                        <td class="main__table-head">ID etape</td>
                        <td class="main__table-head">Naziv etape</td>
                        <td class="main__table-head">Vrijeme početka</td>
                        <td class="main__table-head">Završena?</td>
                        <td class="main__table-head">Utrka</td>
                        <td class="main__table-head">Ažuriraj</td>
                        <td class="main__table-head">Natjecatelji</td>
                    </tr>
                </thead>
                <tbody id="stages-body">
                    
                </tbody>
            </table>
            <div class="main__table-pagination">
                <button id="btn-first" class="main__table-button">Prva stranica</button>
                <button id="btn-prev" class="main__table-button">Prethodna</button>
                <button id="btn-next" class="main__table-button">Sljedeća</button>
            </div>
            <div class="main__table-link">
                <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/obrasci/dodaj_etapu.php" class="button__primary">Dodaj etapu</a>
            </div>
        </div>
    </div>
</main><?php }
}
