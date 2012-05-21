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

		e.preventDefault();

		// récupération du lien précedement sélectionné
		$lien_selectionne = $('#menubar #menu li.selected');


		// retiré la class de la puce  li précdement sélectionné
		$lien_selectionne.removeClass("selected");

		$(this).addClass("selected");

		//
		$div_a_cache = $('#content div:visible');
		$div_a_cache.hide();
		// récupérer l'id du div a affiché 
		var id = $('#menubar #menu li.selected a').attr('href');

		var selecteur = "#content #"+[id];
		$div_selectionne = $(selecteur);

		$div_selectionne.show();
		// recupération du div 
		
	});
});




