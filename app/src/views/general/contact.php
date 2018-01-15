<?php include(__DIR__."/../templates/main/navbar.php") ?>

<style>
.body {
  font-family: Roboto, serif;
}

.aboutFrame {
  border: 1px solid;
  display: inline-block;
  overflow: auto;
  float: left;
  height: 100%;
}

.contactFrame {
  border: 2px dotted;
  display: inline-block;
  float: right;
  height: 100%;
}

.contactform {
  text-align: center;
}

input[type=text], input[type=email] {
    width: 50%;
    margin-top: 8px;
    margin-bottom: 8px;
}

textarea {
    width: 56%;
    border: 1px solid #ccc;
    margin-top: 8px;
    margin-bottom: 8px;
}
</style>

<div>
  <table class="aboutFrame">
    <tr>
      <td>Telephone </td>
      <td>0123456789</td>
    </tr>
    <tr>
      <td>Email </td>
      <td>support@homeisep.com</td>
    </tr>
    <tr>
      <td>Addresse</td>
      <td>10 rue de Vanves, 92130 Issy-les-Moulineaux</td>
    </tr>
    <tr>
      <td></td>
      <td><iframe name="addresse isep" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyArELkdidNIXX2jnYgDvGSbqIgCQpdePMU&q=ISEP, Rue de Vanves, Issy-les-Moulineaux" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe></td>
    </tr>
   </table>
</div>
<div>
  <fieldset class="contactFrame">
    <legend>Nous Contacter</legend>
      <div class="contactform">
        Envoyez-nous un mail <img src="https://cdn0.iconfinder.com/data/icons/cosmo-work/40/mail-512.png" height=64 width=64><br>
          <form method="post" name="contact_us"
action="contact-us-handler.php">
            <label>Mail <input id="email" type="email" name="email" placeholder="surname@example.com" value="<?php if (isset($_COOKIE['email'])){ echo $_COOKIE['email'];} ?>"></label><br>
        		<label>Nom <input id="surname" type="text" name="surname" placeholder="Votre Nom" value="<?php if (isset($_COOKIE['surname'])){ echo $_COOKIE['surname'];} ?>"></label><br>
        		<label>Objet <input id="subject" type="text" name="subject" placeholder="Objet du mail"></label><br>
			    	<textarea id="messageContent" cols="35" rows="5" wrap="physical" placeholder="Contenu du message"></textarea><br>
        			<input type="submit" value="Envoyer">
			    </form>
      </div>
  </fieldset> 
</div>
