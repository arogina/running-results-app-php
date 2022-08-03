<main id="main" class="main">
    <div class="main__inner">
        <div class="main__table-container">
            <form class="main__form-date" action="rang_lista.php">
                <label for="from">Od:</label>
                <input type="date" name="from" id="from" class="form__input date"/>
                <label for="to">Do:</label>
                <input type="date" name="to" id="to" class="form__input date"/>
                <input type="submit" name="submit" value="Prikaži" class="form__button"/>
            </form>
            <table class="main__table">
                <caption class="main__table-caption">Rang lista po broju završenih etapa</caption>
                <thead>
                    <tr class="main__table-row">
                        <td class="main__table-head">Redni broj.</td>
                        <td class="main__table-head">Broj završenih etapa</td>
                        <td class="main__table-head">Korisnik</td>
                    </tr>
                </thead>
                <tbody id="rang-body">

                </tbody>
            </table>
            <div class="main__table-pagination">
                <button class="main__table-button">Prva stranica</button>
                <button class="main__table-button">Prethodna</button>
                <button class="main__table-button">Sljedeća</button>
            </div>
        </div>
    </div>
</main>