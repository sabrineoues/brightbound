<?php
include 'C:\xampp\htdocs\userfinal\Model\user.php';
include 'C:\xampp\htdocs\userfinal\Controller\userC.php';

if (
    isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["tel"]) && isset($_POST["role"]) && isset($_POST["parcours"]) && isset($_POST["mdp"])
) {
    if (
        !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["email"]) && !empty($_POST["tel"]) && !empty($_POST["role"]) && !empty($_POST["parcours"]) && !empty($_POST["mdp"])
    ) {
      if($_POST["role"]=="Mentor"){
        $user = new USER(null, $_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["tel"], $_POST["role"], $_POST["parcours"], $_POST["mdp"]);

        $userC = new userController();
        $userC->adduser($user);
        header('Location:Back Office/mentors.php');
        exit;
      }

       else if($_POST["role"]=="Etudiant"){
        $user = new USER(null, $_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["tel"], $_POST["role"], $_POST["parcours"], $_POST["mdp"]);
        $userC = new userController();
        $userC->adduser($user);
        header('Location:Back Office/userstudent.php');
        exit;
        }
    }
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="styles2.css">
   

    
    <style>
        /* Dégradé de vert pour le fond */
        body {
          background: linear-gradient(to right, #a8e6cf, #d4f1d1);
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
        }
    
        .form-container {
          max-width: 500px;
          margin: 60px auto ;
          padding: 40px;
          background-color: #ffffff;
          border-radius: 12px;
          box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    
        h2 {
          text-align: center;
          color: #299169;
        }
    
        label {
          display: block;
          margin-bottom: 8px;
          font-weight: bold;
          color: #2d894d;
        }
    
        input, select, button {
          width: 100%;
          padding: 12px;
          margin-bottom: 15px;
          border: 2px solid #1d804b;
          border-radius: 6px;
          font-size: 16px;
        }
    
        input[type="tel"], input[type="email"], input[type="text"], input[type="number"], select {
          background-color: #f1f8e9;
        }
    
        button {
          background-color: #349b64;
          color: white;
          border: none;
          font-weight: bold;
          cursor: pointer;
          transition: background-color 0.3s ease;
        }
    
        button:hover {
          background-color: #29734a;
        }
    
        /* Pour masquer les sections supplémentaires */
        .hidden {
          display: none;
        }
    
        .form-container .btn {
          width: auto;
          margin: 0 auto;
          display: block;
        }
    
      </style>
     <style>
      .error {
              color: rgb(255, 9, 9);
              
          }
          .success {
              color: green;
          }
  </style>
    </head>
    <body>
        <header>
            <a href="C:\xampp\htdocs\projetsabrine\View\Front Office\index.html">HOME</a>
            <a href="C:\xampp\htdocs\projetsabrine\View\Front Office\about.html">ABOUT</a>
            <h1>BrightBound</h1>
            <p>Connectez-vous ou inscrivez-vous pour accéder à la plateforme.</p>
        </header>
    
      <div class="form-container">
        <h2>Formulaire d'Inscription</h2>
    
        <!-- Formulaire -->
        <form action="" method ="POST" id="dynamic-form" >
          <!-- Informations générales -->
          <label for="first-name">Prénom</label>
          <input type="text" id="prénom" name="prenom" placeholder="Tapez votre prénom" >
          <h4 id="prenomError" class="error"></h4><br>
    
          <label  for="last-name"> Nom</label>
          <input type="text" id="nom" name="nom" placeholder="Tapez votre nom">
          <h4 id="nomError" class="error"></h4><br>
    
    
          <label for="email">Email</label>
          <input type="text" id="email" name="email" placeholder="Tapez votre e-mail">
          <h4 id="emailError" class="error"></h4><br>

          <label for="phone">Numéro de téléphone</label>
          <input type="text" id="tel" name="tel" placeholder="Tapez votre numéro de téléphone">
          <h4 id="numberError" class="error"></h4><br>
    
          <!-- Choix du type de personne -->
          <label for="user-type">Je suis un(e)</label>
          <select id="user-type" name="role" >
            <option value="">Sélectionnez...</option>
            <option type ="text"value="Etudiant">Etudiant</option>
            <option type ="text"value="Mentor">Mentor</option>
          </select>

          <label for="">Le parcours scolaire</label>
          <input type="text" id="parcours" name="parcours" placeholder="Le parcours scolaire">
          <h4 id="parcoursError" class="error"></h4><br>

         <!--label du mot de passe--> 
          <label for="">Donner une mot de passe</label>
          <input type="text" id="mdp2" name="mdp" placeholder="Mot de passe" >
          <h4 id="mdpError" class="error"></h4><br>

          <label for="">Confirmer votre mot de passe</label>
          <input type="text" id="mdp1" name="mdp" placeholder="Mot de passe" >
          <h4 id="mdp1Error" class="error"></h4><br>

          <!-- Informations supplémentaires pour l'étudiant -->
          <!--<div id="student-fields" class="hidden">
            <label for="course">Niveau scolaire</label>
            <input type="text" id="niveau" name="niveau" placeholder="Ex:BAC+..." required>
            <h4 id="niveauError" class="error"></h4><br>
    
            <label for="graduation-year">Les demandes que vous intéresses</label>
            <input type="text" id="demande" name="demande" placeholder="Ex: Développement personnels" required>
            <h4 id="demandeError" class="error"></h4><br>
          </div>
    
          Informations supplémentaires pour l'enseignant 
          <div id="teacher-fields" class="hidden">
            <label for="subject">Domaine de mentorat</label>
            <input type="text" id="domaineM" name="domaineM" placeholder="Ex: Communication,Orientation" required>
            <h4 id="subjectError" class="error"></h4><br>
    
            <label for="years-of-experience">Votre CV</label>
            <input type="text" id="CV" name="CV" placeholder="Votre cv " required>
            <h4 id="cvError" class="error"></h4><br>
          </div>-->
          


         
    
          <!-- Bouton de soumission -->
          <button type="submit" class="btn">Soumettre</button>
        </form>
      </div>
    
      <script>
        // Fonction pour afficher les champs en fonction du choix de l'utilisateur
    /*    function showFields() {
          var userType = document.getElementById("user-type").value;
          
          // Réinitialisation des champs
          document.getElementById("student-fields").classList.add("hidden");
          document.getElementById("teacher-fields").classList.add("hidden");
    
          // Afficher les champs appropriés
          if (userType === "student") {
            document.getElementById("student-fields").classList.remove("hidden");
          } else if (userType === "teacher") {
            document.getElementById("teacher-fields").classList.remove("hidden");
          }
        }*/
      </script>
      <script src="js/script2.js"></script>
    
    </body>
    </html>
    