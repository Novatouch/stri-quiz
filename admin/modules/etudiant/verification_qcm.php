<?php

// Ce module récupère la liste des questions et des propositions

// vérification que l'utilisateur est authentifié

// Récupération du paramètre $_GET, organisation de l'array
/*
	$_GET['id_qcm'] id qcm
	$_GET['question']
	$_GET['question'][0]['id']
	$_GET['question'][0]['proposition']
	$_GET['question'][0]['proposition'][0]['id']
	$_GET['question'][0]['proposition'][1]['id']

	$_GET['question'][1]['id']   id question
	$_GET['question'][1]['proposition']
	$_GET['question'][1]['proposition'][0]['id'] id proposition
	$_GET['question'][1]['proposition'][1]['id']
*/


// vérifie que l'utilisateur à bien le droit d'accéder au QCM et recupère typeQCM

	// Si le type de compte est un qcm d'évaluation
	// enregistrement de la participation


// parcours des questions dans l'array $_GET

	// pour chaque question 
	//incrémentation du compteur de question


	//vérifier si l'utilisateur a coché aucune réponse isset($_GET['question'][x]['proposition']))
 	//récupération des id des bonne réponses

		// Si le typede qcm est examen enregistrement des propositions validés par l'utilsateur
	
	// mise à jour du compteur de points

// si le type de qcm est examen enregistrement de la note dans la bd 

// fabrication de l'objet JSON pour renvoyer la note
//renvoi de la note

$resultat['note']= "20"; 

echo json_encode($resultat);

?>
