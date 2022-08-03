<main id="main" class="main">
    <div class="main__inner">
        <div class="main__form-container">
            <div class="main__form-message">
                {if isset($smarty.get.race) && $smarty.get.race == "created"}
                    <p class="main__form-success">Uspješno ste dodali utrku!</p>
                {elseif isset($smarty.get.race) && $smarty.get.race == "updated"}
                    <p class="main__form-success">Uspješno ste ažurirali utrku!</p>
                {/if}
            </div>
            <form id="add-race-form" method="post" action="./dodaj_utrku.php" class="main__form">
                <div class="main__form-element">
                    <label for="race">Naziv utrke:</label><br>
                    <input type="text" name="race" id="race" class="form__input" value="{if $race != ""}{$race->naziv}{/if}">
                    <p class="main__form-error">
                        {if isset($smarty.get.error) && $smarty.get.error == "emptyvalues"}
                            Polje ne smije biti prazno!
                        {/if}
                    </p>
                </div>
                <div class="main__form-element">
                    <label for="due-date">Rok prijave:</label><br>
                    <input type="date" name="due-date" id="due-date" class="form__input" value="{if $race != ""}{$race->rok_prijave}{/if}">
                    <p class="main__form-error">
                        {if isset($smarty.get.error) && $smarty.get.error == "emptyvalues"}
                            Polje ne smije biti prazno!
                        {/if}
                    </p>
                </div>
                <div class="main__form-element">
                    <label for="race-type">Tip utrke:</label><br>
                    <select id="race-type" name="race-type" class="form__input select">
                        {foreach from=$types item=$type}
                        <option name="{$type["name"]}" value="{$type["id"]}" {if $race != "" && $type["id"] == $race->tip_utrke_tip_utrke_id}selected{/if}>
                                {$type["name"]}
                            </option>
                        {/foreach}
                    </select>
                </div>
                <div class="main__form-element">
                    <label for="country">Država:</label><br>
                    <select id="country" name="country" class="form__input select">
                        {foreach from=$countries item=$country}
                            <option name="{$country["label"]}" value="{$country["id"]}" {if $race != "" && $country["id"] == $race->drzava_drzava_id}selected{/if}>
                                {$country["label"]}
                            </option>
                        {/foreach}
                    </select>
                </div>
                <div class="main__form-element">
                    <input type="submit" name="submit" id="submit" value="{if isset($smarty.get.raceid)}Ažuriraj utrku{else}Dodaj utrku{/if}" class="form__button">
                </div>
            </form>
        </div>
    </div>
</main>