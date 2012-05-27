<?php

// Ce modules récupère la liste des cours corespondant à une matière et dont l'utilisateur à accès

// récupération des variables de sessions contenant l'id de l'utilisateur

// récupération de l'id de la matière passée par un paramètre de type POST nom variable $_POST['id_module']


// requête à la base de donnée 

// traitement des résultats et fabrication de l'objet JSON
if(!isset($_GET['idmodule']))
{
$bool= "existepas";
}
else
{
	$bool= $_GET['idmodule'];
}
 $cours[0]['id'] = 1;
 $cours[0]['nom'] = $bool;
 $cours[1]['id'] = 2;
 $cours[1]['nom'] = "Les sacanneurs réseaux";
 $cours[2]['id'] = 3;
 $cours[2]['nom'] = "initiation iptables";
 $cours[3]['id'] = 4;
 $cours[3]['nom'] = "iptables avancée";

 echo json_encode($cours);
?>
