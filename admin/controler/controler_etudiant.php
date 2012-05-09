
<?php

	// verification des droits d'accès de l'utilisateur à ce controleur (variables sessions)

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
		case "lister_matieres" :
			include_once("../modules/etudiant/lister_matiere.php");

		break;
		case "lister_cours" :
			include_once("modules/etudiant/lister_cours.php");

		break;
		case "lister_QCM_fichiers" :
			include_once("modules/etudiant/lister_cours.php");

		break;
		case "lister_questions_propositions_qcm" :
			include_once("modules/etudiant/lister_questions_propositions_qcm.php");

		break;
		default :

		break;
	}

?>
