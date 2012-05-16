<?php

// Ce module récupère la liste des questions et des propositions

// vérification que l'utilisateur est authentifié

// Récupération du paramètre $_POST['id_qcm']

// vérifie que l'utilisateur à bien le droit d'accéder au QCM

// récupère toutes les questions et les propositions du QCM

// fabrication de l'objet JSON
/* format:
$qcm[0]["id"]= 1;
$qcm[0]["intitule"]= "Q'est ce qu'un scanneur";
$qcm[0]["propositions"][0]["id"]= 1;
$qcm[0]["propositions"][0]["intitule"]= "Nmap";
$qcm[0]["propositions"][1]["id"]= 2;
$qcm[0]["propositions"][1]["intitule"]= "telnet";
$qcm[0]["propositions"][2]["id"]= 3;
$qcm[0]["propositions"][2]["intitule"]= "Nessus" ;
$qcm[0]["propositions"][3]["id"]= 4;
$qcm[0]["propositions"][3]["intitule"]=  "OpenVas" ;
*/

?>
