<div id="enseignant_accueil">
	<div id="enseignant_matieres">
		<!-- onglet gestion des mati�res (1) ? -->
		<ul>
			<li>
			<!-- requ�te pour sortir la liste des mati�res acc�ssible � cet enseignant (2) ? -->
			</li>
		</ul>
	</div>
	<div id="enseignant_cours">
		<!-- onglet cours (2) ? ?-->
		<ul>
			<li>
			<!-- requete pour sortir la liste des cours li�s � la mati�re s�lectionner (3) ? -->
			<!-- un lien apparait sous le cours "g�rer" au survol (4) ? -->
			</li>
		</ul>
	</div>
	<div id="enseignant_qcm_fichiers">
		<!-- requete affichant la liste des qcms li�s au cours s�lectionner (5) ? -->
		<!-- onglet gestion des qcms par fichiers (5) ? -->
		<ul>
			<li></li>
		</ul>
	</div>
</div>
<div id="enseignant_qcm">
	<!-- 3 balises de type s�lection dans une liste d�roulante intitul� QCM, Formation et Groupe (6) ? -->
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
					echo "<tr><td>Intitul� de la proposition</td><td>Points</td></tr>";
					echo "<tr><td>intitul� de la poposition1</td><td>Points associ� � la proposition</td></tr>";
					//bien entendu tout cela etant g�rer par la base de donn�es et le tableau etant g�n�rer
					//dynamiquement par l'utilisation de la base de donn�es
					echo "</table>";
				?>
				<!-- cr�ation des boutons "ajouter proposition" qui est plus un lien, "supprimer question", "enregistrer qcm",
				"supprimer QCM" (8) ? -->
			</li>
		</ul>
</div>
<div id="enseignant_resultats">
	<!-- Consultation des r�sultats (9) ? -->
	<ul>
		<li></li>
	</ul>
</div>
