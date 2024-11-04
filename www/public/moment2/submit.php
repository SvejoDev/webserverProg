<?php
include './cleanData.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kontrollera att datan kommer från vårt formulär
    if (isset($_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['password'])) {
        // Rensa datan från skadlig kod och oönskade tecken
        $firstname = cleanData($_POST['firstname']);
        $lastname = cleanData($_POST['lastname']);
        $username = cleanData($_POST['username']);
        $password = cleanData($_POST['password']);

        // Skriv ut användardatan
        echo "Förnamn: $firstname<br>";
        echo "Efternamn: $lastname<br>";
        echo "Användarnamn: $username<br>";
        echo "Lösenord: $password<br>";
    } else {
        header("Location: form.php");
        exit;
    }
} else {
    header("Location: form.php");
    exit;
}
?>