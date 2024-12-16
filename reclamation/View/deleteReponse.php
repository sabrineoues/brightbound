<?php
include '../Controller/reponseController.php';
$reponsec= new reponseController();

// récupérer l'id passé dans l'URL en utilisant la methode par défaut $_GET["id"]
$reponsec->deleteReponse($_GET["id"]);
//une fois la suppression est faite une redirection vers la liste des produits ce fait
header('Location:mesReponse.php');

?>