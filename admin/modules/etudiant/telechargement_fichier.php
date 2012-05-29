<?php

// Ce module récupère la liste des questions et des propositions

// vérification que l'utilisateur est authentifié

// Récupération du paramètre $_POST['id_qcm']

$idqcm=$_POST['id_qcm'];

// vérifie que l'utilisateur à bien le droit d'accéder au QCM



// récupère toutes les questions et les propositions du QCM

$db_handle = pg_connect("BD_PROJET=$BD_PROJET");
if ($db_handle) {
echo 'connexion réussi.';
} else {
echo 'connexion échoué.';
}
$req = "SELECT idQuiz,intituleQ,intituleProp,idFichier,lien FROM QUIZ,QUESTIONS,PROPOSITIONS,COURS,FICHIERS WHERE ContenirQuestion.idQuiz=QUIZ.idQuiz 
AND ContenirQuestion.idQuestion=QUESTIONS.idQuestion AND COURS.idCours=QUIZ.idCours AND FICHIERS.idCours=COURS.idCours AND idQuiz=$idqcm";

$result = pg_exec($db_handle, $req);

$nbcolonne=pg_numrows($result);
if ($result) {
echo "La requête s'est bien executer.<br>\n";
for ($row = 0; $row < $nbcolonne; $row++) {
$values = pg_fetch_object($result, $row, PGSQL_ASSOC);
$idqz = $values->idQuiz . " ";
$intQuestion .= $values->intituleQ . " ";
$intProp = $values->intituleProp . " ";
$idF = $values->idFichier . " ";
$lienF = $values->lien . " ";
$qcm[$row][$idqz ]= $idqz ;
$qcm[$row][$intQuestion]= $intQuestion;
$qcm[$row][intituleProp][$row][$idqz ]=$idqz ;
$qcm[$row][intituleProp][$row][$intQuestion]= $intQuestion;
$qcm[$row][$intProp][$row+1][$idqz ]= $idqz ;
$qcm[$row][$intProp][$row+2][$intQuestion]= $intQuestion;
$qcm[$row][$intProp][$row+2][$idqz ]= $idqz ;
$qcm[$row][$intProp][$row+2][$intQuestion]= $intQuestion ;
$qcm[$row][$intProp][$row+3][$idqz ]=$idqz;
$qcm[$row][$intProp][$row+3][$intQuestion]= $intQuestion;
/*bon ici, j'ai quand meme penser que c'est assez lourd comme construction et que l'on devrait discuter sur le fait que ca serait bien d'imposer un nombre propositions minimum par question*/ 
 }
else {
echo "La requête à rencontrer une erreur:<br>\n";
echo pg_errormessage($db_handle);
}

pg_freeresult($result);
pg_close($db_handle);

// fabrication de l'objet JSON



?>
