<?php
/* Smarty version 4.0.0, created on 2022-06-08 15:27:05
  from 'C:\xampp\htdocs\webdip-projekt\predlošci\galerija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a0a3a9272259_83161869',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94fa4bb4431e2d732a7d83e2d74c42149fca5f40' => 
    array (
      0 => 'C:\\xampp\\htdocs\\webdip-projekt\\predlošci\\galerija.tpl',
      1 => 1654694764,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a0a3a9272259_83161869 (Smarty_Internal_Template $_smarty_tpl) {
?><main id="main" class="main">
    <div class="main__inner">
        <div class="main__table-container">
            <div class="main__table-options">
                <label for="sort">Sortiraj:</label>
                <select id="sort" class="form__input table-sort">
                    <option value="k.ime">Ime</option>
                    <option value="k.prezime">Prezime</option>
                </select>
                <button id="sort-btn" class="button__primary">Sortiraj</button>
            </div>
            <table class="main__table">
                <caption class="main__table-caption">Pobjednici</caption>
                <thead>
                    <tr class="main__table-row">
                        <td class="main__table-head">Slika</td>
                        <td class="main__table-head">Ime</td>
                        <td class="main__table-head">Prezime</td>
                        <td class="main__table-head">Etapa</td>
                        <td class="main__table-head">Utrka</td>
                        <td class="main__table-head">Država</td>
                    </tr>
                </thead>
                <tbody id="winners-body">

                </tbody>
            </table>
            <div class="main__table-pagination">
                <button id="btn-first" class="main__table-button">Prva stranica</button>
                <button id="btn-prev" class="main__table-button">Prethodna</button>
                <button id="btn-next" class="main__table-button">Sljedeća</button>
            </div>
        </div>
    </div>
</main><?php }
}
