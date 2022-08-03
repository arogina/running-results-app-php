<main id="main" class="main">
    <div class="main__inner">
        <div class="main__form-container">
            <div class="main__form-message">
                {if isset($smarty.get.race) && $smarty.get.race == "signed"}
                    <p class="main__form-success">Uspješno ste prijavili utrku!</p>
                {elseif isset($smarty.get.race) && $smarty.get.race == "updated"}
                    <p class="main__form-success">Uspješno ste ažurirali prijavu!</p>
                {elseif isset($smarty.get.error) && $smarty.get.error == "alreadysigned"}
                    <p class="main__form-error bigger">Već ste prijavili ovu utrku!</p>
                {/if}
            </div>
            <form id="sign-race-form" method="post" action="./prijava_utrke.php" class="main__form" enctype="multipart/form-data">
                <div class="main__form-element">
                    <label for="race">Utrka:</label><br>
                    <select name="race" class="form__input select">
                        {foreach from=$races item=$race}
                            <option name="{$race["name"]}" value="{$race["id"]}" 
                            {if isset($smarty.get.raceid) && $smarty.get.raceid == $race["id"]}selected{/if}>
                                {$race["name"]}
                            </option>
                        {/foreach}
                    </select>
                </div>
                <div class="main__form-element">
                    <label for="birth-date">Godina rođenja:</label><br>
                    <input type="text" name="birth-date" id="birth-date" class="form__input"
                    value="{if isset($smarty.get.raceid)}{$birth_date}{/if}">
                    <p class="main__form-error">
                        {if isset($smarty.get.error) && $smarty.get.error == "emptydate"}
                            Polje ne smije biti prazno!
                        {elseif isset($smarty.get.error) && $smarty.get.error == "baddate"}
                            Godina smije sadržavati samo brojeve i <br> ne smije biti veća od 4 znaka.
                        {/if}
                    </p>
                </div>
                <div class="main__form-element">
                    <label for="picture">Slika:</label><br>
                    <input type="file" name="picture" id="picture" class="form__input">
                    <p class="main__form-error">
                        {if isset($smarty.get.error) && $smarty.get.error == "emptyfile"}
                            Potrebno je uploadati sliku!
                        {elseif isset($smarty.get.error) && $smarty.get.error == "badextension"}
                            Datoteka smije imati sljedeće ekstenzije: .jpg ili .png.
                        {elseif isset($smarty.get.error) && $smarty.get.error == "largefile"}
                            Slika ne smije biti veća od 1MB!
                        {/if}
                    </p>
                </div>
                <div class="main__form-element">
                    <input type="submit" name="submit" id="submit" value="Prijavi utrku" class="form__button">
                </div>
            </form>
        </div>
    </div>
</main>