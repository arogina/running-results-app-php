<main id="main" class="main">
    <div class="main__inner">
        <div class="main__table-container">
            <div class="main__table-options">
                <label for="sort">Sortiraj:</label>
                <select id="sort" class="form__input table-sort">
                    <option value="k.ime">Ime</option>
                    <option value="k.prezime">Prezime</option>
                </select>
                <button id="sort-btn" class="button__primary">Sortiraj</button>
            </div>
            <table class="main__table">
                <caption class="main__table-caption">Pobjednici</caption>
                <thead>
                    <tr class="main__table-row">
                        <td class="main__table-head">Slika</td>
                        <td class="main__table-head">Ime</td>
                        <td class="main__table-head">Prezime</td>
                        <td class="main__table-head">Etapa</td>
                        <td class="main__table-head">Utrka</td>
                        <td class="main__table-head">Država</td>
                    </tr>
                </thead>
                <tbody id="winners-body">

                </tbody>
            </table>
            <div class="main__table-pagination">
                <button id="btn-first" class="main__table-button">Prva stranica</button>
                <button id="btn-prev" class="main__table-button">Prethodna</button>
                <button id="btn-next" class="main__table-button">Sljedeća</button>
            </div>
        </div>
    </div>
</main>