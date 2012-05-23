-- module lister matières
SELECT m.idMatiere, m.nomM FROM Utilisateurs u
INNER JOIN AppartenirGroupe ag 	ON u.idUtilisateurs = ag.idUtilisateurs
INNER JOIN Groupes g 		ON ag.idGroupe = g.idGroupe
INNER JOIN Formation fo		ON g.idFormation = fo.idFormation
INNER JOIN Acceder ac		ON fo.idFormation = ac.idFormation		
INNER JOIN Matiere m		ON ac.idMatiere =  m.idMatiere
WHERE	u.idUtilisateurs = <remplacer php identifiant utilisateur> ;	

-- module lister cours
SELECT c.idCours, c.nomC FROM Utilisateurs u
INNER JOIN AppartenirGroupe ag 	ON u.idUtilisateurs = ag.idUtilisateurs
INNER JOIN Groupes g 		ON ag.idGroupe = g.idGroupe
INNER JOIN Formation fo		ON g.idFormation = fo.idFormation
INNER JOIN Acceder ac		ON fo.idFormation = ac.idFormation		
INNER JOIN Matiere m		ON ac.idMatiere =  m.idMatiere
INNER JOIN Cours c		ON m.idMatiere = c.idMatiere
WHERE	u.idUtilisateurs = <remplacer php identifiant utilisateur> 
AND	m.idMatiere = <remplacer php identifiant matiere> ;

-- module lister fichiers

	-- vérifie droits d'accès de l'étudiant au cours
SELECT c.idCours FROM Utilisateurs u
INNER JOIN AppartenirGroupe ag 	ON u.idUtilisateurs = ag.idUtilisateurs
INNER JOIN Groupes g 		ON ag.idGroupe = g.idGroupe
INNER JOIN Formation fo		ON g.idFormation = fo.idFormation
INNER JOIN Acceder ac		ON fo.idFormation = ac.idFormation		
INNER JOIN Matiere m		ON ac.idMatiere =  m.idMatiere
INNER JOIN Cours c		ON m.idMatiere = c.idMatiere
WHERE	u.idUtilisateurs = <remplacer php identifiant utilisateur> 
AND	c.idCours = <remplacer php identifiant cours> ;

	-- liste les fichiers pour ce cours
SELECT f.idFichier, f.nomF FROM Cours c
INNER JOIN Fichiers f ON c.idCours =  f.idCours
WHERE c.idCours = <remplacer php identifiant cours> ;

--module lister QCM
	-- vérifie droits d'accès de l'étudiant au cours
SELECT c.idCours FROM Utilisateurs u
INNER JOIN AppartenirGroupe ag 	ON u.idUtilisateurs = ag.idUtilisateurs
INNER JOIN Groupes g 		ON ag.idGroupe = g.idGroupe
INNER JOIN Formation fo		ON g.idFormation = fo.idFormation
INNER JOIN Acceder ac		ON fo.idFormation = ac.idFormation		
INNER JOIN Matiere m		ON ac.idMatiere =  m.idMatiere
INNER JOIN Cours c		ON m.idMatiere = c.idMatiere
WHERE	u.idUtilisateurs = <remplacer php identifiant utilisateur> 
AND	c.idCours = <remplacer php identifiant cours> ;

	-- liste les qcm pour ce cours
SELECT q.idQuiz, q.nomQ, q.typeQuiz, tempsEpreuve FROM Quiz q
INNER JOIN Cours c ON c.idCours =  q.idCours
WHERE c.idCours = <remplacer php identifiant cours> ;


-- module lister question propositions

	-- vérifie droits d'accès de l'étudiant au cours
SELECT c.idCours FROM Utilisateurs u
INNER JOIN AppartenirGroupe ag 	ON u.idUtilisateurs = ag.idUtilisateurs
INNER JOIN Groupes g 		ON ag.idGroupe = g.idGroupe
INNER JOIN Formation fo		ON g.idFormation = fo.idFormation
INNER JOIN Acceder ac		ON fo.idFormation = ac.idFormation	
INNER JOIN Matiere m		ON ac.idMatiere =  m.idMatiere
INNER JOIN Cours c		ON m.idMatiere = c.idMatiere
WHERE	u.idUtilisateurs = <remplacer php identifiant utilisateur> 
AND	c.idCours = <remplacer php identifiant cours> ;
	
	-- recupère toutes les question du quiz
SELECT quest.idQuestion, quest.intituleQ FROM Quiz qui
INNER JOIN  ContenirQuestion cq ON qui.idQuiz =  cq.idQuiz
INNER JOIN  Questions quest ON qui.idQuestion =  quest.idQuestion
WHERE qui.idQuiz = <remplacer php identifiant quiz> ;

	-- recupère toutes les propositions de la question
SELECT p.idProposition, p.intituleProp FROM Questions q
INNER JOIN ProposerReponse pr ON q.idQuestion = pr.idQuestion
INNER JOIN Propositions	   p  ON pr.idProposition = p.idProposition
WHERE q.idQuestion = <remplacer php identifiant questions> ;


-- module telechargement_fichier

	--retourne le lien du fichier
SELECT f.lien FROM Utilisateurs u
INNER JOIN AppartenirGroupe ag 	ON u.idUtilisateurs = ag.idUtilisateurs
INNER JOIN Groupes g 		ON ag.idGroupe = g.idGroupe
INNER JOIN Formation fo		ON g.idFormation = fo.idFormation
INNER JOIN Acceder ac		ON fo.idFormation = ac.idFormation
INNER JOIN Matiere m		ON ac.idMatiere =  m.idMatiere
INNER JOIN Cours c		ON m.idMatiere = c.idMatiere
INNER JOIN Ficheirs f		ON c.idCours = f.idCours
WHERE	u.idUtilisateurs = <remplacer php identifiant utilisateur> 
AND	f.idCours = <remplacer php identifiant fichiers> ;
	

-- module verification qcm

	-- récupérer le type de quiz
SELECT typeQuiz FROM Quiz
WHERE idQuiz = <données php idQuiz>,
	-- enrgistrement de la participation utilisateur
	INSERT INTO Participer (idUtilisateurs, idQuiz, date) VALUES(<valeur modifié php>,<valeur modifié php>,now());
	-- requete pour récupérer l'id de participer
	SELECT idParticiper FROM Participer 
	WHERE idUtilisateurs = <php id Util>
	AND 	idQuiz= <donné php id quiz>
	AND 	date > (now() - interval '5 second')

	--récupérer bonne réponses
SELECT p.idProposition FROM Questions q
INNER JOIN ProposerReponse pr ON q.idQuestion = pr.idQuestion
INNER JOIN Propositions	   p  ON pr.idProposition = p.idProposition
WHERE q.idQuestion = <remplacer php identifiant questions> 
AND pr.exact = true;

	--enregistrement des réponses cochés
	INSERT INTO Cocher VALUES(<valeur modifié php idParticiper>,<valeur modifié idQuestion>,<idProposition>) php>,now());
