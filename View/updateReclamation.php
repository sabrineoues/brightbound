<?php
// Including necessary files
include "../Model/reclamation.php";
include "../Controller/ReclamationController.php";

// Initialize variables
$reclamation = null;
$error = "";


// Create an instance of the controller
$reclamationc = new ReclamationController();


// Check if id_reclamation is provided in the URL
if (isset($_POST['id_reclamation'])) {
    $reclamation=new  Reclamation(
        $_POST['id_reclamation'],
        $_POST['objet'],
        $_POST['description'],
        $_POST['state'],
        $_POST['date_rec'],
        $_POST['id'],
    );
    // Fetch the reclamation data using the provided ID
    $reclamationc->updateReclamation($reclamation,$_POST["id"]);
    header('Location:recList.php');
    // If no reclamation found
   
}else
// message en cas de manque d'information
$error = "Missing information";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Réclamation</title>
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>

<?php
// If the reclamation data is found, display the form to edit it
if (isset($_POST['id_reclamation'])) {
    //récupération du produit à mettre à jour par son ID
    $reclamation = $ReclamationController->getReclamationById($_POST['id_reclamation']);
?>

<h1>Modifier Réclamation</h1>
<form action="updateReclamation.php" method="POST">
    

    <label for="state">État:</label>
    <input type="text" id="state" name="state" >

    

    <input type="submit" value="Enregistrer">
</form>

<?php
/*else {
    echo "<p>No reclamation found for the provided ID.</p>";
}*/}
?>

</body>
</html>
