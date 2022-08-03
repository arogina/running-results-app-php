<main id="main" class="main">
    <div class="main__inner">
        <div class="main__form-container">
            <div class="main__form-message">
                {if isset($smarty.get.country) && $smarty.get.country == "created"}
                    <p class="main__form-success">Država uspješno dodana!</p>
                {elseif isset($smarty.get.country) && $smarty.get.country == "updated"}
                    <p class="main__form-success">Država uspješno ažurirana!</p>
                {/if}
            </div>
            <form id="login-form" method="post" action="dodaj_drzavu.php" class="main__form">
                <div class="main__form-element">
                    <label for="name">Naziv države:</label><br>
                    <input type="text" name="name" id="name" class="form__input" value="{if $country != ""}{$country->naziv}{/if}">
                    <p class="main__form-error">
                        {if isset($smarty.get.error) && $smarty.get.error == "emptyvalues"}
                            Polje ne smije biti prazno!
                        {elseif isset($smarty.get.error) && $smarty.get.error == "namelength"}
                            Naziv smije imati najviše 45 znakova!
                        {elseif isset($smarty.get.error) && $smarty.get.error == "namechars"}
                            Naziv ne može sadržavati brojeve i <br> prvi znak ne smije biti razmak!
                        {/if}
                    </p>
                </div>
                <div class="main__form-element">
                    <label for="label">Oznaka:</label><br>
                    <input type="text" name="label" id="label" class="form__input" value="{if $country !== ""}{$country->oznaka}{/if}">
                    <p class="main__form-error">
                        {if isset($smarty.get.error) && $smarty.get.error == "emptyvalues"}
                            Polje ne smije biti prazno!
                        {elseif isset($smarty.get.error) && $smarty.get.error == "labellength"}
                            Oznaka smije imati najviše 3 znaka!
                        {elseif isset($smarty.get.error) && $smarty.get.error == "labelchars"}
                            Oznaka ne može sadržavati brojeve i <br> prvi znak ne smije biti razmak!
                        {/if}
                    </p>
                </div>
                <div class="main__form-element">
                    <label for="continent">Kontinent:</label><br>
                    <input type="text" name="continent" id="continent" class="form__input" value="{if $country !== ""}{$country->kontinent}{/if}">
                    <p class="main__form-error">
                        {if isset($smarty.get.error) && $smarty.get.error == "emptyvalues"}
                            Polje ne smije biti prazno!
                        {elseif isset($smarty.get.error) && $smarty.get.error == "continentlength"}
                            Kontinent smije imati najviše 15 znakova!
                        {elseif isset($smarty.get.error) && $smarty.get.error == "continentchars"}
                            Kontinent ne može sadržavati brojeve i <br> prvi znak ne smije biti razmak!
                        {/if}
                    </p>
                </div>
                <div class="main__form-element">
                    <input type="submit" name="submit" id="submit" 
                    value="{if isset($smarty.get.countryid)}Ažuriraj državu{else}Dodaj državu{/if}" class="form__button">
                </div>
            </form>
        </div>
    </div>
</main>