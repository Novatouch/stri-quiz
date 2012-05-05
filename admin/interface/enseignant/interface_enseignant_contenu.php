<div id="enseignant_accueil">
	<div id="enseignant_matieres">
		<!-- onglet gestion des matiéres (1) ? -->
		<ul>
			<li>
			<!-- requête pour sortir la liste des matiéres accéssible à cet enseignant (2) ? -->
			</li>
		</ul>
	</div>
	<div id="enseignant_cours">
		<!-- onglet cours (2) ? ?-->
		<ul>
			<li>
			<!-- requete pour sortir la liste des cours liés à la matiére sélectionner (3) ? -->
			<!-- un lien apparait sous le cours "gérer" au survol (4) ? -->
			</li>
		</ul>
	</div>
	<div id="enseignant_qcm_fichiers">
		<!-- requete affichant la liste des qcms liés au cours sélectionner (5) ? -->
		<!-- onglet gestion des qcms par fichiers (5) ? -->
		<ul>
			<li></li>
		</ul>
	</div>
</div>
<div id="enseignant_qcm">
	<!-- 3 balises de type sélection dans une liste déroulante intitulé QCM, Formation et Groupe (6) ? -->
	<!-- onglet effectuant les qcm(s) (7) ? -->
		<ul>
			<li>
				<?php
					echo "<p>QCM</p>";
				?>
				<select name="qcm" id="qcm">
					<option value="qcm1">qcm1</option>
					<option value="qcm2">qcm2</option>
				</select>
				<p>Titre</p>
				<form> <textarea>Titre</textarea></form>
				<select name="matiere" id="matiere">
					<option value="matiere1">matiere1</option>
					<option value="matiere2">matiere2</option>
				</select>
				<select name="cours" id="cours">
					<option value="cours1">cours1</option>
					<option value="cours2">cours2</option>
				</select>
				<select name="questions" id="questions">
					<option value="question1">question1</option>
					<option value="question2">question2</option>
				</select>
				<?php
					echo "<table>";
					echo "<tr><td>Intitulé de la proposition</td><td>Points</td></tr>";
					echo "<tr><td>intitulé de la poposition1</td><td>Points associé à la proposition</td></tr>";
					//bien entendu tout cela etant gérer par la base de données et le tableau etant générer
					//dynamiquement par l'utilisation de la base de données
					echo "</table>";
				?>
				<!-- création des boutons "ajouter proposition" qui est plus un lien, "supprimer question", "enregistrer qcm",
				"supprimer QCM" (8) ? -->
			</li>
		</ul>
</div>
<div id="enseignant_resultats">
	<!-- Consultation des résultats (9) ? -->
	<ul>
		<li></li>
	</ul>
</div>
