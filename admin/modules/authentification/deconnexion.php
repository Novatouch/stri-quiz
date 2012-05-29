<?php

// Ce module supprime les sessions de l'utilisateur et le redirige vers la page de connexion

// supprssion des varaibles de sessions unset()
unset($_SESSION['idUtilisateur']);
unset($_SESSION['Nom']);
unset($_SESSION['Prenom']);
unset($_SESSION['pseudo']);
unset($_SESSION['typeDeCompte']);

// fin de la session
$_SESSION = array(); // on réécrit le tableau
session_destroy();

// redirection page de connexion
header('Location: ../../index.php');

?>
