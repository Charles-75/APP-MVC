<?php include(__DIR__."/../templates/main/navbar.php") ?>

<style>
    #messageContent {
        height: 200px;
    }
</style>


<div class="container">
  <div class="card">
    <h1>Nous Contacter</h1>
    <form method="post" name="contact_us" action="contact-us-handler.php">
        <label>Votre adresse e-mail :</label>
        <input id="email" type="email" name="email" placeholder="surname@example.com" value="<?php if (isset($_COOKIE['email'])){ echo $_COOKIE['email'];} ?>"><br>
        <label>Votre nom :</label>
        <input id="surname" type="text" name="surname" placeholder="Votre Nom" value="<?php if (isset($_COOKIE['surname'])){ echo $_COOKIE['surname'];} ?>"><br>
        <label>Object du mail :</label>
        <input id="subject" type="text" name="subject" placeholder="Objet du mail"><br>
        <label for="messageContent">Contenu de votre message :</label>
        <textarea id="messageContent" wrap="physical" placeholder="Contenu du message"></textarea>
        <input type="submit" value="Envoyer" class="bouton">
    </form>
  </div>
</div>
