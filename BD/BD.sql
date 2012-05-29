--********Création de la base de données*******

-- Database: "BD_PROJET"

-- DROP DATABASE "BD_PROJET";

--CREATE DATABASE "BD_PROJET"
--  WITH OWNER = postgres
--      ENCODING = 'UTF8'
 --      TABLESPACE = pg_default
 --      LC_COLLATE = 'French_France.1252'
  --     LC_CTYPE = 'French_France.1252'
  --     CONNECTION LIMIT = -1;


CREATE TABLE Utilisateurs
(
	idUtilisateur SERIAL CONSTRAINT cle_util PRIMARY KEY,
	nomU	VARCHAR(25),
	prenomU  VARCHAR(25),
	pseudo	VARCHAR(20),
	passwordU VARCHAR (1000), /*On laisse la place pour crypter le mot de passe*/
	typeCompte VARCHAR(50),
	CHECK(typeCompte='Enseignant' OR typeCompte='Etudiant' 
OR typeCompte='Administrateur')
);  

CREATE TABLE Formations
(
	idFormation SERIAL CONSTRAINT cle_formation PRIMARY KEY,
	nomF	VARCHAR(25)
);  
CREATE TABLE Groupes
(
	idGroupe SERIAL CONSTRAINT cle_groupe 
PRIMARY KEY,
	nomG	VARCHAR(25),
	promotion VARCHAR(25),
	idFormation int,
	CONSTRAINT fk_idFormation FOREIGN KEY(idFormation) REFERENCES Formations(idFormation)
);  



CREATE TABLE Matieres
(
	idMatiere SERIAL CONSTRAINT cle_matiere PRIMARY KEY,
	nomM	VARCHAR(25)
);  

CREATE TABLE Cours
(
	idCours SERIAL CONSTRAINT cle_cours PRIMARY KEY,
	nomC	VARCHAR(25),
	idMatiere int,
	CONSTRAINT fk_idMatiere FOREIGN KEY(idMatiere) REFERENCES Matieres(idMatiere)
);  

CREATE TABLE Fichiers
(
	idFichier SERIAL CONSTRAINT cle_fichier PRIMARY KEY,
	nomF	VARCHAR(25),
	lien VARCHAR(200),
	idCours int,
	CONSTRAINT fk_idCours FOREIGN KEY(idCours) REFERENCES Cours(idCours)
);  

CREATE TABLE Quiz
(
	idQuiz SERIAL CONSTRAINT cle_quizz PRIMARY KEY,
	nomQ	VARCHAR(25),
	tempsEpreuve int,
	passwordQ	VARCHAR(100),
	difficulte	int,
	idCours int,
	typeQuiz VARCHAR(50),
	CHECK(typeQuiz='entrainement' OR typeQuiz='evaluation'),
	CONSTRAINT fk_idCours FOREIGN KEY(idCours) REFERENCES Cours(idCours)
);  

CREATE TABLE Propositions
(
	idProposition SERIAL CONSTRAINT cle_proposition PRIMARY KEY,
	intituleProp	VARCHAR(200)
);  

CREATE TABLE Questions
(
	idQuestion SERIAL CONSTRAINT cle_question PRIMARY KEY,
	intituleQ	VARCHAR(200)
);  

 

CREATE TABLE Gerer
(
	idUtilisateur	int,
	idMatiere	int,
	CONSTRAINT fk_idUtilisateur FOREIGN KEY(idUtilisateur) REFERENCES Utilisateurs(idUtilisateur),
	CONSTRAINT fk_idMatiere FOREIGN KEY(idMatiere) REFERENCES Matieres(idMatiere),
	CONSTRAINT pk_ag PRIMARY KEY (idUtilisateur,idMatiere)
);  

CREATE TABLE AppartenirGroupe
(
	idUtilisateur	int,
	idGroupe int,
	CONSTRAINT fk_idUtilisateur FOREIGN KEY(idUtilisateur) REFERENCES Utilisateurs(idUtilisateur),
	CONSTRAINT fk_idGroupe FOREIGN KEY(idGroupe) REFERENCES Groupes(idGroupe),	
	CONSTRAINT pk_agroupe PRIMARY KEY (idUtilisateur,idGroupe)
);  

CREATE TABLE Acceder
(
	idMatiere	int,
	idFormation	int,
	CONSTRAINT fk_idMatiere FOREIGN KEY(idMatiere) REFERENCES Matieres(idMatiere),
	CONSTRAINT fk_idFormation FOREIGN KEY(idFormation) REFERENCES Formations(idFormation),
	CONSTRAINT pk_acceder PRIMARY KEY (idMatiere,idFormation)
);  

