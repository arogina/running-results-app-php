<?php
/* Smarty version 4.0.0, created on 2022-06-08 21:30:59
  from 'C:\xampp\htdocs\webdip-projekt\predlošci\utrke.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a0f8f372d918_20008262',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f6b7a567b335215fddeb68afe832373d72a53c6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\webdip-projekt\\predlošci\\utrke.tpl',
      1 => 1654716645,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a0f8f372d918_20008262 (Smarty_Internal_Template $_smarty_tpl) {
?><main id="main" class="main">
    <div class="main__inner">
        <div class="main__table-container" id="races">
            <table class="main__table">
                <caption class="main__table-caption">Popis utrka</caption>
                <thead>
                    <tr class="main__table-row">
                        <td class="main__table-head">ID utrke</td>
                        <td class="main__table-head">Naziv utrke</td>
                        <td class="main__table-head">Rok prijave</td>
                        <td class="main__table-head">Završena?</td>
                        <td class="main__table-head">Tip utrke</td>
                        <td class="main__table-head">Država</td>
                        <td class="main__table-head">Zaključaj utrku</td>
                        <?php if ($_SESSION['role'] == 3) {?>
                            <td class="main__table-head">Ažuriraj</td>
                        <?php }?>
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
            <?php if ($_SESSION['role'] == 3) {?>
                <div class="main__table-link">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/obrasci/dodaj_utrku.php" class="button__primary">Dodaj utrku</a>
                </div>
            <?php }?>
        </div>
    </div>
</main><?php }
}
