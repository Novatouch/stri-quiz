<?php

// Ce modules récupère la liste des fichiers corespondant à un cours



// récupération de l'id du cours passée par un paramètre de type POST nom variable $_GET['id_cours']

$id_c=$_POST['id_cours'];

// requête à la base de donnée pour récupérer l'id des fichiers et les noms des fichiers



// traitement des résultats et fabrication de l'objet JSON

 $fichiers[0]['id'] = 1;
 $fichiers[0]['nom'] = "NomFichiers";

echo json_encode($fichiers);
?>
