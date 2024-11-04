<?php
require_once('Person.php');
mb_internal_encoding("UTF-8");

// Security checks
if (!isset($_POST['firstName']) || !isset($_POST['lastName']) || 
    !isset($_POST['username']) || !isset($_POST['password'])) {
    header('Location: register.html');
    exit();
}

// Clean input data
$firstName = trim(stripslashes(htmlspecialchars($_POST['firstName'])));
$lastName = trim(stripslashes(htmlspecialchars($_POST['lastName'])));
$username = trim(stripslashes(htmlspecialchars($_POST['username'])));
$password = trim(stripslashes(htmlspecialchars($_POST['password'])));

//Kolla rom strängen är giltig
if (!mb_check_encoding($firstName) || !mb_check_encoding($lastName) || 
    !mb_check_encoding($username) || !mb_check_encoding($password)) {
    header('Location: register.html');
    exit();
}

$file = "../../users.dat";  //Sparar filet utanför public
$users = array();

//om filen users.dat redan finns
if (file_exists($file)) {
    $users = unserialize(file_get_contents($file));
    
    // Kolla om användarnarmnet redan finns
    foreach ($users as $user) {
        if ($user->getUsername() === $username) {
            header('Location: register.html');
            exit();
        }
    }
}

// Skapa ny användare i en assosiativ array
$newUser = new Person($firstName, $lastName, $username, $password);
$users[] = $newUser;

// Spara nya användaren i filen
file_put_contents($file, serialize($users));

// Redirecta till index.html
header('Location: index.html');
exit();
?>