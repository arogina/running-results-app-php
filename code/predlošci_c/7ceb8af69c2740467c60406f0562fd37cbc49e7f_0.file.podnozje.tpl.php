<?php
/* Smarty version 4.0.0, created on 2022-06-08 21:03:40
  from 'C:\xampp\htdocs\webdip-projekt\predlošci\podnozje.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a0f28cbe4164_99722974',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ceb8af69c2740467c60406f0562fd37cbc49e7f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\webdip-projekt\\predlošci\\podnozje.tpl',
      1 => 1654715019,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a0f28cbe4164_99722974 (Smarty_Internal_Template $_smarty_tpl) {
?>        <footer class="footer">
        <p class="footer__text">2022 &copy; <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/o_autoru.php" class="footer__link">Alan Rogina</a></p>
        </footer>
        <?php if (!(isset($_COOKIE['use_terms']))) {?>
            <div class="cookie__accept">
                <div class="cookie__accept-inner">
                    <p class="cookie__accept-text">Prihvatite uvjete korištenja:</p>
                    <button class="button__primary" id="cookie-accept-btn">Prihvati</button>
                </div>
            </div>
        <?php }?>
        <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/js/main.js"><?php echo '</script'; ?>
>
        <?php if ($_smarty_tpl->tpl_vars['subtitle']->value === "Registracija") {?>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/js/registracija.js"><?php echo '</script'; ?>
>
        <?php } elseif ($_smarty_tpl->tpl_vars['subtitle']->value === "Prijava") {?>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/js/prijava.js"><?php echo '</script'; ?>
>
        <?php } elseif ($_smarty_tpl->tpl_vars['subtitle']->value === "Sve utrke") {?>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/js/utrke.js"><?php echo '</script'; ?>
>
        <?php } elseif ($_smarty_tpl->tpl_vars['subtitle']->value === "Prijavljene utrke") {?>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/js/prijavljene_utrke.js"><?php echo '</script'; ?>
>
        <?php } elseif ($_smarty_tpl->tpl_vars['subtitle']->value === "Buduće utrke") {?>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/js/buduce_utrke.js"><?php echo '</script'; ?>
>
        <?php } elseif ($_smarty_tpl->tpl_vars['subtitle']->value === "Države") {?>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/js/popis_drzava.js"><?php echo '</script'; ?>
>
        <?php } elseif ($_smarty_tpl->tpl_vars['subtitle']->value === "Etape") {?>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/js/etape.js"><?php echo '</script'; ?>
>
        <?php } elseif ($_smarty_tpl->tpl_vars['subtitle']->value === "Natjecatelji") {?>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/js/prijavljeni_korisnici.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/js/rezultati.js"><?php echo '</script'; ?>
>
        <?php } elseif ($_smarty_tpl->tpl_vars['subtitle']->value === "Galerija slika") {?>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/js/galerija.js"><?php echo '</script'; ?>
>
        <?php } elseif ($_smarty_tpl->tpl_vars['subtitle']->value === "Rang lista") {?>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/js/rang_lista.js"><?php echo '</script'; ?>
>
        <?php }?>
    </body>
</html><?php }
}
