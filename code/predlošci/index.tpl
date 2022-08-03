<main id="main" class="main">
    <div class="main__inner">
        <div class="main__content">
            <img src="{$path}/materijali/main.jpeg" alt="main" class="main__image">
            <p class="main__text">
                Ova Web aplikacija je namijenjena da svojim korisnicima omogući upravljanje utrkama, prijavljivanje na utrke te praćenje svojih rezultata. 
                <br>
                <br>
                {if !isset($smarty.session.user_id)}
                    Registrirajte se <a href="{$path}/obrasci/registracija.php">ovdje</a> ako već niste!
                {/if}
            </p>
        </div>
    </div>
</main>