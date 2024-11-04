<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <title>Valutaomvandlare</title>
</head>
<body>
<h1>Omvandla dollar till kronor</h1>
<form action="convert.php" method="post">
    <label>Namn</label>
    <input type="text" name="name">
    <label>Ålder</label>
    <input type="number" name="age">
    <label>Belopp i dollar:</label>
    <input type="number"  name="currency" required>
    <button type="submit">Skicka</button>
    <a href="calculate_age.php?name=Johan&year=2006">Skicka mitt namn och födelseår</a>

</form>

</body>
</html>