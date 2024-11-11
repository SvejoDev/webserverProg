<?php
require_once('../moment2/Person.php');
session_start();

// Kontrollera om användaren är inloggad
if(!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

// Rensa och säkra input data
$message = trim(stripslashes(htmlspecialchars($_POST['message'])));
$username = $_SESSION['user']->getUsername();

// Grundläggande validering
if (empty($message)) {
    header("Location: index.php?page=klotter");
    exit();
}

// Formatera meddelandet med datum
$date = date("Y-m-d H:i");
$formattedMsg = "<div class='message'>\n" .
                "<hr>\n" .
                "<p class='message-header'>Från: " . htmlspecialchars($username) . " - " . $date . "</p>\n" .
                "<p class='message-content'>" . nl2br($message) . "</p>\n" .
                "</div>\n";

// Lägg till i filen
$msgFile = "data/msg.dat";
file_put_contents($msgFile, $formattedMsg, FILE_APPEND);

// Omdirigera tillbaka till klotterplanket
header("Location: index.php?page=klotter");
exit();
?>