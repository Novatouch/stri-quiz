<!DOCTYPE html>

<html lang="fr">
<head>
	<meta charset="UTF-8">

	<title>Univ'everywhere</title>

	<link rel="stylesheet" type="text/css" href="style/style.css" />
	<link rel="stylesheet" type="text/css" href="style/perso.css" />
</head>
<body>

<!-- Document -->
<?php

	//recuperation variable passé par l'adresse 
	//penser à introduire une condition concernant les variables de sessions
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
			$page = "interface_connexion";
		break;
	}
?>
<div id="main">
    <div id="header">
<?php
	//inclusion du contenu du footer
	include_once("admin/interface/header.php");
?>
      
      <div id="menubar">
        <ul id="menu">
<?php
	//inclusion du contenu du menu selon l'utilisateur
	include_once("admin/interface/menu/".$page."_menu.php");
?>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div class="sidebar">
<?php
		//inclusion de l'élément user_tab
		include_once("admin/interface/user_tab.php");
?>
      </div>
      <div id="content">
<?php
	// récupération du paramètre page et inclusion de la bonne interface
	include_once("admin/interface/content/".$page."_content.php");
?>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
<?php
	//inclusion du contenu du footer
	include_once("admin/interface/footer.php");
?>
    </div>
  </div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="ajax/script_communs.js"></script>

</body>
</html>
