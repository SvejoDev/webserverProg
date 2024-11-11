<h1>Klotterplanket</h1>

<form action="./saveMsg.php" method="post">
    <div class="form-group">
        <label for="message">Meddelande:</label>
        <textarea id="message" name="message" rows="5" cols="45" required></textarea>
    </div>
    
    <input type="submit" value="Skicka">
</form>

<?php 
    $msgFile = "./data/msg.dat";
    if(file_exists($msgFile)){
        echo file_get_contents($msgFile);
    } else {
        file_put_contents($msgFile, "");
    }
?>