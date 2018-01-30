<?php include(__DIR__."/../templates/main/navbar.php") ?>


<style>
.cd-faq-categories {
  color: deepskyblue;
}
.cd-faq-trigger:hover {
  cursor: pointer;
  background-color: #ccc;

}
.cd-faq-trigger {
  padding: 1em;
  background-color: #eee;
  text-align: left;
}
.cd-faq-content {
  padding: 0.5em;
  background-color: #ddd;
}
</style>


<div>
<section class="cd-faq">
	<ul>
		<a class="cd-faq-categories" href="#basics">Basique</a><br>
		<a class="cd-faq-categories" href="#advanced">Avancée</a><br>
	</ul>

	<div class="cd-faq-items">
		<ul id="basics" class="cd-faq-group">
			<h2 class="cd-faq-title">F.A.Q. Basique</h2>

				<details><summary class="cd-faq-trigger">Comment créer un compte ?</summary>
				  <div class="cd-faq-content">
					  Rendez-vous sur la page d'accueil et cliquez sur "Inscription" ou cliquez directement <a href="/register">ici</a>.
				  </div>
				</details>

				<details><summary class="cd-faq-trigger">Comment modifier mon mot de passe ?</summary>
				  <div class="cd-faq-content">
					  Connectez-vous au site à l'aide de vos identifiants de connexion puis cliquez sur l'icone du <a href="/profile">Profil</a> puis sur le boutton "Modifier".
				  </div>
				</details>

				<details><summary class="cd-faq-trigger">Comment créer un appartement ?</summary>
				  <div class="cd-faq-content">
					  Accedéz à la rubrique "Mes maisons" puis cliquez sur "Ajouter un appartement" et renseignez les informations demandées. N'oubliez pas de valider les informations complétées.
				  </div>
				</details>

				<details><summary class="cd-faq-trigger">Comment ajouter une pièce ?</summary>
				  <div class="cd-faq-content">
					  Rendez-vous sur la page d'accueil de l'appartement auquel vous souhaitez ajouter une pièce et cliquez sur le boutton "Ajouter une pièce" dans la colonne centrale.
				  </div>
				</details>

				<details><summary class="cd-faq-trigger">Comment ajouter un capteur ?</summary>
				  <div class="cd-faq-content">
					  Rendez-vous sur la page d'accueil de l'appartement auquel vous souhaitez ajouter un capteur et cliquez sur le boutton "Ajouter un capteur" dans la colonne de gauche.
				  </div>
				</details>

				<details><summary class="cd-faq-trigger">Comment modifier les droits des utilisateurs ?</summary>
				  <div class="cd-faq-content">
				  	Rendez-vous sur la page de vos appartements et cliquez au choix sur le bouton "Ajouter invité" ou "Supprimer invité(s)".
				  </div>
				</details>

				<details><summary class="cd-faq-trigger">Comment modifier mes informations personnelles ?</summary>
				  <div class="cd-faq-content">
				  	Rendez-vous sur votre page de <a href="/profile">Profil</a> et cliquez sur "Modifier".
				  </div>
				</details>

				<details><summary class="cd-faq-trigger">Que faire si mon problème n'est pas couvert pas cette FAQ?</summary>
				  <div class="cd-faq-content">
				  	Vous avez 2 possibilités :<br>
            S'il s'agit d'un problème technique comme l'installation ou l'utilisation d'un capteur, ouvrez un ticket en accédant à <a href="/addticket">la page d'ouverture de ticket</a> en détaillant le plus possible votre problème.<br>
            S'il s'agit d'une question plus générale, rendez-vous sur la page de <a href="/contact">contact</a> et envoyez-nous un mail en détaillant le plus possible votre demande.
				  </div>
				</details>
		</ul>

		<ul id="advanced" class="cd-faq-group">
			<h2 class="cd-faq-title">F.A.Q. Avancée</h2>
        <details><summary class="cd-faq-trigger">Comment créer un ordre ?</summary>
          <div class="cd-faq-content">
            Rendez-vous sur la page de votre appartement et cliquez sur le boutton "Ajouter un ordre".
          </div>
        </details>

        <details><summary class="cd-faq-trigger">Comment modifier un ordre ?</summary>
				  <div class="cd-faq-content">
					  Si vous voulez supprimer un ordre, vous pouvez le faire depuis la page de gestion des ordres.
			    </div>
				</details>

				<details><summary class="cd-faq-trigger">Comment ajouter un actionneur ?</summary>
				  <div class="cd-faq-content">
					   Rendez-vous sur la page de votre appartement et cliquez sur le boutton "Ajouter un capteur".
				  </div>
				</details>
		</ul>

	</div>
</section>
</div>
