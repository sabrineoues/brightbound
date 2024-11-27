<?php
session_start();
include_once '../Model/user.php';
include_once '../Controller/userC.php';
$message="";
$userC = new userController();
if (isset($_POST["email"]) && isset($_POST["mdp"])) {
    if (!empty($_POST["email"]) && !empty($_POST["mdp"]))
    {   $message=$userC->connexionUser($_POST["email"],$_POST["mdp"]);
         $_SESSION['e'] = $_POST["email"];// on stocke dans le tableau une colonne ayant comme nom "e",
        //  avec l'email à l'intérieur
        if($message!='Email ou le mot de passe est incorrect'){
           header('Location:../.php');} //??? pourquoi?
        else{
            $message='Email ou le mot de passe est incorrect';
        }}
    else
        $message = "Missing information";}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs - Site Mentor</title>
    <link rel="stylesheet" href="styles1.css">
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

    <section class="auth-section">
        <div class="form-container">
            <!-- Formulaire de Connexion -->
            <div class="form-box" id="sign-in">
                <h2>Connexion</h2>
                <form id="login-form">
                    <label for="">E-mail</label>
                    <input type="text" id="email" name="email" placeholder="Entrez votre e-mail" >
                    <span id="emailError" class="error"></span><br>

                    <label for="password">Mot de passe</label>
                    <input type="text" id="mdp" name="mdp" placeholder="Entrez votre mot de passe" >
                    <span id="passwordError" class="error"></span><br>

                    <button type="submit" href="">Se connecter</button>
                    <p>Pas de compte ? <a href="index2.php" onclick="showRegister()">Inscrivez-vous ici</a></p>
                </form>
            </div>
            <script src="js/script1.js"></script>

            
</body>
</html>
