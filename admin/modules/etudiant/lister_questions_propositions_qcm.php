<?php

// Ce module récupère la liste des questions et des propositions

// connection au serveur bd
include_once($document_root."/admin/fonctions/connection_bd.php");
session_start();

// vérification que l'utilisateur est authentifié



// Récupération du paramètre $_GET['idqcm']
$idCours=$_GET['idCours'];
$idUtilisateur= $_SESSION['idUtilisateur'];
$idqcm=$_GET['idqcm'];

// vérifie que l'utilisateur à bien le droit d'accéder au QCM

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
		// récupération des questions
		$req = "SELECT quest.idQuestion, quest.intituleQ FROM Quiz qui
		INNER JOIN  ContenirQuestion cq ON qui.idQuiz =  cq.idQuiz
		INNER JOIN  Questions quest ON cq.idQuestion =  quest.idQuestion
		WHERE qui.idQuiz = '$idqcm'";

		$result = pg_exec($db_handle, $req);

		if($result)
		{
			$nombre=pg_numrows($result);

			for ($row = 0; $row < $nombre; $row++) 
			{
				$values = pg_fetch_array($result, $row, PGSQL_ASSOC);
				$qcm[$row]['id'] = $values['idquestion'];
				$qcm[$row]['intitule'] = $values['intituleq'];
				$idQuestion = $values['idquestion'];
				// récupération des propositions
				
				$req = "SELECT p.idProposition, p.intituleProp FROM Questions q
				INNER JOIN ProposerReponse pr ON q.idQuestion = pr.idQuestion
				INNER JOIN Propositions	   p  ON pr.idProposition = p.idProposition
				WHERE q.idQuestion = '$idQuestion'";

				$result2 = pg_exec($db_handle, $req);

				if($result2)
				{
					$nombre2=pg_numrows($result2);
					for ($row2 = 0; $row2 < $nombre2; $row2++) 
					{
						$values2 = pg_fetch_array($result2, $row2, PGSQL_ASSOC);

						$qcm[$row]["propositions"][$row2]["id"]= $values2['idproposition'];
						$qcm[$row]["propositions"][$row2]["intitule"]=  $values2['intituleprop'];
						
					}
				}
	
			}

			
			
			echo json_encode($qcm);
		}
	}
}




pg_freeresult($result);
pg_close($db_handle);

// fabrication de l'objet JSON
/*
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
$qcm[2]["propositions"][3]["intitule"]=  "OpenVas" ;*/



?>
