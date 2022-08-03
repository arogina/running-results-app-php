<main id="main" class="main">
    <div class="main__inner">
        <div class="main__form-container">
            <div class="main__form-message">
                {if isset($smarty.get.user) && $smarty.get.user == "mod"}
                    <p class="main__form-success">Uspješno ste dodali moderatora!</p>
                {elseif isset($smarty.get.error) && $smarty.get.error == "alreadymod"}
                    <p class="main__form-error bigger">Korisnik već moderira ovu državu!</p>
                {/if}
            </div>
            <form id="sign-race-form" method="post" action="./dodaj_moderatora.php" class="main__form">
                <div class="main__form-element">
                    <label for="country">Država</label><br>
                    <input type="text" name="country" id="country" class="form__input"
                    value="{if isset($smarty.cookies.countryid)}{$country->naziv}{/if}" disabled>
                    <p class="main__form-error"></p>
                </div>
                <div class="main__form-element">
                    <label for="users">Korisnik:</label><br>
                    <select name="users" class="form__input select">
                        {foreach from=$users item=$user}
                            <option name="{$user["username"]}" value="{$user["id"]}">
                                {$user["username"]}
                            </option>
                        {/foreach}
                    </select>
                </div>
                <div class="main__form-element">
                    <input type="submit" name="submit" id="submit" value="Dodaj moderatora" class="form__button">
                </div>
            </form>
        </div>
    </div>
</main>