<?php

	// demarrage des sessions php
	
	// securisation des variables GET et POST

	// récupération du nom du module stocké dans $_POST['module']
	if (isset($_POST['module'])
	{
		$module = $_POST['module'];
	}
	else
	{
		$module = "MisterAoun";
	}

	// inclusion du module 

	switch ($module) 
	{
		case "connexion" :
			include_once("../modules/authentification/connexion.php");

		break;
		case "deconnexion" :
			include_once("modules/authentification/deconnexion.php");

		break;
		default :
			echo "big problem";
		break;
	}

?>
