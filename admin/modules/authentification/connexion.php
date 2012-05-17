<?php

// Ce module vérifie l'identité de l'utilisateur créer des varaibles de sessions et le redirige vers la bonne interface

// récupération des variables de sessions contenant le mot de passe et l'identifiant $_POST['identifiant'] et $_POST['mdp']

// requête à la base pour récupérer les information de l'utilisateur

// vérification du mot de passe 

// si mauvas mdp redirection page de connexion 

// Création des varaibles de sessions
$_SESSION['idUtilisateur']=;
$_SESSION['Nom']=;
$_SESSION['Prenom']=;
$_SESSION['typeDeCompte']=;

// redirection vers la bonne interface en fonction du type de compte
?>
