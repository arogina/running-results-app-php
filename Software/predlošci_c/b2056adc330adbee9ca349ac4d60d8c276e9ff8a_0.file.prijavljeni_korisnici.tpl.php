<?php
/* Smarty version 4.0.0, created on 2022-06-08 13:50:37
  from 'C:\xampp\htdocs\webdip-projekt\predlošci\prijavljeni_korisnici.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a08d0db7df32_50386788',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2056adc330adbee9ca349ac4d60d8c276e9ff8a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\webdip-projekt\\predlošci\\prijavljeni_korisnici.tpl',
      1 => 1654688935,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a08d0db7df32_50386788 (Smarty_Internal_Template $_smarty_tpl) {
?><main id="main" class="main">
    <div class="main__inner">
        <div class="main__table-container">
            <table class="main__table">
                <caption class="main__table-caption">Natjecatelji - <?php echo $_smarty_tpl->tpl_vars['stage']->value->naziv;?>
</caption>
                <thead>
                    <tr class="main__table-row">
                        <td class="main__table-head">Korisnik ID</td>
                        <td class="main__table-head">Korisničko ime</td>
                        <td class="main__table-head">Utrka</td>
                        <td class="main__table-head">Datum prijave</td>
                        <td class="main__table-head">Godina rođenja</td>
                        <td class="main__table-head">Slika</td>
                        <td class="main__table-head">Evidentiraj vrijeme</td>
                    </tr>
                </thead>
                <tbody id="competitors-body">
                    
                </tbody>
            </table>
            <div class="main__table-pagination">
                <button id="btn-first" class="main__table-button">Prva stranica</button>
                <button id="btn-prev" class="main__table-button">Prethodna</button>
                <button id="btn-next" class="main__table-button">Sljedeća</button>
            </div>
            <div class="main__table-link">
                <a href="#" class="button__primary" id="close-stage">Zaključaj etapu</a>
            </div>

            <table class="main__table second">
            <caption class="main__table-caption">Rezultati - <?php echo $_smarty_tpl->tpl_vars['stage']->value->naziv;?>
</caption>
            <thead>
                <tr class="main__table-row">
                    <td class="main__table-head">Mjesto</td>
                    <td class="main__table-head">Korisničko ime</td>
                    <td class="main__table-head">Utrka</td>
                    <td class="main__table-head">Vrijeme</td>
                    <td class="main__table-head">Bodovi</td>
                    <td class="main__table-head">Slika</td>
                </tr>
            </thead>
            <tbody id="results-body">
                
            </tbody>
        </table>
        <div class="main__table-pagination">
            <button id="btn-first-results" class="main__table-button">Prva stranica</button>
            <button id="btn-prev-results" class="main__table-button">Prethodna</button>
            <button id="btn-next-results" class="main__table-button">Sljedeća</button>
        </div>
        </div>
    </div>
</main><?php }
}
