<main id="main" class="main">
    <div class="main__inner">
        <div class="main__table-container" id="races">
            <table class="main__table">
                <caption class="main__table-caption">Popis utrka</caption>
                <thead>
                    <tr class="main__table-row">
                        <td class="main__table-head">ID utrke</td>
                        <td class="main__table-head">Naziv utrke</td>
                        <td class="main__table-head">Rok prijave</td>
                        <td class="main__table-head">Završena?</td>
                        <td class="main__table-head">Tip utrke</td>
                        <td class="main__table-head">Država</td>
                        <td class="main__table-head">Zaključaj utrku</td>
                        {if $smarty.session.role == 3}
                            <td class="main__table-head">Ažuriraj</td>
                        {/if}
                    </tr>
                </thead>
                <tbody id="races-body">
                    
                </tbody>
            </table>
            <div class="main__table-pagination">
                <button id="btn-first" class="main__table-button">Prva stranica</button>
                <button id="btn-prev" class="main__table-button">Prethodna</button>
                <button id="btn-next" class="main__table-button">Sljedeća</button>
            </div>
            {if $smarty.session.role == 3}
                <div class="main__table-link">
                    <a href="{$path}/obrasci/dodaj_utrku.php" class="button__primary">Dodaj utrku</a>
                </div>
            {/if}
        </div>
    </div>
</main>