CREATE TABLE Avoir
(
	idFormation	int,
	idCours	int,
	CONSTRAINT fk_idFormation FOREIGN KEY(idFormation) REFERENCES Formations(idFormation),
	CONSTRAINT fk_idCours FOREIGN KEY(idCours) REFERENCES Cours(idCours),
	CONSTRAINT pk_avoir PRIMARY KEY (idFormation,idCours),
	etreVisible	VARCHAR(50),
	CHECK(etreVisible='true' OR etreVisible='false')
);  



CREATE TABLE ContenirQuestion
(
	idQuestion	int,
	idQuiz	int,
	CONSTRAINT fk_idQuestion FOREIGN KEY(idQuestion) REFERENCES Questions(idQuestion),
	CONSTRAINT fk_idQuiz FOREIGN KEY(idQuiz) REFERENCES Quiz(idQuiz),
	CONSTRAINT pk_cq PRIMARY KEY (idQuestion,idQuiz)
);  


CREATE TABLE ProposerReponse
(
	idQuestion	int,
	idProposition	int,
	CONSTRAINT fk_idQuestion FOREIGN KEY(idQuestion) REFERENCES Questions(idQuestion),
	CONSTRAINT fk_idProposition FOREIGN KEY(idProposition) REFERENCES Propositions(idProposition),
	point	int,
	exact	VARCHAR(50),
	CHECK(point='0' OR point='1' OR point='-1'),
	CHECK(exact='true' OR exact='false'),
	CONSTRAINT pk_pr PRIMARY KEY (idQuestion,idProposition)
);  


CREATE TABLE Participer
(
	idParticiper SERIAL UNIQUE NOT NULL,
	idUtilisateur	int ,
	idQuiz	int,
	note	int,
	date	timestamp,
	CONSTRAINT fk_idUtilisateur FOREIGN KEY(idUtilisateur) REFERENCES Utilisateurs(idUtilisateur),
	CONSTRAINT fk_idQuiz FOREIGN KEY(idQuiz) REFERENCES Quiz(idQuiz),
	
	CONSTRAINT pk_pp PRIMARY KEY (idUtilisateur,idQuiz,date)
);  


CREATE TABLE Cocher
(
	idQuestion	int,
	idProposition	int,
	idParticiper	int,
	CONSTRAINT fk_idQuestion FOREIGN KEY(idQuestion) REFERENCES Questions(idQuestion),
	CONSTRAINT fk_idProposition FOREIGN KEY(idProposition) REFERENCES Propositions(idProposition),
	/*probléme*/CONSTRAINT fk_idParticiper FOREIGN KEY(idParticiper) REFERENCES Participer(idParticiper),
	CONSTRAINT pk_coc PRIMARY KEY (idQuestion,idProposition,idParticiper)
);  


