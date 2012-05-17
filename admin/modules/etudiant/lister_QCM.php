<?php

// Ce modules récupère la liste des QCM corespondant à un cours



// récupération de l'id du cours passée par un paramètre de type POST nom variable $_POST['id_cours']




// requête à la base de donnée pour récupérer les id des QCM et les noms des QCM et les types de qcm

// traitement des résultats et fabrication de l'objet JSON
/*
 $qcm[0]['id'] = 1;
 $qcm[0]['nom'] = "NomQcm";
 $qcm[0]['type'] = "typeDuQcm";
*/
echo json_encode($qcm);
?>
