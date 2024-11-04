<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <title>Resultat</title>
</head>
<body>
<h1>Valutan i kronor</h1>
<?php
if(isset($_POST['currency'])) {
    $dollar = $_POST['currency'];
    $sek = $dollar * 9.7; // Antag att 1 dollar = 9.7 SEK
    
    echo "<p>$dollar USD = $sek SEK</p>";
} else {
    echo "<p>Inget belopp angivet.</p>";
}

if(isset($_POST['age'])) {
    $age = $_POST['age'];
    $ageToPension = 65 - $age; 

    echo "<p>År kvar till pension: $ageToPension år<p>";
}
else {
    echo "<p>Ingen ålder angavs<p>";
}
?>
</body>
</html>