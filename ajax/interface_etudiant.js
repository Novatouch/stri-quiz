

	//fonction se déclenchant au chargement de la page
	// but: permet de lister les matières auquel l'utilisateur à accès



	// fait une requète ajax au controler controler_etudiant.php et au module lister_matieres
	// passage du module par un paramètre de type GET nommé module
	// récupère objet JSON

	$.getJSON("admin/controler/controler_etudiant.php?module=lister_matieres",  
		
	    function(data){  // la fonction qui traitera l'objet reçu	
		
		// parcours de l'objet JSON et ajout de balise et id <li id=""></li>			
		for( var j= 0 ; j < data.length; j++){
		
		    $('#etudiant_matieres ul').append('<li><a href='+data[j]["id"]+'>'+ data[j]["nom"]+'</a></li>');	
		}
	});
	





	// fonction se déclenchant lorsque l'utilisateur clique sur le nom d'une matière
	// but: mettre à jour la liste des cours propre à cette matière auquels l'utilisateur a accès

	$('#etudiant_matieres ul li a').live('click',function(){

	// désactive la fonction de base des balises liens
	e.preventDefault();

	// récupérer id de la matière 
	var id = this.attr('href');
	// vérifie si une matière était déjà sélectionnée et enlève les propriétés CSS

	$lien_selectionne = $('#etudiant_matieres a.selected');


	// retiré la class de la puce  li précdement sélectionné
	$lien_selectionne.removeClass("selected");

	// modifier les paramètres CSS de la matière pour la mettre en évidence
	// rajoute la classe selected au lien clique
	$(this).addClass("selected");

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

	// fait une requète ajax au controler controler_etudiant.php et au module lister_QCM
	// paramètre POST id_cours

	// récupère objet JSON
	// vide la liste des QCM
	// remplit la liste des QCM
	// <li id=".." >nom QCM</li>


	// fait une requète ajax au controler controler_etudiant.php et au module lister_fichiers

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

	//fonction déclenché par un clic sur un Fichier
	// elle lancera le téléchargement du fichier
	$('à définir').live('click',function(){
	});

	//fonction déclenché par par la validation du QCM
	//  récupère les propositions cochés envoi au serveur les données et recoit la note
	$('à définir').live('click',function(){
		
		//format des données à envoyer
		// {"id_qcm":6,"question":[{"id":5,"proposition":[{"id":1},{"id":2}]},{"id":5,"proposition":[{"id":1},{"id":2}]} ]}
	});

