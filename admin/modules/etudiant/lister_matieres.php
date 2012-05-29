<?php

// Ce module récupère la liste des matières auquels l'étudiant a accès

// récupération variable de type POST $_POST["id_matière"] 

$id_M= $_POST["id_matière"] ;

// récupération des variables de sessions contenant l'id de l'utilisateur


// requête à la base de donnée 



// traitement des résultats et fabrication de l'objet JSON

 $matieres[0]['id'] = 1;
 $matieres[0]['nom'] = "Mathématiques";
 $matieres[1]['id'] = 2;
 $matieres[1]['nom'] = "Sécurité";

echo json_encode($matieres);
?>
