
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
	data.idMatiere=id;
        


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
	data.idCours=id;

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

	data.idCours=id;

	$.getJSON("admin/controler/controler_etudiant.php?module=lister_fichiers",
			data,
		    function(data){  
		
			// parcours de l'objet JSON et ajout de balise et id <li id=""></li>			
			for( var j=0 ; j < data.length; j++){
				
			    $('#etudiant_qcm_fichiers #fichiers').append("<li><a href='admin/controler/controler_etudiant.php?module=telechargement_fichier&idfichier="+data[j].id+"'>"+data[j].nom+"</a></li>");	
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
	$('#etudiant_qcm_fichiers #qcm li a').live('click',function(e){

	//désactivation des liens
	e.preventDefault();
	
	//  récupération id qcm
	$lien_selectionne = $(this);
	var id = $lien_selectionne.attr('href');

	// affichage et vidage du contenu du div ayant l'id "etudiant_qcm"
	var div_accueil=$('#content #etudiant_accueil');
	var div_qcm=$('#content #etudiant_qcm #list_quest');
	div_qcm.empty();
	div_qcm=$('#content #etudiant_qcm');


	// récupération idCours
	$lien_selectionne = $('#etudiant_cours li.selected a');
	var idCours = $lien_selectionne.attr('href');

	div_accueil.hide();
	div_qcm.show();
	// récupération des questions et des propositions auprès du serveur
	// id + texte
	// envoi d'une requête au serveur 
	// controler : controler_etudiant.php
	// module :	lister_questions_propositions_qcm
	// paramètre: idqcm,idCours
	var data  = {};
	data.idqcm=id;
	data.idCours= idCours;

	$.getJSON("admin/controler/controler_etudiant.php?module=lister_questions_propositions_qcm",
			data,
		    function(data){  
		
			// parcours de l'objet JSON et ajout de balise et id <li id=""></li>			
			for( var j=0 ; j < data.length; j++){
				
			var chaine = new Array();
			
			for( var j=0 ; j < data.length; j++){
			chaine += "<form id='"+data[j]['id']+"'>";
			chaine += "<p> Question  "+(j+1)+": "+ data[j]['intitule']+"<br />";
			
		

				// parcours des propositions
				for (var i = 0;i < data[j]['propositions'].length; i++){
					chaine +='<input type="checkbox"  id="'+data[j]["propositions"][i]["id"]+'"/>';
					chaine +='<label for='+data[j]["propositions"][i]["id"]+'>'+data[j]["propositions"][i]["intitule"]+'</label> <br />';

				}
				
				chaine +="</p>";
				chaine +="</form>";
			  }
			// ajout du bouton de validation
			chaine += '<input id="submit_button" type="button"  value="Envoyer" />';
			$('#etudiant_qcm #list_quest').append(chaine);
			
			// ajout span contenant id du quiz
			$('#etudiant_qcm #list_quest').append('<span id='+id+'></span>');

			}
		});
		// affichage des questions
		var div_qcm=$('#content #etudiant_qcm #list_quest');
		div_qcm.show();
	});

	//fonction déclenché par un clic sur un Fichier
	// elle lancera le téléchargement du fichier
	$('à définir').live('click',function(){
	});

	//fonction déclenché par par la validation du QCM
	//  récupère les propositions cochés envoi au serveur les données et recoit la note
	$('#submit_button').live('click',function(){
		
		// récupérer id de toutes les questions
		var selecteur = '#etudiant_qcm form';
		var idQuestion = new Array();
		var idProposition = new Array();
		var donnees_json= new Array();
 		$(selecteur).each(function(index,value) {
   			idQuestion[index]=$(this).attr('id');
			
		});
		// récupération id quiz
		var span_id = $('#etudiant_qcm #list_quest span');
		
		var idQuiz=span_id.attr('id');
		donnees_json+='{"id_qcm": "'+idQuiz+'","question":[';
		// pour chaque question
		
		for(var i=0; i<idQuestion.length; i++){
			
			if(i == 0){
				donnees_json += '{"id":"'+idQuestion[i]+'","proposition":[';
			}
			else{
				donnees_json += '},{"id":"'+idQuestion[i]+'","proposition":[';
			}
			
			selecteur='form[id="'+idQuestion[i]+'"] input:checked';
			
			

			// si il ya des réponses cochés
	
			if($(selecteur).length > 0){
		
				// parcour de chaque proposition cochée
				$(selecteur).each(function(index,value) {
	   				
					if(index==0){
						donnees_json+='{"id":"'+$(this).attr('id')+'"';
					}
					else{
						donnees_json+='},{"id":"'+$(this).attr('id')+'"';
					}
				});
				donnees_json +='} ';
			}
			donnees_json +=' ]';
		}
		donnees_json +='} ]}';
		

		//format des données à envoyer
		//donnees_json = '{"id_qcm":"6","question":[{"id":"5","proposition":[{"id":"1"},{"id":"2"}]},{"id":"5","proposition":[{"id":"1"},{"id":"2"}]} ]}';
		
		var data = JSON.parse(donnees_json);

$.getJSON("admin/controler/controler_etudiant.php?module=verification_qcm",
			data,
		    function(data2){  
			//caché le div qcm
			var div_qcm=$('#content #etudiant_qcm');
			div_qcm.hide();

			// affiché le div résultat
			var div_resultat=$('#content #etudiant_resultats');
			div_resultat.show();
			
			var div_affichage_resultat=$('#etudiant_resultats #aff_result');
			div_affichage_resultat.empty();
			div_affichage_resultat.append("<h4>"+data2.note+" /20 </h4>");
			div_affichage_resultat.show();
	});

		
});

