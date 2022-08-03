        <footer class="footer">
        <p class="footer__text">2022 &copy; <a href="{$path}/o_autoru.php" class="footer__link">Alan Rogina</a></p>
        </footer>
        {if !isset($smarty.cookies.use_terms)}
            <div class="cookie__accept">
                <div class="cookie__accept-inner">
                    <p class="cookie__accept-text">Prihvatite uvjete korištenja:</p>
                    <button class="button__primary" id="cookie-accept-btn">Prihvati</button>
                </div>
            </div>
        {/if}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{$path}/js/main.js"></script>
        {if $subtitle === "Registracija"}
            <script src="{$path}/js/registracija.js"></script>
        {elseif $subtitle === "Prijava"}
            <script src="{$path}/js/prijava.js"></script>
        {elseif $subtitle === "Sve utrke"}
            <script src="{$path}/js/utrke.js"></script>
        {elseif $subtitle === "Prijavljene utrke"}
            <script src="{$path}/js/prijavljene_utrke.js"></script>
        {elseif $subtitle === "Buduće utrke"}
            <script src="{$path}/js/buduce_utrke.js"></script>
        {elseif $subtitle === "Države"}
            <script src="{$path}/js/popis_drzava.js"></script>
        {elseif $subtitle === "Etape"}
            <script src="{$path}/js/etape.js"></script>
        {elseif $subtitle === "Natjecatelji"}
            <script src="{$path}/js/prijavljeni_korisnici.js"></script>
            <script src="{$path}/js/rezultati.js"></script>
        {elseif $subtitle === "Galerija slika"}
            <script src="{$path}/js/galerija.js"></script>
        {elseif $subtitle === "Rang lista"}
            <script src="{$path}/js/rang_lista.js"></script>
        {/if}
    </body>
</html>