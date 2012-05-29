<?php

include_once($document_root."/admin/fonctions/fonctions_authentifications.php");
include_once($document_root."/admin/fonctions/connection_bd.php");

// Ce module vérifie l'identité de l'utilisateur créer des varaibles de sessions et le redirige vers la bonne interface

// récupération des variables de sessions contenant le mot de passe et l'identifiant $_POST['identifiant'] et $_POST['mdp']
if(isset($_POST['identifiant']) && isset($_POST['mdp']))
{
	$util = $_POST['identifiant'];
	$mdp = $_POST['mdp'];

	// requête à la base pour récupérer les information de l'utilisateur
	$req = "SELECT u.idUtilisateur,u.nomU,u.prenomU,u.pseudo,u.passwordU,u.typeCompte FROM Utilisateurs u WHERE u.pseudo='$util'";
	$result = pg_exec($db_handle, $req);

	// Si la requête à échoué redirection
	if(!$result)
	{
		exit();
	}

	// regarde le nombre de résultat
	$nbligne =pg_numrows($result);
	if ($nbligne == 1)
	{
		$values = pg_fetch_array($result,0, PGSQL_ASSOC); 


		//verification du mot de passe
		$hash_bd = $values['passwordu'];


		if(ValidatePassword($mdp, $hash_bd) == true)
		{
			//creation variable environement
			$_SESSION['idUtilisateur']	= $values['idutilisateur'];
			$_SESSION['pseudo']		= $values['pseudo'];
			$_SESSION['Nom']		= $values['nomu'];
			$_SESSION['Prenom']		= $values['prenomu'];
			$_SESSION['typeDeCompte']	= $values['typecompte'];

			// redirection ver la page de l'utilisateur
			switch ($values['typecompte']) 
			{
				case "Etudiant":
					header('Location: ../../index.php?page=interface_etudiant');

				break;
				case "Enseignant":
					header('Location: ../../index.php?page=interface_enseignant');

				break;
				case "Administrateur":
					header('Location: ../../index.php?page=interface_administrateur');

				break;
				default:
					echo "Mauvais identifiant ou mot de passe. Vous allez être redirigé";
					sleep(2);
					header('Location: ../../index.php');
				break;
			}
		}
		else
		{
			echo "Mauvais identifiant ou mot de passe. Vous allez être redirigé";
		}
	}
	else
	{
		echo "Mauvais identifiant ou mot de passe. Vous allez être redirigé";
	}
}
else
{
	echo "erreur POST";
}
//redirection par defaut vers lapage d'authentification

// deconnexion bd
include_once($document_root."/admin/fonctions/deco_bd.php");


?>
