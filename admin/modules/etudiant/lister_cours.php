<?php

// connection au serveur bd
include_once($document_root."/admin/fonctions/connection_bd.php");
session_start();
// Ce modules récupère la liste des cours corespondant à une matière et dont l'utilisateur à accès

// récupération des variables de sessions contenant l'id de l'utilisateur

// récupération de l'id de la matière passée par un paramètre de type GET nom variable $_GET['idMatiere']
$id_Matiere = $_GET['idMatiere'];
$idUtilisateur= $_SESSION['idUtilisateur'];
// requête à la base de donnée 


$req = "SELECT c.idCours, c.nomC FROM Utilisateurs u
INNER JOIN AppartenirGroupe ag 	ON u.idUtilisateur = ag.idUtilisateur
INNER JOIN Groupes g 		ON ag.idGroupe = g.idGroupe
INNER JOIN Formations fo		ON g.idFormation = fo.idFormation
INNER JOIN Acceder ac		ON fo.idFormation = ac.idFormation		
INNER JOIN Matieres m		ON ac.idMatiere =  m.idMatiere
INNER JOIN Cours c		ON m.idMatiere = c.idMatiere
WHERE	u.idUtilisateur = '$idUtilisateur'
AND	m.idMatiere =  '$id_Matiere'";

$result = pg_exec($db_handle, $req);

$nbcolonne=pg_numrows($result);

if ($result) 
{
	
	for ($row = 0; $row < $nbcolonne; $row++) 
	{
		$values = pg_fetch_array($result, $row,PGSQL_ASSOC);
		$idCours = $values['idcours'];
		$nomCours = $values['nomc'];
		$cours[$row]['id'] = $idCours;
		$cours[$row]['nom'] = $nomCours;
	}
}
else
{
	echo "La requête à rencontrer une erreur:<br>\n";
	echo pg_errormessage($db_handle);
}

pg_freeresult($result);



/* $cours[0]['id'] = 1;
 $cours[0]['nom'] = $bool;
 $cours[1]['id'] = 2;
 $cours[1]['nom'] = "Les sacanneurs réseaux";
 $cours[2]['id'] = 3;
 $cours[2]['nom'] = "initiation iptables";
 $cours[3]['id'] = 4;
 $cours[3]['nom'] = "iptables avancée";*/

 echo json_encode($cours);

?>
