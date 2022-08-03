<main id="main" class="main">
    <div class="main__inner inner-column">
        <section class="main__section">
            <h2 class="main__section-title">Opis projektnog zadatka</h2><br>
            <p class="main__section-text">
                Izrada sustava za upravljanje utrkama trčanja i praćenja svojih rezultata.
                Potrebno je izraditi aplikaciju koja će omogućiti korisnicima prijavljivanje utrka, 
                praćenje rezultata po etapama pojedine utrke, objavljivanje pobjednika itd. 
                Postoje tri uloge u sustavu
            </p>
        </section>

        <section class="main__section">
            <h2 class="main__section-title">Opis projektnog rješenja</h2><br>
            <p class="main__section-text">
                U sustavu postoje 3 vrste korisnika: Registrirani korisnik, Moderator i Administrator. 
                Korisnik koji još nije registriran i/ili prijavljen u sustav nosi ulogu Neregistriranog korisnika. 
                Neregistrirani korisnik može pregledati rang-listu korisnika prema broju završenih etapa, 
                te galeriju slika pobjednika svake završene etape.
                Nakon što se registrira odnosno prijavi, Neregistrirani korisnik postaje Registrirani korisnik. 
                Registrirani korisnik može kreirati, ažurirati te pregledati sve svoje prijave na utrke. 
                Registrirani korisnik dodatno može vidjeti popis svih budućih utrka. 
                Ukoliko mu Administrator dodijeli ulogu, Registirani korisnik može postati moderator. 
                U ulozi moderatora, korisnik moderira dodijeljene države. Svaka država ima utrke, a svaka utrka etape. 
                Moderator može stvarati, ažurirati i pregledavati etape. Može evidentirati vrijeme za svakog korisnika koji 
                je prijavljen za određenu etapu te zaključati etapu i objaviti pobjednika ukoliko su svi korisnici završili ili odustali 
                od etape. Dodatno, Moderator vidi sve prijavljene korisnike za svoje etape.
                Najviša ulogu u sustavu jest Administrator. Administrator može stvarati, ažurirati i pregledavati države te svakoj državi
                dodijeliti moderatora. Također, administrator može stvarati, ažurirati i pregledavati utrke trčanja.
            </p>
        </section>

        <section class="main__section">
            <h2 class="main__section-title">ERA model</h2><br>
            <a href="{$path}/materijali/era.png"><img src="{$path}/materijali/era.png" alt="era-model" width="500px"></a>
        </section>

        <section class="main__section">
            <h2 class="main__section-title">Navigacijski dijagrami</h2><br>
            <h3 class="main__section-subtitle">Registirani korisnik</h3>
            <a href="{$path}/materijali/navigacijski_registrirani_korisnik.png"><img src="{$path}/materijali/navigacijski_registrirani_korisnik.png" alt="era-model" width="500px"></a>
            <h3 class="main__section-subtitle">Moderator</h3>
            <a href="{$path}/materijali/navigacijski_moderator.png"><img src="{$path}/materijali/navigacijski_moderator.png" alt="era-model" width="500px"></a>
            <h3 class="main__section-subtitle">Administrator</h3>
            <a href="{$path}/materijali/navigacijski_administrator.png"><img src="{$path}/materijali/navigacijski_administrator.png" alt="era-model" width="500px"></a>
        </section>

        <section class="main__section">
            <h2 class="main__section-title">Popis i opis skripata</h2><br>
            <h3 class="main__section-subtitle">Mapa '/api'</h3>
            <p class="main__section-text">
            <ul class="main__section-list">
                <li><b>registracija.api.php</b> - skripta provjerava postoji li korisničko ime u bazi podatak i vraća odgovor u JSON formatu</li>
                <li><b>prijava.api.php</b> - skripta provjerava točnost unesenog korisničkog imena i lozinke te vraća odgovor u JSON formatu</li>
                <li><b>galerija_slika.api.php</b>  - skripta čita iz baze podataka sve pobjednike etapa te ih vraća u JSON formatu</li>
                <li><b>rang_lista.api.php</b>  - skripta čita iz baze podataka korisnike i njihov broj završenih etapa te ih vraća u JSON formatu</li>
                <li><b>prijavljene_utrke.api.php</b>  - skripta čita iz baze podataka prijavljene utrke ulogiranog korisnika ih vraća u JSON formatu</li>
                <li><b>buduce_utrke.api.php</b>  - skripta čita iz baze podataka sve buduće (nadolazeće) utrke te ih vraća u JSON formatu</li>
                <li><b>etape.api.php</b>  - skripta čita iz baze podataka sve etape te ih vraća u JSON formatu</li>
                <li><b>prijavljeni_korisnici.api.php</b>  - skripta čita iz baze podataka sve prijavljene korisnike na danu etapu te ih vraća u JSON formatu</li>
                <li><b>evidentiraj_vrijeme.api.php</b>  - skripta sprema vrijeme korisnika na nekoj etapi te vraća odgovor o uspješnosti u JSON formatu</li>
                <li><b>rezultati.api.php</b>  - skripta čita iz baze podataka sve rezultate za danu etapu te ih vraća u JSON formatu</li>
                <li><b>utrke.api.php</b>  - skripta čita iz baze podataka sve utrke te ih vraća u JSON formatu</li>
                <li><b>zakljucaj_etapu.api.php</b>  - skripta zaključava etapu (ažurira zapis u bazi podataka) te vraća odgovor o uspješnosti u JSON formatu</li>
                <li><b>zakljucaj_utrku.api.php</b>  - skripta zaključava utrku (ažurira zapis u bazi podataka) te vraća odgovor o uspješnosti u JSON formatu</li>
                <li><b>rezultati.api.php</b>  - skripta čita iz baze podataka sve države te ih vraća u JSON formatu</li>
            </ul>

            <h3 class="main__section-subtitle">Mapa '/klase'</h3>
            <ul class="main__section-list">
                <li><b>db.class.php</b> - klasa za spajanje na bazu podataka s metodama connect() i disconnect()</li>
                <li><b>drzava.class.php</b> - klasa s metodama za kreiranje, ažuriranje te čitanje država</li>
                <li><b>etapa.class.php</b> - klasa s metodama za kreiranje, ažuriranje te čitanje etapa</li>
                <li><b>kolacici.class.php</b> - klasa s metodama za kreiranje i brisanje kolačića</li>
                <li><b>korisnik.class.php</b> - klasa s metodama za kreiranje, ažuriranje te čitanje podataka o korisnicima</li>
                <li><b>sesija.class.php</b> - klasa s metodama za kreiranje i brisanje sesije</li>
                <li><b>utrka.class.php</b> - klasa s metodama za kreiranje, ažuriranje te čitanje podataka o utrkama</li>
            </ul>

            <h3 class="main__section-subtitle">Mapa '/obrasci'</h3>
            <ul class="main__section-list">
                <li><b>dodaj_drzavu.php</b> - skripta koja generira obrazac za dodavanje ili ažuriranje dane države</li>
                <li><b>dodaj_etapu.php</b> - skripta koja generira obrazac za dodavanje ili ažuriranje dane etape</li>
                <li><b>dodaj_moderatora.php</b> - skripta koja generira obrazac za dodjeljivanje moderatora danoj državi</li>
                <li><b>dodaj_utrku.php</b> - skripta koja generira obrazac za dodavanje ili ažuriranje dane utrke</li>
                <li><b>prijava_utrke.php</b> - skripta koja generira obrazac za kreiranje ili ažuriranje prijave na utrku</li>
                <li><b>prijava.php</b> - skripta koja generira obrazac za prijavu u sustav</li>
                <li><b>registracija.php</b> - skripta koja generira obrazac za registraciju novog korisnika</li>
            </ul>

            <h3 class="main__section-subtitle">Mapa '/skripte'</h3>
            <ul class="main__section-list">
                <li><b>dodaj_drzavu.validacija.php</b> - skripta koja validira podatke iz obrasca za dodavanje ili ažuriranje države</li>
                <li><b>dodaj_etapu.validacija.php</b> - skripta koja validira podatke iz obrasca za dodavanje ili ažuriranje etape</li>
                <li><b>dodaj_moderatora.validacija.php</b> - skripta koja validira podatke iz obrasca za dodjelu moderatora</li>
                <li><b>dodaj_utrku.validacija.php</b> - skripta koja validira podatke iz obrasca za dodavanje ili ažuriranje utrke</li>
                <li><b>prijava_utrke.validacija.php</b> - skripta koja validira podatke iz obrasca za kreiranje ili ažuriranje prijave na utrku</li>
                <li><b>prijava.validacija.php</b> - skripta koja validira podatke iz obrasca za prijavu u sustav</li>
                <li><b>registracija.validacija.php</b> - skripta koja validira podatke iz obrasca za registraciju novog korisnika</li>
            </ul>

            <h3 class="main__section-subtitle">Root mapa</h3>
            <ul class="main__section-list">
                <li><b>buduce_utrke.php</b> - skripta koja generira popis budućih utrka</li>
                <li><b>dokumentacija.php</b> - skripta koja generira stranicu dokumentacije</li>
                <li><b>etape.php</b> - skripta koja generira popis etapa</li>
                <li><b>galerija.php</b> - skripta koja generira stranicu galerije pobjednika</li>
                <li><b>index.php</b> - skripta koja generira početnu stranicu</li>
                <li><b>o_autoru.php</b> - skripta koja generira stranicu s informacijama o autoru</li>
                <li><b>odjava.php</b> - skripta koja odjavljuje korisnika s sustava</li>
                <li><b>popis_drzava.php</b> - skripta koja generira popis drzava</li>
                <li><b>prijavljene_utrke.php</b> - skripta koja generira popis prijavljenih utrka</li>
                <li><b>prijavljeni korisnici.php</b> - skripta koja generira popis prijavljenih korisnika na danu etapu</li>
                <li><b>rang_lista.php</b> - skripta koja generira rang listu korisnika s brojem završenih etapa</li>
                <li><b>utrke.php</b> - skripta koja generira popis utrka</li>
                <li><b>zaglavlje.php</b> - skripta koja generira sesiju te inicijalizira objekt za korištenje Smarty-a</li>
            </ul>
        </section>

        <section class="main__section">
            <h2 class="main__section-title">Popis i opis korištenih tehnologija i alata</h2><br>
            <ul class="main__section-list">
                <li><b>Visual Studio Code</b> - IDE korišten prilikom pisanja koda</li>
                <li><b>XAMPP</b> - program korišten za pokretanje lokalnog servera</li>
                <li><b>MySQL Workbench</b> - IDE korišten za izradu baze podataka i ERA modela</li>
                <li><b>Mozilla Firefox</b> - web preglednik korišten za prikaz i korištenje web aplikacije</li>
                <li><b>HTML i CSS</b> - korišteni za strukturiranje i stiliziranje web aplikacija</li>
                <li><b>JavaScript - jQuery</b> - programski jezik korišten za izradu logike web aplikacije</li>
                <li><b>PHP</b> - programski jezik korišten za programiranje na poslužiteljskoj strani (back-end)</li>
            </ul>
        </section>

        <section class="main__section">
            <h2 class="main__section-title">Popis i opis korištenih vanjskih biblioteka</h2><br>
            <ul class="main__section-list">
                <li><b>Google Fonts</b> - korišteno za odabir fontova koji se koriste na web aplikaciji</li>
                <li><b>Smarty</b> - korišten za odvajanje aplikacijske logike od same prezentacije</li>
            </ul>
        </section>
    </div>
</main>