--***********INSERTION TABLE UTILISATEURS******************************************
--Select * FROM Utilisateurs;
--DELETE  FROM Utilisateurs;
--ALTER SEQUENCE utilisateurs_idutilisateur_seq RESTART WITH 1;
INSERT INTO Utilisateurs (nomu,prenomu,pseudo,passwordu,typecompte) VALUES ('Gontrand','bernard','crin','34560aa09d3eae4ce997fa390d72a05c093339e651ae16a604800c78f65b8956e255c624c518f18ebf6a55dbd8b4f27b7dfeb37eec0c953258634d9b50d62e08','Etudiant');
INSERT INTO Utilisateurs (nomu,prenomu,pseudo,passwordu,typecompte) VALUES ('Jack','o''neil','jail','34560aa09d3eae4ce997fa390d72a05c093339e651ae16a604800c78f65b8956e255c624c518f18ebf6a55dbd8b4f27b7dfeb37eec0c953258634d9b50d62e08','Etudiant');
INSERT INTO Utilisateurs (nomu,prenomu,pseudo,passwordu,typecompte) VALUES ('Akrour','Sofian','rodul','34560aa09d3eae4ce997fa390d72a05c093339e651ae16a604800c78f65b8956e255c624c518f18ebf6a55dbd8b4f27b7dfeb37eec0c953258634d9b50d62e08','Administrateur');
INSERT INTO Utilisateurs (nomu,prenomu,pseudo,passwordu,typecompte) VALUES ('Gautier','Philipe','Novatouch','34560aa09d3eae4ce997fa390d72a05c093339e651ae16a604800c78f65b8956e255c624c518f18ebf6a55dbd8b4f27b7dfeb37eec0c953258634d9b50d62e08','Administrateur');
INSERT INTO Utilisateurs (nomu,prenomu,pseudo,passwordu,typecompte) VALUES ('Debas','Benoit','Denoi','34560aa09d3eae4ce997fa390d72a05c093339e651ae16a604800c78f65b8956e255c624c518f18ebf6a55dbd8b4f27b7dfeb37eec0c953258634d9b50d62e08','Enseignant');
INSERT INTO Utilisateurs (nomu,prenomu,pseudo,passwordu,typecompte) VALUES ('Aoun','Andre','Aore','34560aa09d3eae4ce997fa390d72a05c093339e651ae16a604800c78f65b8956e255c624c518f18ebf6a55dbd8b4f27b7dfeb37eec0c953258634d9b50d62e08','Enseignant');
INSERT INTO Utilisateurs (nomu,prenomu,pseudo,passwordu,typecompte) VALUES ('Bret','Martial','Breal','34560aa09d3eae4ce997fa390d72a05c093339e651ae16a604800c78f65b8956e255c624c518f18ebf6a55dbd8b4f27b7dfeb37eec0c953258634d9b50d62e08','Enseignant');
INSERT INTO Utilisateurs (nomu,prenomu,pseudo,passwordu,typecompte) VALUES ('Mojahid','Mustapha','Mojpha','34560aa09d3eae4ce997fa390d72a05c093339e651ae16a604800c78f65b8956e255c624c518f18ebf6a55dbd8b4f27b7dfeb37eec0c953258634d9b50d62e08','Enseignant');
INSERT INTO Utilisateurs (nomu,prenomu,pseudo,passwordu,typecompte) VALUES ('Chaouche','Arslane','Chalane','34560aa09d3eae4ce997fa390d72a05c093339e651ae16a604800c78f65b8956e255c624c518f18ebf6a55dbd8b4f27b7dfeb37eec0c953258634d9b50d62e08','Etudiant');
INSERT INTO Utilisateurs (nomu,prenomu,pseudo,passwordu,typecompte) VALUES ('Reno','Pierre','Rere','34560aa09d3eae4ce997fa390d72a05c093339e651ae16a604800c78f65b8956e255c624c518f18ebf6a55dbd8b4f27b7dfeb37eec0c953258634d9b50d62e08','Etudiant');
INSERT INTO Utilisateurs (nomu,prenomu,pseudo,passwordu,typecompte) VALUES ('Uster','Francis','Usis','34560aa09d3eae4ce997fa390d72a05c093339e651ae16a604800c78f65b8956e255c624c518f18ebf6a55dbd8b4f27b7dfeb37eec0c953258634d9b50d62e08','Etudiant');
INSERT INTO Utilisateurs (nomu,prenomu,pseudo,passwordu,typecompte) VALUES ('Mystere','Il','mysl','34560aa09d3eae4ce997fa390d72a05c093339e651ae16a604800c78f65b8956e255c624c518f18ebf6a55dbd8b4f27b7dfeb37eec0c953258634d9b50d62e08','Etudiant');
INSERT INTO Utilisateurs (nomu,prenomu,pseudo,passwordu,typecompte) VALUES ('No','Name','nome','34560aa09d3eae4ce997fa390d72a05c093339e651ae16a604800c78f65b8956e255c624c518f18ebf6a55dbd8b4f27b7dfeb37eec0c953258634d9b50d62e08','Etudiant');
INSERT INTO Utilisateurs (nomu,prenomu,pseudo,passwordu,typecompte) VALUES ('Neil','Armstrong','neng','34560aa09d3eae4ce997fa390d72a05c093339e651ae16a604800c78f65b8956e255c624c518f18ebf6a55dbd8b4f27b7dfeb37eec0c953258634d9b50d62e08','Etudiant');




--******INSERTION DANS LA TABLE FORMATION ******************************************
--SELECT * FROM Formations;
INSERT INTO Formations (nomf) VALUES ('STRI');
INSERT INTO Formations (nomf) VALUES ('SMI');
INSERT INTO Formations (nomf) VALUES ('DIM');


--********INSERTION TABLE GROUPE**************************************************** 
--SELECT * FROM Groupes;
INSERT INTO Groupes (nomg,promotion,idformation) VALUES ('promo entière','2014',1);


--**************INSERTION DANS LA TABLE APPARTENIRGROUPE**********************************************

--SELECT * FROM AppartenirGroupe;
--SELECT * FROM Utilisateurs WHERE typecompte ='Etudiant';
INSERT INTO AppartenirGroupe VALUES ('1','1');
INSERT INTO AppartenirGroupe VALUES ('2','1');
INSERT INTO AppartenirGroupe VALUES ('10','1');
INSERT INTO AppartenirGroupe VALUES ('11','1');
INSERT INTO AppartenirGroupe VALUES ('12','1');
INSERT INTO AppartenirGroupe VALUES ('13','1');
INSERT INTO AppartenirGroupe VALUES ('14','1');

--*******INSERTION DANS LA TABLE MATIERE ********************************************

