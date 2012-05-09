$(function(){

	//fonction se déclenchant au chargement de la page
	// but: permet de lister les matières auquel l'utilisateur à accès
	$('body').ready(function(){

	// fait une requète ajax au controler controler_etudiant.php et au module lister_matieres
	// passage du module par un paramètre de type POST nommé module

	// récupère objet JSON

	// ajoute des nouvelles balises à la balise div etudiant_matieres corespondant aux matières
	// sous la forme suivante <li id="..."> </li>

	});





	// fonction se déclenchant lorsque l'utilisateur clique sur le nom d'une matière
	// but: mettre à jour la liste des cours propre à cette matière auquels l'utilisateur a accès

	$('à définir').live('click',function(){

	// récupérer id de la matière 

	// vérifie si une matière était déjà sélectionnée et enlève les propriétés CSS
	// modifier les paramètres CSS de la matière pour la mettre en évidence

	// fait une requète ajax au controler controler_etudiant.php et au module lister_cours
	// paramètre POST id_matiere

	// récupère objet JSON
	// vide la liste des cours
	// remplit la liste des cours
	// <li id=".." ></li>
	});

	// fonction se déclenchant lorsque l'utilisateur clique sur le nom d'un cours
	// but: mettre à jour la liste des fichiers et des QCM accessible à l'utilisateur

	$('à définir').live('click',function(){

	// récupérer id de la matière 

	// vérifie si un cours était déjà sélectionné et enlève les propriétés CSS
	// modifier les paramètres CSS du cours sélectionné pour le mettre en évidence

	// fait une requète ajax au controler controler_etudiant.php et au module lister_QCM_fichiers
	// paramètre POST id_cours

	// récupère objet JSON
	// vide la liste des QCM
	// remplit la liste des QCM
	// <li id=".." >nom QCM</li>

	// vide la liste des fichiers
	// remplit la liste des fichiers
	// <li id=".." >nom Fichier</li>
	});



	//fonction déclenché par un clic sur un QCM
	// elle chargera le QCM
	$('à définir').live('click',function(){
	
	// récupération des questions et des propositions auprès du serveur
	// id + texte
	// envoi d'une requête au serveur 
	// controler : controler_etudiant.php
	// module :	lister_questions_propositions_qcm
	// paramètre: id_qcm

	// Récupération objet JSON

	// affichage et vidage du contenu du div ayant l'id "etudiant_qcm"

	// Affichage questions et propostions
	// id + texte
	// format: 

	// ajout d'un bouton de validation du QCM
	// <input type="submit" name="Valider" id="Valider" />
	});
}
