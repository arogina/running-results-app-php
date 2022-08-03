<main id="main" class="main">
    <div class="main__inner">
        <div class="main__table-container">
            <table class="main__table">
                <caption class="main__table-caption">Popis etapa</caption>
                <thead>
                    <tr class="main__table-row">
                        <td class="main__table-head">ID etape</td>
                        <td class="main__table-head">Naziv etape</td>
                        <td class="main__table-head">Vrijeme početka</td>
                        <td class="main__table-head">Završena?</td>
                        <td class="main__table-head">Utrka</td>
                        <td class="main__table-head">Ažuriraj</td>
                        <td class="main__table-head">Natjecatelji</td>
                    </tr>
                </thead>
                <tbody id="stages-body">
                    
                </tbody>
            </table>
            <div class="main__table-pagination">
                <button id="btn-first" class="main__table-button">Prva stranica</button>
                <button id="btn-prev" class="main__table-button">Prethodna</button>
                <button id="btn-next" class="main__table-button">Sljedeća</button>
            </div>
            <div class="main__table-link">
                <a href="{$path}/obrasci/dodaj_etapu.php" class="button__primary">Dodaj etapu</a>
            </div>
        </div>
    </div>
</main>