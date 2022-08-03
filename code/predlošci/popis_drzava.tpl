<main id="main" class="main">
    <div class="main__inner">
        <div class="main__table-container">
            <table class="main__table">
                <caption class="main__table-caption">Popis država</caption>
                <thead>
                    <tr class="main__table-row">
                        <td class="main__table-head">ID države</td>
                        <td class="main__table-head">Naziv države</td>
                        <td class="main__table-head">Oznaka</td>
                        <td class="main__table-head">Kontinent</td>
                        <td class="main__table-head">Moderatori</td>
                        <td class="main__table-head">Ažuriraj</td>
                        <td class="main__table-head">Dodaj moderatora</td>
                    </tr>
                </thead>
                <tbody id="countries-body">
                    
                </tbody>
            </table>
            <div class="main__table-pagination">
                <button id="btn-first" class="main__table-button">Prva stranica</button>
                <button id="btn-prev" class="main__table-button">Prethodna</button>
                <button id="btn-next" class="main__table-button">Sljedeća</button>
            </div>
            <div class="main__table-link">
                <a href="{$path}/obrasci/dodaj_drzavu.php" class="button__primary">Dodaj državu</a>
            </div>
        </div>
    </div>
</main>