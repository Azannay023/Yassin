<?php
session_start();

$database = 'localhost';
$database_user = 'root';
$database_password = '';
$database_name = 'login';

// Connect naar de database
$con = mysqli_connect($database, $database_user, $database_password, $database_name);

if (mysqli_connect_error()) {
    exit('Failed to connect to the database: ' . mysqli_connect_error());
}

if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $retrieved_password);
        $stmt->fetch();

        // Controleer het wachtwoord zonder hashing
        if ($_POST['password'] === $retrieved_password) {
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location: home.php');
        } else {
            $_SESSION['login_error'] = 'Onjuiste Wachtwoord!';
            header('Location: index.php');
        }
    } else {
        $_SESSION['login_error'] = 'Onjuiste Gebruikersnaam!';
        header('Location: index.php');
    }

    $stmt->close();
    exit();
}
?>