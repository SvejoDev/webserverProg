<?php
session_start();
if(isset($_SESSION['user'])) {
    ?>
    <h1>Välkommen tillbaka <?php echo htmlspecialchars($_SESSION['user']->getFirstName()); ?>!</h1>
    <h2>Din personliga guide till webbutveckling</h2>
    <p>Som inloggad medlem har du tillgång till:</p>
    <ul>
        <li>Exklusiva PHP-tutorials</li>
        <li>Medlemsforum</li>
        <li>Projektexempel</li>
        <li>Personlig projekthantering</li>
    </ul>
    <?php
} else {
    ?>
    <h1>Välkommen till min webbplats</h1>
    <h2>Din guide till webbutveckling</h2>
    <p>Här kommer du hitta information om:</p>
    <ul>
        <li>PHP-programmering</li>
        <li>Webbdesign</li>
        <li>Användbara tips och tricks</li>
    </ul>
    <p>Logga in för att få tillgång till mer innehåll!</p>
    <?php
}
?>