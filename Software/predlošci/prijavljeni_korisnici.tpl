<main id="main" class="main">
    <div class="main__inner">
        <div class="main__table-container">
            <table class="main__table">
                <caption class="main__table-caption">Natjecatelji - {$stage->naziv}</caption>
                <thead>
                    <tr class="main__table-row">
                        <td class="main__table-head">Korisnik ID</td>
                        <td class="main__table-head">Korisničko ime</td>
                        <td class="main__table-head">Utrka</td>
                        <td class="main__table-head">Datum prijave</td>
                        <td class="main__table-head">Godina rođenja</td>
                        <td class="main__table-head">Slika</td>
                        <td class="main__table-head">Evidentiraj vrijeme</td>
                    </tr>
                </thead>
                <tbody id="competitors-body">
                    
                </tbody>
            </table>
            <div class="main__table-pagination">
                <button id="btn-first" class="main__table-button">Prva stranica</button>
                <button id="btn-prev" class="main__table-button">Prethodna</button>
                <button id="btn-next" class="main__table-button">Sljedeća</button>
            </div>
            <div class="main__table-link">
                <a href="#" class="button__primary" id="close-stage">Zaključaj etapu</a>
            </div>

            <table class="main__table second">
            <caption class="main__table-caption">Rezultati - {$stage->naziv}</caption>
            <thead>
                <tr class="main__table-row">
                    <td class="main__table-head">Mjesto</td>
                    <td class="main__table-head">Korisničko ime</td>
                    <td class="main__table-head">Utrka</td>
                    <td class="main__table-head">Vrijeme</td>
                    <td class="main__table-head">Bodovi</td>
                    <td class="main__table-head">Slika</td>
                </tr>
            </thead>
            <tbody id="results-body">
                
            </tbody>
        </table>
        <div class="main__table-pagination">
            <button id="btn-first-results" class="main__table-button">Prva stranica</button>
            <button id="btn-prev-results" class="main__table-button">Prethodna</button>
            <button id="btn-next-results" class="main__table-button">Sljedeća</button>
        </div>
        </div>
    </div>
</main>