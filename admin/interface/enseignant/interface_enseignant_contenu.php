<div id="enseignant_accueil">

	<div id="enseignant_cours">
		<!-- onglet gestion des matiéres (1) ? -->
		<ul>
			<li>
			<!-- requête pour sortir la liste des matiéres accéssible à cet enseignant (2) ? -->
			SELECT nomM 
			FROM MATIERES,FORMATIONS,UTILISATEURS,GROUPES,ACCEDER 
			WHERE UTILISATEURS.nomU=GROUPES.nomU
			AND	GROUPE.promotion=FORMATIONS.promotion
			AND	FORMATIONS.nomM=MATIERES.nomM
			AND 	ACCEDER.nomF=FORMATIONS.nomF
			AND	ACCEDER.nomM=MATIERE.nomM
			AND	nomU="enseignant_cours";
			</li>
		</ul>
	</div>
	<div id="enseignant_qcm">
		<!-- onglet cours (2) ? ?-->
		<ul>
			<li>
			<!-- requete pour sortir la liste des cours liés à la matiére sélectionner (3) ? -->
			<!-- un lien apparait sous le cours "gérer" au survol (4) ? -->
			</li>
		</ul>
	</div>
	<div id="enseignant_fichiers">
		<!-- requete affichant la liste des qcms liés au cours sélectionner (5) ? -->
		<!-- onglet gestion des qcms par fichiers (5) ? -->
		<ul>
			<li></li>
		</ul>
	</div>
</div>
<div id="enseignant_gestion_cours">
<h1>Gestion des cours</h1>
<h2>Ajouter un cours</h2>
<div id="enseignant_gestion_cours-ajouter">
	<form>
			   <p>
			       <label for="nom">Nom du nouveau cours :</label>
			       <input type="text" name="nom" id="nom" /><br />
			   </p>
			   <p>
				   <label for="matiere">Selectionner la matiere à laquelle sera rattaché le cours</label><br />
				   <select name="matiere" id="matiere">
					   <option value="france">France</option>
					   
				   </select>
			   </p>
				<p>Sélectionner les formations auquels sera rattaché le cours</p>
				<p>
				<ul id="liste_formations">
					<li></li>
				</ul>
				<input id="ajouter" type="image" src="" value="Ajouter" />
				<input id="enlever" type="image" src="" value="Enlever" />
				<ul id="liste_formations_cours">
					<li></li>
				</ul>
				</p>
				<p>
				<input id="enregistrer" type="button" src="" value="Enregistrer" />
				</p>
				
				
	</form>
</div>
<h2>Supprimer un cours</h2>
<div id="enseignant_gestion_cours-supprimer">
	<form>
	 <p>
	   <label for="matiere">Filter les cours par la matière</label><br />
	   <select name="matiere" id="matiere">
		   <option value="france">France</option>
		   
	   </select>
	   <label for="cours">Sélectionner le cours</label><br />
	   <select name="cours" id="matiere">
		   <option value="france">France</option>
		   
	   </select>
	</p>
	<p>
				<input id="enregistrer" type="button" src="" value="Enregistrer" />
	</p>
		</form>	   

	
</div>
</div>
<div id="enseignant_gestion_qcm">
<h2>Ajouter un Quiz</h2>
<div id="enseignant_gestion_qcm-ajouter">

<form>
			   <p>
			       <label for="nom">Nom du nouveau quiz :</label>
			       <input type="text" name="nom" id="nom" /><br />
			   <label for="matiere">Filtrer les Quizs par matiere</label><br />
				   <select name="matiere" id="matiere">
					   <option value="france">France</option>
					   
				   </select>
					 <label for="cours">Filtrer les Quizs par cours</label><br />
				   <select name="cours" id="matiere">
					   <option value="france">France</option>
					   
				   </select>
				   
				   Tableau des questions
				   <table id="question" >
						<tr>
						   <th>Intitulé de la question</th>
						   <th>Action</th>
					   </tr>
					   <tr>
						   <td>Carmen</td>
						   <td>33 ans</td>
					   </tr>
					   <tr>
						   <td>Michelle</td>
						   <td>26 ans</td>
					   </tr>
					</table>
					<input id="ajouter_question" type="button" src="" value="Ajouter question" />
					<div id="tableau_proposition">
					<table id="id_question" >
						<tr>
						   <th>Intitulé de la question</th>
						   <th>Action</th>
					   </tr>
					   <tr>
						   <td>Carmen</td>
						   <td>33 ans</td>
					   </tr>
					   <tr>
						   <td>Michelle</td>
						   <td>26 ans</td>
					   </tr>
					</table>
					</div>
					<input id="ajouter_proposition" type="button" src="" value="Ajouter proposition" />
				<input id="enregistrer" type="button" src="" value="Enregistrer" />
				</p>
				
				
</form>
</div>
<h2>Supprimer un Quiz</h2>
<div id="enseignant_gestion_qcm-supprimer">
	<form>
		<p>
				   <label for="matiere">Filtrer les Quizs par matiere</label><br />
				   <select name="matiere" id="matiere">
					   <option value="france">France</option>
					   
				   </select>
					 <label for="cours">Filtrer les Quizs par cours</label><br />
				   <select name="cours" id="matiere">
					   <option value="france">France</option>
					   
				   </select>
				    <label for="cours">Selectionner le Quiz à supprimmer</label><br />
				   <select name="cours" id="matiere">
					   <option value="france">France</option>
					   
				   </select>
		</p>
		<input id="supprimer" type="button" src="" value="Supprimer" />
	</form>
</div>
</div>
<div id="enseignant_gestion_fichiers">
<h2>Ajouter un fichier</h2>
<div id="enseignant_gestion_fichiers-ajouter">
	<form>
		<p>
			
			<label for="nom">Nom du nouveau fichiers :</label>
			<input type="text" name="nom" id="nom" /><br />
			Sélectionner le cours auquel le fichier sera rattaché
			<label for="matiere">Filtrer les cours par matiere</label><br />
				   <select name="matiere" id="matiere">
					   <option value="france">France</option>
					   
				   </select>
					 <label for="cours">Filtrer les fichiers par cours</label><br />
				   <select name="cours" id="cours">
					   <option value="france">France</option>
					   
					</select>
			
			<input id="enregistrer" type="button" src="" value="Enregistrer" />
		</p>
	</form>
</div>
<h2>Supprimer un fichier</h2>
<div id="enseignant_gestion_fichiers-supprimer">
	<form>
		<p>
				   <label for="matiere">Filtrer les fichiers par matiere</label><br />
				   <select name="matiere" id="matiere">
					   <option value="france">France</option>
					   
				   </select>
					 <label for="cours">Filtrer les fichiers par cours</label><br />
				   <select name="cours" id="matiere">
					   <option value="france">France</option>
					   
				   </select>
				    <label for="cours">Selectionner le fichier à supprimmer</label><br />
				   <select name="cours" id="matiere">
					   <option value="france">France</option>
					   
				   </select>
		</p>
		<input id="supprimer" type="button" src="" value="Supprimer" />
	</form>
</div>
<div id="enseignant_resultats">
	<!-- Consultation des résultats (9) ? -->
	<ul>
		<li></li>
	</ul>
</div>
