<?php

// Ce module récupère la liste des questions et des propositions

// vérification que l'utilisateur est authentifié



// Récupération du paramètre $_GET['idqcm']

$idqcm=$_POST['idqcm'];

// vérifie que l'utilisateur à bien le droit d'accéder au QCM



// récupère toutes les questions et les propositions du QCM

$db_handle = pg_connect("BD_PROJET=$BD_PROJET");
if ($db_handle) {
echo 'connexion réussi.';
} else {
echo 'connexion échoué.';
}
$req = "SELECT idQuiz,nomQ, FROM MATIERES,ACCEDER,UTILISATEURS,FORMATIONS,GROUPE WHERE MATIERES.idMatiere=ACCEDER.idMatiere 
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

// fabrication de l'objet JSON

$qcm[0]["id"]= "gnagna";
$qcm[0]["intitule"]= "Qu'est ce que la foudre";
$qcm[0]["propositions"][0]["id"]= 1;
$qcm[0]["propositions"][0]["intitule"]= "Nmap";
$qcm[0]["propositions"][1]["id"]= 2;
$qcm[0]["propositions"][1]["intitule"]= "telnet";
$qcm[0]["propositions"][2]["id"]= 3;
$qcm[0]["propositions"][2]["intitule"]= "Nessus" ;
$qcm[0]["propositions"][3]["id"]= 4;
$qcm[0]["propositions"][3]["intitule"]=  "OpenVas" ;
$qcm[1]["id"]= 2;
$qcm[1]["intitule"]= "Qu'est ce que la sécurité";
$qcm[1]["propositions"][0]["id"]= 5;
$qcm[1]["propositions"][0]["intitule"]= "Nmap";
$qcm[1]["propositions"][1]["id"]= 6;
$qcm[1]["propositions"][1]["intitule"]= "telnet";
$qcm[1]["propositions"][2]["id"]= 7;
$qcm[1]["propositions"][2]["intitule"]= "Nessus" ;
$qcm[1]["propositions"][3]["id"]= 8;
$qcm[1]["propositions"][3]["intitule"]=  "OpenVas" ;
$qcm[2]["id"]= 3;
$qcm[2]["intitule"]= "Q'est ce qu'un scanneur";
$qcm[2]["propositions"][0]["id"]= 9;
$qcm[2]["propositions"][0]["intitule"]= "Nmap";
$qcm[2]["propositions"][1]["id"]= 10;
$qcm[2]["propositions"][1]["intitule"]= "telnet";
$qcm[2]["propositions"][2]["id"]= 11;
$qcm[2]["propositions"][2]["intitule"]= "Nessus" ;
$qcm[2]["propositions"][3]["id"]= 12;
$qcm[2]["propositions"][3]["intitule"]=  "OpenVas" ;
echo json_encode($qcm);

?>
