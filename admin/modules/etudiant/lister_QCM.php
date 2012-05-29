<?php

// Ce modules récupère la liste des QCM corespondant à un cours



// récupération de l'id du cours passée par un paramètre de type POST nom variable $_GET['id_cours']

$id_courstrait=$_POST['id_cours'];
/*vu que c'est une methode POST*/

// requête à la base de donnée pour récupérer les id des QCM et les noms des QCM et les types de qcm

/*où $BD_PROJET est le nom de la variable qui contient le nom de la BD*/
$db_handle = pg_connect("BD_PROJET=$BD_PROJET");
if ($db_handle) {
echo 'connexion réussi.';
} else {
echo 'connexion échoué.';
}
$req = "SELECT id_Quiz, nomQ, typeQuizz FROM QUIZ";
$result = pg_exec($db_handle, $req);

$nbcolonne=pg_numrows($result);
if ($result) {
echo "La requête s'est bien executer.<br>\n";
for ($row = 0; $row < $nbcolonne; $row++) {
$values = pg_fetch_object($result, $row, PGSQL_ASSOC);
$idQ = $values->idQuiz . " ";
$nom .= $values->nomQ . " ";
$typeQ .= $values->typeQuizz;
$qcm[$row]['id'] = $idQ;
 $qcm[$row]['nom'] = $nom;
 $qcm[$row]['type'] = $typeQ ;
}
else {
echo "La requête à rencontrer une erreur:<br>\n";
echo pg_errormessage($db_handle);
}

pg_freeresult($result);
pg_close($db_handle);

// traitement des résultats et fabrication de l'objet JSON

/* $qcm[0]['id'] = 1;
 $qcm[0]['nom'] = "NomQcm";
 $qcm[0]['type'] = "typeDuQcm";*/

echo json_encode($qcm);
?>
