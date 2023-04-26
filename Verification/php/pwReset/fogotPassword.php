

<div class="form-group p-1">
        <label for="Passwort">Passwort</label>
        <input autocomplete="new-password" class="form-control" type="password" type="text" name="pw" placeholder="Passwort">
    </div>
    <div class="form-group p-1">
        <label for="PasswortWiederholen">Passwort wiederholen</label>
        <input autocomplete="new-password" class="form-control" type="password" type="text" name="pw2" placeholder="Passwort wiederholen">
        <?php
            if($registrierung=="pw"){
                echo "<small class='error' >Your passwords differ!</small><br>";
             }
             if($registrierung=="NotStrongEnough"){
                echo "<small class='error' >Your Password isn't strong enough!<br>Password must be at least nine characters long and
                contain one upper case letter, one lower case letter and
                one number.
                </small><br>";           
             }
             if($registrierung=="success"){
                header("Location: Login.php");          
             }
        ?>