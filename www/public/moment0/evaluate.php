<!doctype html>
<html>
<head lang="sv"></head>
<?php
include("../inc/header.html")
?>
<body>
<h1>Matematiktest</h1>
<h2>Resultat</h2>
<?php
    $username = $_POST['username'];
    $ans1 = $_POST['q1'];
    $ans2 = $_POST['q2'];
    $ans3 = $_POST['q3'];
    $ans4 = $_POST['q4'];
    $ans5 = $_POST['q5'];
    $ans6 = $_POST['q6'];
    $ans7 = $_POST['q7'];
    $points = 0;
    
    if($ans1 == 9) $points++;
    if($ans2 == 15) $points++;
    if($ans3 == 4) $points++;
    if($ans4 == 2) $points++;
    if($ans5 == 10) $points++;
    if($ans6 == 4) $points++;
    if($ans7 == 15) $points++;
    
    echo("<p>$username, du fick " . $points . " av 5 möjliga</p>");

    if($points <= 2) {
        echo("<p>Läs på mer och försök igen</p>");
    } elseif($points <= 4) {
        echo("<p>Godkänd</p>");
    } else {
        echo("<p>Bra, du behärskar det mesta.</p>");
    }?>
</body>
</html>