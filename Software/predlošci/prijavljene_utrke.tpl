<main id="main" class="main">
    <div class="main__inner">
        <div class="main__table-container">
            <table class="main__table">
                <caption class="main__table-caption">Prijavljene utrke</caption>
                <thead>
                    <tr class="main__table-row">
                        <td class="main__table-head">ID utrke</td>
                        <td class="main__table-head">Naziv utrke</td>
                        <td class="main__table-head">Datum prijave</td>
                        <td class="main__table-head">Godina rođenja</td>
                        <td class="main__table-head">Slika</td>
                        <td class="main__table-head">Ažurirati?</td>
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
            <div class="main__table-link">
                <a href="{$path}/obrasci/prijava_utrke.php" class="button__primary">Prijavi utrku</a>
            </div>
        </div>
    </div>
</main>