<nav>
	<ul>
		<li>Gestion utilisateurs</li>
		<li>Gestion matières</li>
		<li>Gestion groupes</li>
		<li>Gestion formations</li>
	</ul>
</nav>

<div id="administrateur_interface">
	<div id="administrateur_gestion_utilisateur">
		<div id="administrateur_gestion_utilisateur-ajouter">
			<form>
			   <p>
			       <label for="nom">Identifiant :</label>
			       <input type="text" name="nom" id="nom" />
			       <label for="prenom">Votre mot de passe :</label>
			       <input type="text" name="pass" id="prenom" />
				<br />
			       <br />
			       <label for="prenom">Prenom :</label>
			       <input type="text" name="pass" id="prenom" />
				<br />
				<label for="nom">Nom :</label>
			       <input type="text" name="pass" id="nom" />
				<br />
				<label for="mdp">Mot de passe :</label>
			       <input type="text" name="pass" id="mpd" />
				<br />
				
			       <label for="typeCompte">Sélectionner le type de compte</label><br />
			       <select name="typeCompte" id="typeCompte">
				   <option value="france">France</option>
			       </select>
				<input type="submit" name="Ajouter" id="Ajouter" />
			   </p>
			</form>
		</div>
		
		<div id="administrateur_gestion_utilisateur-modifier">

			<!-- Afficheras la liste des utilisateur -->
			<div id="menu_liste_utilisateur">
				<ul>
					<li id=""><li>
				</ul>
			</div>
			<!-- Sera afficher lorsque un utilisateur aura été sélectionné les champs seront remplis automatiquement -->
			<div id="menu_liste_utilisateur">
				<form>
			   <p>
			       <label for="nom">Identifiant :</label>
			       <input type="text" name="nom" id="nom" />
			       <label for="prenom">Votre mot de passe :</label>
			       <input type="text" name="pass" id="prenom" />
				<br />
			       <br />
			       <label for="prenom">Prenom :</label>
			       <input type="text" name="pass" id="prenom" />
				<br />
				<label for="nom">Nom :</label>
			       <input type="text" name="pass" id="nom" />
				<br />
				<label for="mdp">Mot de passe :</label>
			       <input type="text" name="pass" id="mpd" />
				<br />
				
			       <label for="typeCompte">Sélectionner le type de compte</label><br />
			       <select name="typeCompte" id="typeCompte">
				   <option value="france">France</option>
			       </select>
				<input type="submit" name="modifier" id="modifier" />
			   </p>
			</form>
			</div>
		</div>
		<div id="administrateur_gestion_utilisateur-supprimer">
			<!-- Afficheras la liste des utilisateur -->
			<div id="menu_liste_utilisateur">
				<ul>
					<li id=""><li>
				</ul>
			</div>
			<!-- Apparaittera si un utilisateur a été sélectionné -->
			<div id="bouton_supprimer">
				<form>
					<label for="mdp">Mot de passe :</label>
				       <input type="text" name="pass" id="mpd" />
					<br />
				</form>
			</div>
		</div>
	</div>
	<div id="administrateur_gestion_matiere">
		<div id="administrateur_gestion_utilisateur-ajouter">
			<form>
			   <p>
			        <label for="nom_matiere">Nom de la matière :</label>
			        <input type="text" name="nom_matiere" id="nom_matiere" />
				<input type="submit" name="Enregistrer" id="Enregistrer" />
			  </p>
			
			</form>
		</div>
		<div id="administrateur_gestion_utilisateur-modifier">
			<form>
			   <p>
				<select name="liste_matiere" id="liste_matiere">
				   <option value="matiere1">France</option>
			        </select>
				<input type="submit" name="Supprimer" id="Supprimer" />
			  </p>
			
			</form>
		</div>
		<div id="administrateur_gestion_utilisateur-supprimer">
		</div>
	</div>
	<div id="administrateur_gestion_groupe">
	</div>
	<div id="administrateur_gestion_formations">
	<div>
<?php
	include_once("interface_enseignant_contenu.php");
?>
</div>	
