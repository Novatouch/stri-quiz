
<?php
	session_start();
	// vérifie les variables de sessions avant d'inclure le contenu
	if (isset($_SESSION['idUtilisateur']))
	{
		echo "<h3>Bonjour ".$_SESSION['pseudo']."  !</h3>";
		echo "<p>Prenom:  ".$_SESSION['Prenom']."   </p>";
		echo "<p>Nom: ".$_SESSION['Nom']."   </p>";
		echo "<p>Role: ".$_SESSION['typeDeCompte']."  </p>";
		
		echo '<p><a href="admin/controler/controler_authentification.php?module=deconnexion"> Déconnecté </a></p>';
	}
	else
	{
		echo "<h3>Bienvenue sur le site</h3>";
	}


	// Affiche Nom,Prenom, role 
?>
<!-- insert your sidebar items here -->
        
      
