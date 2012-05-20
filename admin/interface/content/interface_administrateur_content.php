<div id="administrateur_gestion_utilisateur">
	<h2>Ajouter un utilisateur</h2>
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
	<h2>Modifier un utilisateur</h2>
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
	<h2>Supprimer un utilisateur</h2>
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
				<label for="bouton_supprimer">Nom utilisateur</label>
			       <input type="submit" name="Supprimer utilisateur" id="bouton_supprimer" />
				<br />
			</form>
		</div>
	</div>
</div>
<div id="administrateur_gestion_matiere">
	<h2>Ajouter une matière</h2>
	<div id="administrateur_gestion_matiere-ajouter">
		<form>
		   <p>
		        <label for="nom_matiere">Nom de la matière :</label>
		        <input type="text" name="nom_matiere" id="nom_matiere" />
			<input type="submit" name="Enregistrer" id="Enregistrer" />
		  </p>
		
		</form>
	</div>
	<h2>Modifier une matière</h2>
	<div id="administrateur_gestion_matiere-modifier">
		<form>
			   <p>
				<select name="liste_matiere" id="liste_matiere">
				   <option value="matiere1">Maths</option>
				</select>
			  </p>
			<!-- Afficheras la liste des enseignant assignée à cette matière -->
		<div id="menu_liste_enseignant">
			<ul>
				<li id=""><li>
			</ul>
		</div>
		<div id="menu_bouton_enseignant">
			 <img src="" alt="Ajouter enseignant à la matière" />
			 <img src="" alt="Retirer l'enseignant de la matière" />
		</div>
			
		<!-- Afficheras la liste des enseignant n'étant pas assignés à cette matière -->
		<div id="menu_liste_enseignant">
			<ul>
				<li id=""><li>
			</ul>
		</div>
		</form>
	</div>
	<h2>Supprimer une matière</h2>
	<div id="administrateur_gestion_matiere-supprimer">
		<form>
		   <p>
			<select name="liste_matiere" id="liste_matiere">
			   <option value="matiere1">France</option>
		        </select>
			<input type="submit" name="Supprimer" id="Supprimer" />
		  </p>
		
		</form>
	</div>
	
</div>
<div id="administrateur_gestion_groupe">
	<p>Gestion Des Groupes</p>
</div>
<div id="administrateur_gestion_formations">
	<h2>Ajouter une Formation</h2>
	<div id="administrateur_gestion_formation-ajouter">
		<form>
		   <p>
		        <label for="nom_formation">Nom de la formation :</label>
		        <input type="text" name="nom_formation" id="nom_formation" />
			<input type="submit" name="Enregistrer" id="Enregistrer" />
		  </p>
		
		</form>
	</div>
	<h2>Modifier une formation</h2>
	<div id="administrateur_gestion_formation-modifier">
		<form>
			   <p>
				<select name="liste_formation" id="liste_formation">
				   <option value="formation1">L3 Stri</option>
				</select>
			  </p>
			<!-- Afficheras la liste des enseignant assignée à cette matière -->
		<div id="menu_liste_matiere">
			<ul>
				<li id=""><li>
			</ul>
		</div>
		<div id="menu_bouton_matiere">
			 <img src="" alt="Ajouter matière à la Formation" />
			 <img src="" alt="Retirer la matière de la Formation" />
		</div>
			
		<!-- Afficheras la liste des enseignant n'étant pas assignés à cette matière -->
		<div id="menu_liste_matiere">
			<ul>
				<li id=""><li>
			</ul>
		</div>
		</form>
	</div>
	<h2>Supprimer une formation</h2>
	<div id="administrateur_gestion_formation-supprimer">
		<form>
		   <p>
			<select name="liste_formation" id="liste_formation">
			   <option value="formation1">formation</option>
		        </select>
			<input type="submit" name="Supprimer" id="Supprimer" />
		  </p>
		
		</form>
	</div>
</div>

<?php
include_once("interface_enseignant_content.php");
?>
