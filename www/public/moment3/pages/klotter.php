<h1>Klotterplanket</h1>

<form action="./saveMsg.php" method="post">  <!-- Uppdaterad sökväg -->
    <div class="form-group">
        <label for="name">Namn:</label>
        <input type="text" id="name" name="name" required>
    </div>
    
    <div class="form-group">
        <label for="message">Meddelande:</label>
        <textarea id="message" name="message" rows="5" cols="45" required></textarea>
    </div>
    
    <input type="submit" value="Skicka">
</form>

<?php 
    $msgFile = "./data/msg.dat";  // Uppdaterad sökväg
    if(file_exists($msgFile)){
        echo file_get_contents($msgFile);
    } else {
        // Create empty file if it doesn't exist
        file_put_contents($msgFile, "");
    }
?>