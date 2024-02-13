<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="forgot_password.css">
  <title>Wachtwoord Reset</title>
</head>
<body>

<div class="form">
  <h2>Wachtwoord Reset</h2>

  <!-- Voeg hier je inputvelden, knoppen en andere elementen toe -->
  <form method="post" action="forgot_password_process.php">
    <label for="email">E-mailadres:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit" class="btn">Reset Wachtwoord</button>
  </form>

</div>

</body>
</html>
