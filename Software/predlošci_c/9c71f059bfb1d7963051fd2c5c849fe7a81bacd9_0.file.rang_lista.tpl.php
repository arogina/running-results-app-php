<?php
/* Smarty version 4.0.0, created on 2022-06-08 16:19:18
  from 'C:\xampp\htdocs\webdip-projekt\predlošci\rang_lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a0afe6350a92_07520706',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c71f059bfb1d7963051fd2c5c849fe7a81bacd9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\webdip-projekt\\predlošci\\rang_lista.tpl',
      1 => 1654697783,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a0afe6350a92_07520706 (Smarty_Internal_Template $_smarty_tpl) {
?><main id="main" class="main">
    <div class="main__inner">
        <div class="main__table-container">
            <form class="main__form-date" action="rang_lista.php">
                <label for="from">Od:</label>
                <input type="date" name="from" id="from" class="form__input date"/>
                <label for="to">Do:</label>
                <input type="date" name="to" id="to" class="form__input date"/>
                <input type="submit" name="submit" value="Prikaži" class="form__button"/>
            </form>
            <table class="main__table">
                <caption class="main__table-caption">Rang lista po broju završenih etapa</caption>
                <thead>
                    <tr class="main__table-row">
                        <td class="main__table-head">Redni broj.</td>
                        <td class="main__table-head">Broj završenih etapa</td>
                        <td class="main__table-head">Korisnik</td>
                    </tr>
                </thead>
                <tbody id="rang-body">

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
