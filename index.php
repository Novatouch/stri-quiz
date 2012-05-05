<!DOCTYPE html>

<html lang="fr">
<head>
	<meta charset="UTF-8">

	<title></title>

	 <link rel="stylesheet" media="screen" href="css/ecran.css">
</head>
<body>

<!-- Document -->
<?php

	//recuperation variable passé par l'adresse 
	if (isset($_GET['page']))
	{
		$variable = $_GET['page'];
	}
	else
	{
		$variable="rien";
	}

	switch ($variable) 
	{
		case "interface_administrateur":
			$page = "interface_administrateur";
		break;
		case "interface_enseignant":
			$page = "interface_enseignant";
		break;
		case "interface_etudiant":
			$page =  "interface_etudiant";
		break;
		default:
			$page = "connexion";
		break;
	}

	//inclusion du header
	include_once("admin/interface/header.php");
	//inclusion du menu user_tab
	include_once("admin/interface/user_tab.php");


	// récupération du paramètre page et inclusion de la bonne interface
	include_once("admin/interface/$page.php");

	//inclusion du footer
	include_once("admin/interface/footer.php");
?>
</body>
</html>
