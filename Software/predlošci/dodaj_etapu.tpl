<main id="main" class="main">
    <div class="main__inner">
        <div class="main__form-container">
            <div class="main__form-message">
                {if isset($smarty.get.stage) && $smarty.get.stage == "created"}
                    <p class="main__form-success">Uspješno ste dodali etapu!</p>
                {elseif isset($smarty.get.stage) && $smarty.get.stage == "updated"}
                    <p class="main__form-success">Uspješno ste ažurirali etapu!</p>
                {/if}
            </div>
            <form id="add-stage-form" method="post" action="./dodaj_etapu.php" class="main__form">
                <div class="main__form-element">
                    <label for="stage">Naziv etape:</label><br>
                    <input type="text" name="stage" id="stage" class="form__input" value="{if $stage != ""}{$stage->naziv}{/if}">
                    <p class="main__form-error">
                        {if isset($smarty.get.error) && $smarty.get.error == "emptyvalues"}
                            Polje ne smije biti prazno!
                        {/if}
                    </p>
                </div>
                <div class="main__form-element">
                    <label for="start-date">Vrijeme početka:</label><br>
                    <input type="datetime-local" name="start-date" id="start-date" class="form__input" value="{if $stage != ""}{$stage->vrijeme_pocetka}{/if}">
                    <p class="main__form-error">
                        {if isset($smarty.get.error) && $smarty.get.error == "emptyvalues"}
                            Polje ne smije biti prazno!
                        {/if}
                    </p>
                </div>
                <div class="main__form-element">
                    <label for="race">Utrka:</label><br>
                    <select id="race" name="race" class="form__input select">
                        {foreach from=$races item=$race}
                            <option name="{$race["name"]}" value="{$race["id"]}" {if $stage != "" && $race["id"] == $stage->utrka_utrka_id}selected{/if}>
                                {$race["name"]}
                            </option>
                        {/foreach}
                    </select>
                </div>
                <div class="main__form-element">
                    <input type="submit" name="submit" id="submit" value="{if isset($smarty.get.stageid)}Ažuriraj etapu{else}Dodaj etapu{/if}" class="form__button">
                </div>
            </form>
        </div>
    </div>
</main>