--SELECT * FROM Matieres;
--DELETE  FROM Matieres;
--ALTER SEQUENCE matieres_idmatiere_seq RESTART WITH 1;
INSERT INTO Matieres (nomm) VALUES ('Sécurité');
INSERT INTO Matieres (nomm) VALUES ('Maths');
INSERT INTO Matieres (nomm) VALUES ('Anglais');
INSERT INTO Matieres (nomm) VALUES ('Allemand');
INSERT INTO Matieres (nomm) VALUES ('Management');
INSERT INTO Matieres (nomm) VALUES ('Economie');
INSERT INTO Matieres (nomm) VALUES ('Espagnol');
INSERT INTO Matieres (nomm) VALUES ('Comptabilité');
INSERT INTO Matieres (nomm) VALUES ('Géographie');
INSERT INTO Matieres (nomm) VALUES ('batiment');
INSERT INTO Matieres (nomm) VALUES ('Informatique');
INSERT INTO Matieres (nomm) VALUES ('java');
INSERT INTO Matieres (nomm) VALUES ('SHS');
INSERT INTO Matieres (nomm) VALUES ('Génie civil');
INSERT INTO Matieres (nomm) VALUES ('Gestion de projet');

--**************INSERTION DANS LA TABLE ACCEDER********************************************** 
--SELECT * FROM Acceder;
INSERT INTO Acceder VALUES ('1','1');
INSERT INTO Acceder VALUES ('2','1');
INSERT INTO Acceder VALUES ('3','1');
INSERT INTO Acceder VALUES ('4','1');
INSERT INTO Acceder VALUES ('5','1');
INSERT INTO Acceder VALUES ('6','1');
INSERT INTO Acceder VALUES ('7','1');
INSERT INTO Acceder VALUES ('8','1');
INSERT INTO Acceder VALUES ('10','1');
INSERT INTO Acceder VALUES ('11','1');
INSERT INTO Acceder VALUES ('12','1');
INSERT INTO Acceder VALUES ('14','1');





--**************INSERTION DANS LA TABLE GERER**********************************************

--SELECT * FROM Gerer;
--SELECT * FROM matieres;
--SELECT * FROM Utilisateurs WHERE typecompte='Enseignant';
INSERT INTO Gerer VALUES ('5','1');
INSERT INTO Gerer VALUES ('6','1');

--**************INSERTION DANS LA TABLE COURS***********************************************
--SELECT * FROM Cours;

INSERT INTO Cours (nomc,idmatiere) VALUES ('guide de la sécurité','1');

--**************INSERTION DANS LA TABLE AVOIR**********************************************
SELECT * FROM Avoir;
SELECT * FROM Formations;
SELECT * FROM cours;
INSERT INTO Avoir (idformation,idcours) VALUES ('1','1');


--*************INSERTION DANS LA BASE FICHIERS***************************************
--SELECT * FROM Fichiers
INSERT INTO Fichiers (nomF,lien,idcours) VALUES ('matrice.pdf','fichiers/matrice.pdf','1');

--**************INSERTION DANS LA TABLE QUIZ**********************************************
--SELECT * FROM Cours;
SELECT * FROM Quiz;
INSERT INTO Quiz (nomq,idcours,typequiz) VALUES('guide sécurité',1,'entrainement');



--**************INSERTION DANS LA TABLE QUESTIONS*****************************************

INSERT INTO Questions (intituleQ) VALUES ('Quelles sont les opérations basiques à réaliser pour sécuriser une machine utlisant Windows');


--**************INSERTION DANS LA TABLE CONTENIRQUESTION**********************************************
--SELECT * FROM ContenirQuestion;
INSERT INTO ContenirQuestion VALUES ('1','1');

--*************INSERTION DANS LA BASE PROPOSITIONS***************************************
--SELECT * FROM Propositions;
INSERT INTO Propositions (intituleProp) VALUES ('Configurer un mot de passe pour le BIOS');
INSERT INTO Propositions (intituleProp) VALUES ('Utilier système de fichier performant FAT32');
INSERT INTO Propositions (intituleProp) VALUES ('Désactiver le boot sir disquette et CDROM');
INSERT INTO Propositions (intituleProp) VALUES ('Configurer un mot de passe pour le BIOS');


--ProposerReponse(#idQuestion,#idProposition,point,exact)
--SELECT * FROM ProposerReponse;
INSERT INTO ProposerReponse (idQuestion,idProposition,exact) VALUES ('1','1','true'); 
INSERT INTO ProposerReponse (idQuestion,idProposition,exact) VALUES ('1','2','false'); 
INSERT INTO ProposerReponse (idQuestion,idProposition,exact) VALUES ('1','3','true'); 
INSERT INTO ProposerReponse (idQuestion,idProposition,exact) VALUES ('1','4','true'); 

--**************INSERTION DANS LA TABLE PARTICIPER**********************************************

--INSERT INTO Participer('Chaouche','Exemple_quizz');
--SELECT * FROM questions;
--SELECT * FROM quiz;


--**************INSERTION DANS LA TABLE COCHER**********************************************


