<?php
if (!class_exists('Person')) {
    require_once('../../moment2/Person.php');
}
?>
<h1>Webbserverprogrammering 1 med Bygren</h1>
<?php
if(isset($_SESSION['user'])) {
    echo "<div class='user-info'>
            <p>Inloggad som: " . htmlspecialchars($_SESSION['user']->getFirstName()) . " " . 
            htmlspecialchars($_SESSION['user']->getLastName()) . 
            " | <a href='logout.php'>Logga ut</a></p>
          </div>";
}
?>

<style>
    
</style>