<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <title>Visa namn och ålder</title>
</head>
<body>
<?php
if(isset($_GET['name']) && isset($_GET['year'])) {
    $name = $_GET['name'];
    $year = (int)$_GET['year']; // Konvertera till heltal
    $currentYear = date("Y");
    $age = $currentYear - $year;

    echo "<h1>Hej $name!</h1>";
    echo "<p>Du är $age år gammal.</p>";
} else {
    echo "<p>Namn och/eller födelseår saknas.</p>";
}
?>
</body>
</html>