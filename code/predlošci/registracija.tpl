<main id="main" class="main">
    <div class="main__inner">
        <div class="main__form-container">
            <div class="main__form-message">
                {if isset($smarty.get.success) && $smarty.get.success == "true"}
                    <p class="main__form-success">Uspješna registracija! <br>Na mail je poslan link za aktivaciju korisničkog računa!</p>
                {/if}
            </div>
            <form id="register-form" method="post" action="registracija.php" class="main__form">
                <div class="main__form-element">
                    <label for="name">Ime:</label><br>
                    <input type="text" name="name" id="name" class="form__input">
                    <div id="error-name" class="main__form-error">
                    {if isset($smarty.get.error) && $smarty.get.error == "emptyvalues"}
                        Polje ne smije biti prazno!
                    {elseif isset($smarty.get.error) && $smarty.get.error == "invalidname"}
                        Ime ne može sadržavati brojeve (0-9)<br> ili razmak!
                    {/if}
                    </div>
                </div>
                <div class="main__form-element">
                    <label for="surname">Prezime:</label><br>
                    <input type="text" name="surname" id="surname" class="form__input">
                    <div id="error-surname" class="main__form-error">
                    {if isset($smarty.get.error) && $smarty.get.error == "emptyvalues"}
                        Polje ne smije biti prazno!
                    {elseif isset($smarty.get.error) && $smarty.get.error == "invalidsurname"}
                        Prezime ne može sadržavati brojeve (0-9)<br> ili razmak!
                    {/if}
                    </div>
                </div>
                <div class="main__form-element">
                    <label for="username">Korisničko ime:</label><br>
                    <input type="text" name="username" id="username" class="form__input">
                    <div id="error-username" class="main__form-error">
                    {if isset($smarty.get.error) && $smarty.get.error == "emptyvalues"}
                        Polje ne smije biti prazno!
                    {elseif isset($smarty.get.error) && $smarty.get.error == "invalidusername"}
                        Korisničko ime ne može započeti s <br> brojevima (0-9) ili razmakom!
                    {/if}
                    </div>
                </div>
                <div class="main__form-element">
                    <label for="email">E-mail:</label><br>
                    <input type="email" name="email" id="email" class="form__input">
                    <div id="error-email" class="main__form-error">
                    {if isset($smarty.get.error) && $smarty.get.error == "emptyvalues"}
                        Polje ne smije biti prazno!
                    {elseif isset($smarty.get.error) && $smarty.get.error == "invalidemail"}
                        Nevažeći email!
                    {/if}
                    </div>
                </div>
                <div class="main__form-element">
                    <label for="password">Lozinka:</label><br>
                    <input type="password" name="password" id="password" class="form__input">
                    <div id="error-password" class="main__form-error">
                    {if isset($smarty.get.error) && $smarty.get.error == "emptyvalues"}
                        Polje ne smije biti prazno!
                    {elseif isset($smarty.get.error) && $smarty.get.error == "passwordchars"}
                        Lozinka mora sadržavati velika i mala slova,<br> brojeve te specijalne znakove (!*?#$.)
                    {elseif isset($smarty.get.error) && $smarty.get.error == "passwordlength"}
                        Lozinka mora sadržavati najmanje 8 znakova!
                    {/if}
                    </div>
                </div>
                <div class="main__form-element">
                    <label for="confirm-password">Potvrda lozinke:</label><br>
                    <input type="password" name="confirm-password" id="confirm-password" class="form__input">
                    <div id="error-confpassword" class="main__form-error">
                    {if isset($smarty.get.error) && $smarty.get.error == "emptyvalues"}
                        Polje ne smije biti prazno!
                    {elseif isset($smarty.get.error) && $smarty.get.error == "confirmpassword"}
                        Lozinke moraju biti iste!
                    {/if}
                    </div>
                </div>
                <div class="main__form-element checkbox">
                    <input type="checkbox" name="terms" id="terms">
                    <label for="terms">Uvjeti korištenja</label>
                    <div class="main__form-error"></div>
                </div>
                <div class="main__form-element">
                    <div class="g-recaptcha" data-sitekey="6LctmFcgAAAAAC_pdsfBYbsqfCrQttcUB56Ydeby"></div>
                    <div class="main__form-error">
                    {if isset($smarty.get.error) && $smarty.get.error == "recaptchafalse"}
                        Potrebno je potvrditi reCAPTCHA polje!
                    {/if}
                    </div>
                </div>
                <div class="main__form-element">
                    <input type="submit" name="submit" id="submit" value="Registriraj se" class="form__button">
                </div>
            </form>
        </div>
    </div>
</main>