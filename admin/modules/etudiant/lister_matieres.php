<?php

// Ce module récupère la liste des matières auquels l'étudiant a accès

// récupération variable de type POST $_POST["id_matière"] 

$id_M= $_POST["id_matière"] ;

// récupération des variables de sessions contenant l'id de l'utilisateur


// requête à la base de donnée 

$db_handle = pg_connect("BD_PROJET=$BD_PROJET");
if ($db_handle) {
echo 'connexion réussi.';
} else {
echo 'connexion échoué.';
}
$req = "SELECT idMatiere FROM MATIERES,ACCEDER,UTILISATEURS,FORMATIONS,GROUPE WHERE MATIERES.idMatiere=ACCEDER.idMatiere 
AND ACCEDER.idFormation=FORMATIONS.idFormation AND GROUPES.idFormation=FORMATIONS.idFormation AND GROUPES.idGroupe=AppartenirGroupe.idGroupe AND UTILISATEURS.idUtilisateurs=UTILISATEURS.idUtilisateurs AND idMatiere=$id_M ";
$result = pg_exec($db_handle, $req);

$nbcolonne=pg_numrows($result);
if ($result) {
echo "La requête s'est bien executer.<br>\n";
for ($row = 0; $row < $nbcolonne; $row++) {
$values = pg_fetch_object($result, $row, PGSQL_ASSOC);
$idm = $values->idMatiere . " ";
$nomm .= $values->nomM . " ";
$matieres[$row]['id'] = $idm;
 $matieres[$row]['nom'] = $nomm ;

 }
else {
echo "La requête à rencontrer une erreur:<br>\n";
echo pg_errormessage($db_handle);
}

pg_freeresult($result);
pg_close($db_handle);

// traitement des résultats et fabrication de l'objet JSON

 /*$matieres[0]['id'] = 1;
 $matieres[0]['nom'] = "Mathématiques";
 $matieres[1]['id'] = 2;
 $matieres[1]['nom'] = "Sécurité";*/

echo json_encode($matieres);
?>
