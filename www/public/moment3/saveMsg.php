<?php
session_start();

// Clean and secure input data
$name = trim(stripslashes(htmlspecialchars($_POST['name'])));
$message = trim(stripslashes(htmlspecialchars($_POST['message'])));

// Basic validation
if (empty($name) || empty($message)) {
    header("Location: index.php?page=klotter");
    exit();
}

// Format the message with date
$date = date("Y-m-d H:i");
$formattedMsg = "<div class='message'>\n" .
                "<hr>\n" .
                "<p class='message-header'>Från: " . $name . " - " . $date . "</p>\n" .
                "<p class='message-content'>" . nl2br($message) . "</p>\n" .
                "</div>\n";

// Append to file
$msgFile = "data/msg.dat";
file_put_contents($msgFile, $formattedMsg, FILE_APPEND);

// Redirect back to guestbook
header("Location: index.php?page=klotter");
exit();
?>