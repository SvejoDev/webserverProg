<h1>Kontakta oss</h1>
<p>Har du frågor eller funderingar? Kontakta oss gärna!</p>

<form action="process_contact.php" method="post">
    <div class="form-group">
        <label for="name">Namn:</label>
        <input type="text" id="name" name="name" required>
    </div>
    
    <div class="form-group">
        <label for="email">E-post:</label>
        <input type="email" id="email" name="email" required>
    </div>
    
    <div class="form-group">
        <label for="message">Meddelande:</label>
        <textarea id="message" name="message" rows="5" required></textarea>
    </div>
    
    <button type="submit">Skicka meddelande</button>
</form>

<div class="contact-info">
    <h2>Andra sätt att nå oss</h2>
    <p>E-post: info@minwebbplats.se</p>
    <p>Telefon: 070-123 45 67</p>
    <p>Adress: Webbgatan 123, 123 45 Webbstad</p>
</div>