<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sjekk pålogging</title>
</head>
<body>
<?php
session_start(); // Start sesjonen

if (isset($_POST['submit'])) {
    $brukernavn = $_POST['brukernavn'];
    $passord = $_POST['passord'];

    $dbc = mysqli_connect('localhost', 'root', 'Admin', 'terminoppgave')
        or die('Error connecting to MySQL server.');

    $query = "SELECT username, password from users where username='$brukernavn' and password='$passord'";

    $result = mysqli_query($dbc, $query)
        or die('Error querying database.');

    mysqli_close($dbc);

    if ($result->num_rows > 0) {
        // Gyldig login - Lagre brukernavn i session
        $_SESSION['username'] = $brukernavn;
        header('location: success.html');
        exit(); // Viktig å avslutte skriptet etter header redirect
    } else {
        // Ugyldig login
        header('location: failure.html');
        exit(); // Viktig å avslutte skriptet etter header redirect
    }
}
?>
</body>
</html>



