<?php
function verification_qcm(){
// Ce module récupère la liste des questions et des propositions

// vérification que l'utilisateur est authentifié

// Récupération du paramètre $_GET, organisation de l'array

require(" telechargement_fichier.php");
/*récuperation de la liste des questions et propositions du quiz*/
$utils=$_POST['id_Utilisateur'];
$reqQ="SELECT idQuiz FROM QUIZ";

$idQ_etudiant=$_POST['id_quiz'];

int j=pg_numrows($reqQ);

for(int i=0;i<j;i++)
{
/*Ici on récupere les réponses de l'étudiant*/
$qcm_etudiant[$idQ_etudiant][$idQ_etudiant]= $_GET['id_qcm']; 
$qcm_etudiant[$idQ_etudiant][$int_Question]= $_GET['question'];
$qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant][$idQ_etudiant]=$_GET['question'][$idQ_etudiant][$idQ_etudiant];
$qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant][$int_Question]= $_GET['question'][$idQ_etudiant]['proposition'];
$qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant+1][$int_Question]=$_GET['question'][$idQ_etudiant]['proposition'][i]['id'];
$qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant+2][$int_Question]= $_GET['question'][$idQ_etudiant]['proposition'][i]['id'];
$qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant+2][$int_Question]= $_GET['question'][$idQ_etudiant][$idQ_etudiant] ;
$qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant+2][$int_Question]= $_GET['question'][$idQ_etudiant]['proposition']; 
$qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant+3][$int_Question]=$_GET['question'][$idQ_etudiant]['proposition'][i]['id'] ;
$qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant+3][$int_Question]= $_GET['question'][$idQ_etudiant]['proposition'][i]['id'];

}
	/*$_GET['id_qcm'];
	$_GET['question'];
	$_GET['question'][0]['id'];
	$_GET['question'][0]['proposition'];
	$_GET['question'][0]['proposition'][0]['id'];
	$_GET['question'][0]['proposition'][1]['id'];

	$_GET['question'][1]['id'] ;  /*id question*/
	$_GET['question'][1]['proposition'];
	$_GET['question'][1]['proposition'][0]['id'] ;/*id proposition*/
	$_GET['question'][1]['proposition'][1]['id'];*/



// vérifie que l'utilisateur à bien le droit d'accéder au QCM et recupère typeQCM


// parcours des questions dans l'array $_GET

	// pour chaque question 
	//incrémentation du compteur de question
i=0;
for(int p=0;i<j;i++)
{
if( $qcm_etudiant[$idQ_etudiant][$idQ_etudiant]= $qcm[$idQ_etudiant][$idQ_etudiant]; 
$qcm_etudiant[$idQ_etudiant][p]= $qcm[i][$int_Question];
$qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant][$idQ_etudiant]=$qcm[$idQ_etudiant][intitule_Prop][$idQ_etudiant][$idQ_etudiant];
$qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant][p]=$qcm[$idQ_etudiant][intitule_Prop][$idQ_etudiant][p];
$qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant+1][p]=$qcm[$idQ_etudiant][intitule_Prop][$idQ_etudiant+1][$int_Question];
$qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant+2][p]= $qcm[$idQ_etudiant][intitule_Prop][i+2][p];
$qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant+2][p]= $qcm[$idQ_etudiant][intitule_Prop][i+2][p] ; 
$qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant+2][p]= $qcm[$idQ_etudiant][intitule_Prop][i+2][p]; 
$qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant+3][p]=$qcm[$idQ_etudiant][intitule_Prop][i+3][p];
$qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant+3][p]= $qcm[$idQ_etudiant][intitule_Prop][i+3][p];)
{note=note+1;}
else if( (empty($qcm_etudiant[i][$idQ_etudiant]) && 
(empty($qcm_etudiant[$idQ_etudiant][p])) &&
(empty($qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant][$idQ_etudiant])) &&
(empty($qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant][p])) &&
(empty($qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant+1][p])) &&
(empty($qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant+2][p])) &&
(empty($qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant+2][p])) && 
(empty($qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant+2][p])) && 
(empty($qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant+3][p])) &&
(empty($qcm_etudiant[$idQ_etudiant][intitule_Prop][$idQ_etudiant+3][p])))
{note=note+0;}
else
{note=note-1;}
}


	//vérifier si l'utilisateur a coché aucune réponse isset($_GET['question'][x]['proposition']))
 	//récupération des id des bonne réponses

		// Si le type de qcm est examen enregistrement des propositions validés par l'utilsateur
	
$req = "SELECT typeQuizz FROM QUIZZ WHERE idQuiz= $idQ_etudiant";

	// Si le type de compte est un qcm d'évaluation
	// enregistrement de la participation
$values = pg_fetch_object($req , $row, PGSQL_ASSOC);
if($values->typeQuizz=="EVALUATION"){$query_evaluation="INSERT INTO PARTICIPER(,$utils,$idQ_etudiant,,$note);pg_execute(BD_PROJET, $query_evaluation);}
else if($values->typeQuizz=="EXAMEN"){$query_examen="INSERT INTO PARTICIPER(,$utils,$idQ_etudiant,,$note);pg_execute(BD_PROJET, $query_examen);}

//A voir dans le code comment mettre la date et idParticiper correctement

//Participer(idParticiper,#idUtilisateurs,#idQuiz, date,note)
	// mise à jour du compteur de points

// si le type de qcm est examen enregistrement de la note dans la bd 

// fabrication de l'objet JSON pour renvoyer la note
//renvoi de la note
echo "La note du quiz est $note";
/*$resultat['note']= "20"; */

echo json_encode($note);
}
?>
