<?php

// Ce module récupère la liste des matières auquels l'étudiant a accès
include_once($document_root."/admin/fonctions/connection_bd.php");
session_start();



// récupération des variables de sessions contenant l'id de l'utilisateur
$idUtilisateur= $_SESSION['idUtilisateur'];

// requête à la base de donnée 


$req = "SELECT m.idMatiere, m.nomM FROM Utilisateurs u
INNER JOIN AppartenirGroupe ag 	ON u.idUtilisateur = ag.idUtilisateur
INNER JOIN Groupes g 		ON ag.idGroupe = g.idGroupe
INNER JOIN Formations fo		ON g.idFormation = fo.idFormation
INNER JOIN Acceder ac		ON fo.idFormation = ac.idFormation		
INNER JOIN Matieres m		ON ac.idMatiere =  m.idMatiere
WHERE	u.idUtilisateur = '$idUtilisateur'";

$result = pg_exec($db_handle, $req);

$nbcolonne=pg_numrows($result);

if ($result) 
{
	for ($row = 0; $row < $nbcolonne; $row++) 
	{
		$values = pg_fetch_array($result, $row, PGSQL_ASSOC);
		$idm = $values['idmatiere'];
		$nomm = $values['nomm'];
		$matieres[$row]['id'] = $idm;
		$matieres[$row]['nom'] = $nomm ;

 	}
}
else 
{
	echo "La requête à rencontrer une erreur:<br>\n";
	echo pg_errormessage($db_handle);
}



// traitement des résultats et fabrication de l'objet JSON

 /*$matieres[0]['id'] = 1;
 $matieres[0]['nom'] = "Mathématiques";
 $matieres[1]['id'] = 2;
 $matieres[1]['nom'] = "Sécurité";*/

echo json_encode($matieres);

?>
