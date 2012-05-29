<?php

// Ce modules récupère la liste des fichiers corespondant à un cours

include_once($document_root."/admin/fonctions/connection_bd.php");
session_start();


// récupération de l'id du cours passée par un paramètre de type POST nom variable $_GET['id_cours']

$idCours=$_GET['idCours'];
$idUtilisateur= $_SESSION['idUtilisateur'];
// requête à la base de donnée pour récupérer l'id des fichiers et les noms des fichiers



$req = "SELECT c.idCours FROM Utilisateurs u
INNER JOIN AppartenirGroupe ag 	ON u.idUtilisateur = ag.idUtilisateur
INNER JOIN Groupes g 		ON ag.idGroupe = g.idGroupe
INNER JOIN Formations fo	ON g.idFormation = fo.idFormation
INNER JOIN Acceder ac		ON fo.idFormation = ac.idFormation		
INNER JOIN Matieres m		ON ac.idMatiere =  m.idMatiere
INNER JOIN Cours c		ON m.idMatiere = c.idMatiere
WHERE	u.idUtilisateur ='$idUtilisateur' 
AND	c.idCours = '$idCours'";


$result = pg_exec($db_handle, $req);

if($result) 
{	
	$nombre=pg_numrows($result);

	if($nombre == 1)
	{
	
			$req = "SELECT f.idFichier, f.nomF FROM Cours c
			INNER JOIN Fichiers f ON c.idCours =  f.idCours
			WHERE c.idCours = '$idCours'";

			$result = pg_exec($db_handle, $req);

			if($result)
			{
				$nombre=pg_numrows($result);
	
				for ($row = 0; $row < $nombre; $row++) 
				{
					$values = pg_fetch_array($result, $row, PGSQL_ASSOC);
					$idFichiers = $values['idfichier'];
					$nomFichiers = $values['nomf'];
					$fichiers[$row]['id'] = $idFichiers;
					$fichiers[$row]['nom'] = $nomFichiers;
				}
			
				echo json_encode($fichiers);
			}
		
	}
}


// traitement des résultats et fabrication de l'objet JSON

/* $fichiers[0]['id'] = 1;
 $fichiers[0]['nom'] = "NomFichiers";*/



?>
