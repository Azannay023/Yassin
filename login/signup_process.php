<?php
// signup_process.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleer of de vereiste velden zijn ingevuld
    if (!empty($_POST['signup-username']) && !empty($_POST['signup-password'])) {
        $username = $_POST['signup-username'];
        $password = password_hash($_POST['signup-password'], PASSWORD_DEFAULT);

        // Hier kun je verdere verwerking doen, zoals het opslaan van de gegevens in de database

        // Voorbeeld: Verbinding maken met de database (vervang deze gegevens door de juiste databasegegevens)
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $dbname = "login";

        $conn = new mysqli($servername, $db_username, $db_password, $dbname);

        // Controleer de verbinding
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Voer de query uit om de gebruiker toe te voegen aan de database
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Account succesvol aangemaakt, stuur de gebruiker door naar de inlogpagina
            header("Location: index.php?signup=success");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        // Als niet alle vereiste velden zijn ingevuld, geef een foutmelding
        echo "Vul alle vereiste velden in.";
    }
} else {
    // Als het geen POST-verzoek is, leid de gebruiker om naar de signup-pagina
    header("Location: signup.php");
    exit();
}
?>
