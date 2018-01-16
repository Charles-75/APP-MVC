<?php include(__DIR__."/../templates/main/navbar.php") ?>


<style>

.cd-faq-trigger:hover {
  cursor: pointer;
  background-color: #ccc;
  
}
.cd-faq-trigger {
  padding: 1em;
  background-color: #eee;
  text-align: left;
}

</style>



<div>
<section class="cd-faq">
	<ul class="cd-faq-categories">
		<li><a href="#basics">Basique</a></li>
		<li><a href="#advanced">Avancée</a></li>
		<li><!-- ... --></li>
	</ul>

	<div class="cd-faq-items">
		<ul id="basics" class="cd-faq-group">
			<li class="cd-faq-title"><h2>F.A.Q. Basique</h2></li>
			
				<details><summary class="cd-faq-trigger">Comment créer un compte ?</summary>
				<div class="cd-faq-content">
					Rendez-vous sur la page d'accueil et cliquez sur "Inscription" ou cliquez directement <a href="/register">ici</a>.
				</div>
				</details>
			

			
				<details><summary class="cd-faq-trigger">Comment modifier mon mot de passe ?</summary>
				<div class="cd-faq-content">
					Connectez-vous au site à l'aide de vos identifiants de connexion puis cliquez sur l'icone du Profil puis sur le boutton "Modifier".
				</div>
				</details>
			

			
				<details><summary class="cd-faq-trigger">Comment créer un appartement ?</summary>
				<div class="cd-faq-content">
					Accedéz à la rubrique "Mes appartements" puis cliquez sur "Ajouter un appartement" et renseignez les informations demandées. N'oubliez pas de valider les informations complétées.
				</div>
				</details>
			

			
				<details><summary class="cd-faq-trigger">Comment ajouter une pièce ?</summary>
				<div class="cd-faq-content">
					Bla.
				</div>
				</details>
			

			
				<details><summary class="cd-faq-trigger">Comment ajouter un capteur ?</summary>
				<div class="cd-faq-content">
					Bla.
				</div>
				</details>
			

			<li>
				<details><summary class="cd-faq-trigger">Comment modifier les droits des utilisateurs ?</summary>
				<div class="cd-faq-content">
					Bla.
				</div>
				</details>
			</li>

			<li>
				<details><summary class="cd-faq-trigger">?</summary>
				<div class="cd-faq-content">
					Bla.
				</div>
				</details>
			</li>

			<li>
				<details><summary class="cd-faq-trigger">?</summary>
				<div class="cd-faq-content">
					Bla.
				</div>
				</details>
			</li>

			<li>
				<details><summary class="cd-faq-trigger">?</summary>
				<div class="cd-faq-content">
					Bla.
				</div>
				</details>
			</li>

			<li>
				<details><summary class="cd-faq-trigger">?</summary>
				<div class="cd-faq-content">
					Bla.
				</div>
				</details>
			</li>

			<li><!-- ... --></li>
		</ul>

		<ul id="advanced" class="cd-faq-group">
			<li class="cd-faq-title"><h2>F.A.Q. Avancée</h2></li>
			<li>
				<details><summary class="cd-faq-trigger">Comment créer un ordre ?</summary>
				<div class="cd-faq-content">
					Bla.
				</div>
				</details>
			</li>

			<li>
				<details><summary class="cd-faq-trigger">Comment modifier un ordre?</summary>
				<div class="cd-faq-content">
					Bla.
				</div>
				</details>
			</li>

		</ul>

		<!-- ... -->
	</div>
</section>
</div>
