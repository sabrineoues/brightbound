<?php
include '../Controller/ReclamationController.php';
$reclamationc= new ReclamationController();

// récupérer l'id passé dans l'URL en utilisant la methode par défaut $_GET["id"]
$reclamationc->deleteReclamation($_GET["id"]);
//une fois la suppression est faite une redirection vers la liste des produits ce fait
header('Location:mesReclamations.php');

?>