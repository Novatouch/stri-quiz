
//jQuery.noConflict();

	//fonction se déclenchant au chargement de la page
	// but: permet de lister les matières auquel l'utilisateur à accès



	// fait une requète ajax au controler controler_etudiant.php et au module lister_matieres
	// passage du module par un paramètre de type GET nommé module
	// récupère objet JSON

	$.getJSON("admin/controler/controler_etudiant.php?module=lister_matieres",  
		
	    function(data){  // la fonction qui traitera l'objet reçu	
		
		// parcours de l'objet JSON et ajout de balise et id <li id=""></li>			
		for( var j= 0 ; j < data.length; j++){
		
		    $('#etudiant_matieres ul').append('<li><a href='+data[j].id+'>'+ data[j].nom+'</a></li>');	
		}
	});
	





	// fonction se déclenchant lorsque l'utilisateur clique sur le nom d'une matière
	// but: mettre à jour la liste des cours propre à cette matière auquels l'utilisateur a accès

	$('#etudiant_matieres  li').live('click',function(e){

	// désactive la fonction de base des balises liens
	e.preventDefault();

	// vérifie si une matière était déjà sélectionnée et enlève les propriétés CSS

	$lien_selectionne = $('#etudiant_matieres li.selected');


	// retiré la class de la puce  li précdement sélectionné
	$lien_selectionne.removeClass("selected");

	// modifier les paramètres CSS de la matière pour la mettre en évidence
	// rajoute la classe selected au lien clique
	$(this).addClass("selected");

	// vider la liste des cours
	var selecteur = "#etudiant_cours ul";
	$liste_cours = $(selecteur);
	$liste_cours.empty();

	// récupérer id de la matière 
	$lien_selectionne = $('#etudiant_matieres li.selected a');
	var id = $lien_selectionne.attr('href');

	var data  = {};
	data.idmodule=id;
        


	// fait une requète ajax au controler controler_etudiant.php et au module lister_cours
	// paramètre POST id_matiere
		$.getJSON("admin/controler/controler_etudiant.php?module=lister_cours",
			data,
		    function(data){  
		
			// parcours de l'objet JSON et ajout de balise et id <li id=""></li>			
			for( var j=0 ; j < data.length; j++){
				
			    $('#etudiant_cours ul').append('<li><a href='+data[j].id+'>'+ data[j].nom+'</a></li>');	
			}
		});
	});

	// fonction se déclenchant lorsque l'utilisateur clique sur le nom d'un cours
	// but: mettre à jour la liste des fichiers et des QCM accessible à l'utilisateur

	$('#etudiant_cours  li').live('click',function(e){

	e.preventDefault();
	

	// modif classe
	$lien_selectionne = $('#etudiant_cours li.selected');
	
	$lien_selectionne.removeClass("selected");

	$lien_selectionne.removeClass("selected");
	$(this).addClass("selected");

	// récupérer id du cours
	$lien_selectionne = $('#etudiant_cours li.selected a');
	var id = $lien_selectionne.attr('href');

	// vide la liste des QCM et des fichiers
	ul_qcm= $('#etudiant_qcm_fichiers #qcm');
	ul_fichier= $('#etudiant_qcm_fichiers #fichiers');
	ul_qcm.empty();
	ul_fichier.empty();

	$lien_selectionne = $('#etudiant_cours li.selected a');
	var id = $lien_selectionne.attr('href');

	var data  = {};
	data.idmodule=id;

	// fait une requète ajax au controler controler_etudiant.php et au module lister_QCM
	// paramètre POST id_cours
	$.getJSON("admin/controler/controler_etudiant.php?module=lister_QCM",
			data,
		    function(data){  
		
			// parcours de l'objet JSON et ajout de balise et id <li id=""></li>			
			for( var j=0 ; j < data.length; j++){
				
			    $('#etudiant_qcm_fichiers #qcm').append('<li><a href='+data[j].id+'>'+ data[j].nom+'</a></li>');	
			}
		});

	$.getJSON("admin/controler/controler_etudiant.php?module=lister_fichiers",
			data,
		    function(data){  
		
			// parcours de l'objet JSON et ajout de balise et id <li id=""></li>			
			for( var j=0 ; j < data.length; j++){
				
			    $('#etudiant_qcm_fichiers #fichiers').append('<li><a href='+data[j].id+'>'+ data[j].nom+'</a></li>');	
			}
		});

	
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

