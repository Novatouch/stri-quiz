<?php

// Ce module récupère la liste des questions et des propositions

// vérification que l'utilisateur est authentifié



// Récupération du paramètre $_GET['idqcm']

$idqcm=$_POST['idqcm'];

// vérifie que l'utilisateur à bien le droit d'accéder au QCM



// récupère toutes les questions et les propositions du QCM



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
