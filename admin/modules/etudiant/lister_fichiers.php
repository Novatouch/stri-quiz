<?php

// Ce modules récupère la liste des fichiers corespondant à un cours



// récupération de l'id du cours passée par un paramètre de type POST nom variable $_GET['id_cours']

$id_c=$_POST['id_Cours'];

// requête à la base de donnée pour récupérer l'id des fichiers et les noms des fichiers

$db_handle = pg_connect("BD_PROJET=$BD_PROJET");
if ($db_handle) {
echo 'connexion réussi.';
} else {
echo 'connexion échoué.';
}
$req = "SELECT idFichier,nomF FROM FICHIERS,COURS WHERE COURS.idCours=FICHIERS.idCours AND id_Cours=$id_c";
$result = pg_exec($db_handle, $req);

$nbcolonne=pg_numrows($result);
if ($result) {
echo "La requête s'est bien executer.<br>\n";
for ($row = 0; $row < $nbcolonne; $row++) {
$values = pg_fetch_object($result, $row, PGSQL_ASSOC);
$idFichiers = $values->idFichier . " ";
$nomFichiers .= $values->nomF . " ";
$fichiers[$row]['id'] = $idFichiers;
 $fichiers[$row]['nom'] = $nomFichiers;
 }
else {
echo "La requête à rencontrer une erreur:<br>\n";
echo pg_errormessage($db_handle);
}

pg_freeresult($result);
pg_close($db_handle);

// traitement des résultats et fabrication de l'objet JSON

/* $fichiers[0]['id'] = 1;
 $fichiers[0]['nom'] = "NomFichiers";*/

echo json_encode($fichiers);
?>
