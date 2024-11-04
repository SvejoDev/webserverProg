<?php
    function cleanData($data) {
    // Ta bort onödiga mellanslag i början och slutet av strängen
    $data = trim($data);
    // Ta bort backslash-tecken
    $data = stripslashes($data);
    // Konvertera specialtecken till HTML-entiteter för att förhindra skadlig kod
    $data = htmlspecialchars($data);
    return $data;
}
?>