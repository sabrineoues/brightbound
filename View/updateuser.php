<?php
include 'C:\xampp\htdocs\userfinal\Controller\userC.php';
include 'C:\xampp\htdocs\userfinal\Model\user.php';

$user= null;
$error = "";
// create an instance of the controller
$userController= new userController();

//utiliser la fonction isset() pour vérifier si les clés name, price et category existe avant d'y accéder
if (
    isset($_POST["nom"])  && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["tel"]) && isset($_POST["role"]) && isset($_POST["parcours"]) && isset($_POST["mdp"])
) {
    //utiliser la fonction empty() pour vérifier si les clés name, price et category posséde des valeurs
    if (
        !empty($_POST["nom"])  && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["tel"]) && isset($_POST["role"]) && isset($_POST["parcours"]) && isset($_POST["mdp"])
    ) {
        // créer un objet à partir des nouvelles valeurs passées pour mettre à jour le produit choisi
        $user = new USER(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['tel'],
            $_POST['role'],
            $_POST['parcours'],
            $_POST['mdp'],
        );
        // appelle de la fonction updatecommande
        if( $_POST['role']=="Mentor"){
        $userController->updateuser($user,$_POST['id']);
        // une fois l'update est faite une redirection vers la page liste des produits sera faite
        header('Location:Back Office/mentors.php');
    }
        else if( $_POST['role']=="Etudiant"){
            $userController->updateuser($user,$_POST['id']);
        // une fois l'update est faite une redirection vers la page liste des produits sera faite
        header('Location:Back Office/userstudent.php');

        }

    } else
        // message en cas de manque d'information
        $error = "Missing information";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style66.css">
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


    <?php
    // $_POST['id'] récupérer à partir du form relative au bouton update dans la page productList
    if (isset($_POST['id'])) {
        //récupération du produit à mettre à jour par son ID
        $user= $userController->getUsersById($_POST['id']);
    ?>
        <!-- remplir le vormulaire par les données du produits à mettre à jour -->
        <form id="user" action="" method="POST">

            <label for="id">Nom de l'utilisateur</label>
            <!-- remplir chaque input par la valeur adéquate dans l'attribut value  -->

            <input class="form-control form-control-user" type="text" id="nom" name="nom" value="<?php echo $user['nom'] ?>"><br>
            <label for="title">Prénom de l'utilisateur</label>
            <input class="form-control form-control-user" type="text" id="prénom" name="prenom" value="<?php echo $user['prenom'] ?>"><br>
            <label for="title">Email de l'utlisateur</label>
            <h4 id="prenomError" class="error"></h4><br>
            <input class="form-control form-control-user" type="text" id="email" name="email" value="<?php echo $user['email'] ?>"><br>
            <label for="title">Numéro de télephone</label>
            <input class="form-control form-control-user" type="text" id="role" name="role" value="<?php echo $user['role'] ?>"><br>
            <label for="title">Parcours scolaire</label>
            <input class="form-control form-control-user" type="text" id="parcours" name="parcours" value="<?php echo $user['parcours'] ?>"><br>
            <label for="title">Mot de passe</label>
            <input class="form-control form-control-user" type="text" id="mdp" name="mdp" value="<?php echo $user['mdp'] ?>"><br>
            <input type="submit" value="save">

        </form>

    <?php
    }
    ?>

<script src="js/script2.js"></script>
</body>

</html>