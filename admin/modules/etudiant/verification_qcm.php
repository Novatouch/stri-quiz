<?php

// Ce module récupère la liste des questions et des propositions

// vérification que l'utilisateur est authentifié

// Récupération du paramètre $_POST, organisation de l'array
/*
	$_POST['id_qcm'] id qcm
	$_POST['tpe_qcm'] le type du qcm
	$_POST['question']
	$_POST['question'][0]['id']
	$_POST['question'][0]['proposition']
	$_POST['question'][0]['proposition'][0]['id']
	$_POST['question'][0]['proposition'][1]['id']

	$_POST['question'][1]['id']   id question
	$_POST['question'][1]['proposition']
	$_POST['question'][1]['proposition'][0]['id'] id proposition
	$_POST['question'][1]['proposition'][1]['id']
*/


// vérifie que l'utilisateur à bien le droit d'accéder au QCM et recupère typeQCM

	// Si le type de compte est un qcm
	// enregistrement de la participation


// parcours des questions dans l'array $_POST

	// pour chaque question récupération des id des bonne réponses

		// Si le typede qcm est examen enregistrement des propositions validés par l'utilsateur
	
	// mise à jour du compteur de points

// si le type de qcm est examen enregistrement de la note dans la bd 

// fabrication de l'objet JSON pour renvoyer la note
//renvoi de la note

$resultat['note']= ; 

echo json_encode($resultat);

?>
