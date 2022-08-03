<main id="main" class="main">
    <div class="main__inner">
        <div class="main__form-container">
            <div class="main__form-message">
                {if isset($smarty.get.user) && $smarty.get.user == "blocked"}
                    <p class="main__form-error bigger">Korisnik je blokiran!</p>
                {/if}
            </div>
            <form id="login-form" method="post" action="../skripte/prijava.validacija.php" class="main__form">
                <div class="main__form-element">
                    <label for="username">Korisničko ime:</label><br>
                    <input type="text" name="username" id="username" class="form__input"
                    value="{if isset($smarty.cookies.remember_me)}{$smarty.cookies.remember_me}{/if}">
                    <p class="main__form-error"></p>
                </div>
                <div class="main__form-element">
                    <label for="username">Lozinka:</label><br>
                    <input type="password" name="password" id="password" class="form__input">
                    <p class="main__form-error"></p>
                </div>
                <div class="main__form-element checkbox">
                    <input type="checkbox" name="remember-me" id="remember-me">
                    <label for="remember-me">Zapamti me?</label>
                </div>
                <div class="main__form-element">
                    <input type="submit" name="submit" id="submit" value="Prijavi se" class="form__button">
                </div>
            </form>
            <a href="#" class="main__form-link">Zaboravljena lozinka?</a>
        </div>
    </div>
</main>