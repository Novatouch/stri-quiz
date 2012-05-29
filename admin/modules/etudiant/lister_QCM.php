<?php
// Ce modules récupère la liste des QCM corespondant à un cours

// connection au serveur bd
include_once($document_root."/admin/fonctions/connection_bd.php");
session_start();

// récupé
$idCours=$_GET['idCours'];
$idUtilisateur= $_SESSION['idUtilisateur'];

// requête à la base de donnée 


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
	
			$req = "SELECT q.idQuiz, q.nomQ, q.typeQuiz, tempsEpreuve FROM Quiz q
				INNER JOIN Cours c ON c.idCours =  q.idCours
				WHERE c.idCours = '$idCours'";

			$result = pg_exec($db_handle, $req);

			if($result)
			{
				$nombre=pg_numrows($result);
	
				for ($row = 0; $row < $nombre; $row++) 
				{
					$values = pg_fetch_array($result, $row, PGSQL_ASSOC);
					$idQ = $values['idquiz'];
					$nom = $values['nomq'];
					$typeQ = $values['typequiz']; 
					$qcm[$row]['id'] = $idQ;
					$qcm[$row]['nom'] = $nom;
					$qcm[$row]['type'] = $typeQ ;
				}
			
				echo json_encode($qcm);
			}
		
	}
}



pg_freeresult($result);
pg_close($db_handle);

// traitement des résultats et fabrication de l'objet JSON

/* $qcm[0]['id'] = 1;
 $qcm[0]['nom'] = "NomQcm";
 $qcm[0]['type'] = "typeDuQcm";*/



?>
