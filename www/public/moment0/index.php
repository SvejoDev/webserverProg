<!doctype html>
<html>
<head lang="sv"></head>
<?php
include("../inc/header.html")
?>
<body>
<h1>Matematik-test</h1>
<form action="evaluate.php" method="post">
   <fieldset>
       <legend>Frågor</legend>
       <label>Namn: </label>
       <input type="text" name="username" required>
       <br>
       <label>4 + 5 = </label>
       <input type="text" name="q1">
       <br>
       <label>3 x 5 = </label>
       <input type="text" name="q2">
       <br>
       <label>6 - 2 = </label>
       <input type="text" name="q3">
       <br>
       <label>8 / 4 = </label>
       <input type="text" name="q4">
       <br>
       <label>7 + 3 = </label>
       <input type="text" name="q5">
       <br>
       <label>2 + 2 = </label>
       <input type="text" name="q6">
       <br>
       <label>5 x 3 = </label>
       <input type="text" name="q7">
        <input type="submit" value="Rätta">

   </fieldset>
</form>
</body>
</html>