// Script interne
$(function(){

	// lors du chargement de l'interface
	$('body').ready(function(){

		// recuperation de la valeur de l'attribut href dont le lien apartient à la classe selected
		var id = $('#menubar #menu li.selected a').attr('href');

		// modification du style du div choisi
		var selecteur = "#content #"+[id];

		// récupération du div 
		$div_selectionne = $(selecteur);

		// afichage du div
		$div_selectionne.show();
	});

	// lors d'un clic sur un élément du menu
	$('#menubar #menu li').click(function(e){

		// désactive la fonction de base des balises liens
		e.preventDefault();

		// récupération du lien précedement sélectionné
		$lien_selectionne = $('#menubar #menu li.selected');


		// retiré la class de la puce  li précdement sélectionné
		$lien_selectionne.removeClass("selected");

		// rajoute la classe selected au lien clique
		$(this).addClass("selected");

		// sélectionne le div qui est affiché
		$div_a_cache = $('#content div:visible');

		// le div affiché disparait
		$div_a_cache.hide();
		// récupérer l'id du div a affiché 
		var id = $('#menubar #menu li.selected a').attr('href');

		var selecteur = "#content #"+[id];
		$div_selectionne = $(selecteur);

		// affichage du div
		$div_selectionne.show();
		
	});
});




