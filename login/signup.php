<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forgot_password.css"> <!-- Hiermee gebruik je dezelfde stijl als je andere pagina's -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-rraYvDLjHtevsHFtToGOJrhfWzOjCrR+63x7C5P86lnIsOM+my1I92wScgsWTb+eD1iXvCBxG+fQqBtLzEd2Q==" crossorigin="anonymous" />

    <title>Account Aanmaken</title>
</head>
<body>
    <div class="form">
        <div class="box-form">
            <div class="box-login-title">
                <div class="i i-login"></div>
                
                <h2>Account Aanmaken</h2>

            </div>
            <div class="box-login">
                <div class="fieldset-body">
                    <form action="signup_process.php" method="post">
                        <!-- Voeg hier de velden toe voor het aanmaken van een account -->
                        <p class='field'>
                            <label for='signup-user'>Gebruikersnaam</label>
                            <input type='text' id='signup-user' name='signup-username' title='gebruikersnaam' required />
                        </p>
                        <p class='field'>
                            <label for='signup-pass'>Wachtwoord</label>
                            <input type='password' id='signup-pass' name='signup-password' title='wachtwoord' required />
                        </p>
                        <button type="submit" class="btn">Account Aanmaken</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>
