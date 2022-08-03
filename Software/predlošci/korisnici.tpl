<main id="main" class="main">
    <div class="main__inner">
        <div class="main__table-container">
            <table class="main__table">
                <caption class="main__table-caption">Korisnici</caption>
                <thead>
                    <tr class="main__table-row">
                        <td class="main__table-head">Korisničko ime</td>
                        <td class="main__table-head">Ime</td>
                        <td class="main__table-head">Prezime</td>
                        <td class="main__table-head">Email</td>
                        <td class="main__table-head">Lozinka</td>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$users item=$user}
                        <tr class="main__table-row">
                            <td class="main__table-data">{$user["username"]}</td>
                            <td class="main__table-data">{$user["name"]}</td>
                            <td class="main__table-data">{$user["surname"]}</td>
                            <td class="main__table-data">{$user["email"]}</td>
                            <td class="main__table-data">{$user["password"]}</td>
                        </tr>
                    {/foreach}
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