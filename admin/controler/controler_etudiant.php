
<?php
        
	// variable contenant le chemin du serveur
	include_once("../../config/document_root.php");

	// connection au serveur bd
	include_once($document_root."/admin/fonctions/connection_bd.php");

	// verification des droits d'accès de l'utilisateur à ce controleur (variables sessions)

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
		case "lister_matieres":
			include_once("../modules/etudiant/lister_matieres.php");

		break;
		case "lister_cours":
			include_once("../modules/etudiant/lister_cours.php");

		break;
		case "lister_QCM":
			include_once("../modules/etudiant/lister_QCM.php");

		break;
		case "lister_fichiers":
			include_once("../modules/etudiant/lister_fichiers.php");

		break;
		case "lister_questions_propositions_qcm":
			include_once("../modules/etudiant/lister_questions_propositions_qcm.php");

		break;
		case "telechargement_fichier":
			include_once("../modules/etudiant/telechargement_fichier.php");

		break;
		case "verification_qcm":
			include_once("../modules/etudiant/verification_qcm.php");

		break;
		default:
			echo "big problem";
		break;
	}

?>
