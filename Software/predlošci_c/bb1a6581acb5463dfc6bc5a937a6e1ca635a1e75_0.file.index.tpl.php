<?php
/* Smarty version 4.0.0, created on 2022-06-08 21:39:43
  from 'C:\xampp\htdocs\webdip-projekt\predlošci\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62a0faffdbb109_49197853',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb1a6581acb5463dfc6bc5a937a6e1ca635a1e75' => 
    array (
      0 => 'C:\\xampp\\htdocs\\webdip-projekt\\predlošci\\index.tpl',
      1 => 1654717154,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a0faffdbb109_49197853 (Smarty_Internal_Template $_smarty_tpl) {
?><main id="main" class="main">
    <div class="main__inner">
        <div class="main__content">
            <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/materijali/main.jpeg" alt="main" class="main__image">
            <p class="main__text">
                Ova Web aplikacija je namijenjena da svojim korisnicima omogući upravljanje utrkama, prijavljivanje na utrke te praćenje svojih rezultata. 
                <br>
                <br>
                <?php if (!(isset($_SESSION['user_id']))) {?>
                    Registrirajte se <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/obrasci/registracija.php">ovdje</a> ako već niste!
                <?php }?>
            </p>
        </div>
    </div>
</main><?php }
}
