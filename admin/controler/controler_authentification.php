<?php

	// demarrage des sessions php et connexion bd
	session_start();

	// variable contenant le chemin du serveur
	include_once("../../config/document_root.php");



	
	// securisation des variables GET et POST

	// récupération du nom du module stocké dans $_POST['module']
	if (isset($_GET['module']))
	{
		$module = $_GET['module'];
	}
	else
	{
		$module = "MisterAoun";
	}

	// inclusion du module 

	switch ($module) 
	{
		case "connexion":
			include_once("../modules/authentification/connexion.php");

		break;
		case "deconnexion":
			include_once("../modules/authentification/deconnexion.php");

		break;
		default:
			echo "big problem";
		break;
	}

	
?>
