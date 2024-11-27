<?php
include 'C:\xampp\htdocs\userfinal\Controller\userC.php';
$userC = new userController();

// récupérer l'id passé dans l'URL en utilisant la methode par défaut $_GET["id"]
$userC->deleteuser($_GET["id"]);
//une fois la suppression est faite une redirection vers la liste des produits ce fait
header('Location:Back Office/userstudent.php');
?>