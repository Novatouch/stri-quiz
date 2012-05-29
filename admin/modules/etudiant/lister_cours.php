<?php

// Ce modules récupère la liste des cours corespondant à une matière et dont l'utilisateur à accès

// récupération des variables de sessions contenant l'id de l'utilisateur

// récupération de l'id de la matière passée par un paramètre de type POST nom variable $_POST['idMatiere']
$id_Matiere = $_POST['idMatiere'];

// requête à la base de donnée 

$db_handle = pg_connect("BD_PROJET=$BD_PROJET");
if ($db_handle) {
echo 'connexion réussi.';
} else {
echo 'connexion échoué.';
}
$req = "SELECT idCours, nomC FROM COURS,MATIERES,FORMATIONS,GROUPES,UTILISATEURS,ACCEDER,AppartenirGroupe WHERE COURS.idMatiere=MATIERES.idMatieres AND ACCEDER.idMatieres=MATIERES.idMatieres AND FORMATIONS.idFormation=ACCEDER.idFormation
AND GROUPES.idFormation=FORMATIONS.idFormation AND AppartenirGroupe.idGroupe=GROUPES.idGroupe AND AppartenirGroupe.idUtilisateurs=UTILISATEURS.idUtilisateurs AND idMatieres=$id_Matiere";
$result = pg_exec($db_handle, $req);

$nbcolonne=pg_numrows($result);
if ($result) {
echo "La requête s'est bien executer.<br>\n";
for ($row = 0; $row < $nbcolonne; $row++) {
$values = pg_fetch_object($result, $row, PGSQL_ASSOC);
$idCours = $values->idCours . " ";
$nomCours .= $values->nomCours . " ";
$cours[$row]['id'] = idCours;
 $cours[$row]['nom'] = nomCours;
 }
else {
echo "La requête à rencontrer une erreur:<br>\n";
echo pg_errormessage($db_handle);
}

pg_freeresult($result);
pg_close($db_handle);

// traitement des résultats et fabrication de l'objet JSON
if(!isset($_POST['idMatiere']))
{
$bool= "existepas";
}
else
{
	$bool= $_POST['idMatiere'];
}
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
