

</body>
</html>
<?php
include "../Model/reponse.php";
include "../Controller/reponseController.php";

$reponse= null;
$error = "";
// create an instance of the controller
$reponsec = new reponseController();

//utiliser la fonction isset() pour vérifier si les clés name, price et category existe avant d'y accéder
if (isset($_POST["reponse"]) && isset($_GET["id"])) {
    if (!empty($_POST["reponse"]) && !empty($_GET["id"])) {
        // créer un objet à partir des nouvelles valeurs passées pour mettre à jour le produit choisi
        $reponse=new  reponse(
    
        $_POST['id_reclamation'],
        $_POST['objet'],
        $_POST['description'],
        $_POST['state'],
        $_POST['date_rec'],
        $_POST['id'],
        );
        // appelle de la fonction updatecommande
        $reclamationc->updateReclamation($reclamation,$_POST["id_reclamation"]);
        // une fois l'update est faite une redirection vers la page liste des produits sera faite
        header('Location:mesReclamations.php');
    } else
        // message en cas de manque d'information
        $error = "Missing information";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Reponse</title>
    <link rel="stylesheet" href="css/style66.css">
</head>

<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4; /* Light background color */
    color: #333;
    margin: 0;
    padding: 20px;
    background-image: url('logoo.png');
    background-size: cover;
    shadow:20;
}

h3 {
    text-align: center;
    color: #2ecc71; /* Green color for the heading */
    margin-bottom: 20px;
}

/* Form Container */
form {
    background-color: #fff; /* White background for the form */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    max-width: 600px; /* Maximum width for the form */
    margin: 0 auto; /* Center the form */
}

/* Form Labels */
label {
    display: block; /* Make labels block elements */
    margin-bottom: 5px; /* Space between label and input */
    font-weight: bold; /* Bold labels */
}

/* Form Inputs */
input[type="text"],
input[type="date"],
textarea {
    width: 100%; /* Full width inputs */
    padding: 10px; /* Padding inside inputs */
    margin-bottom: 15px; /* Space below inputs */
    border: 1px solid #ccc; /* Light border */
    border-radius: 5px; /* Rounded corners */
    font-size: 14px; /* Font size */
}

/* Textarea Specific Styles */
textarea {
    height: 100px; /* Set a height for the textarea */
    resize: vertical; /* Allow vertical resizing */
}

/* Submit Button */
button, #mrec {
    background-color: #2ecc71; /* Green background for the button */
    color: white; /* White text color */
    padding: 10px 20px; /* Padding for the button */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    font-size: 16px; /* Font size */
    cursor: pointer; /* Pointer cursor on hover */
    transition: background-color 0.3s ease; /* Smooth transition */
    display: block; /* Center the button */
    margin: 0 auto; /* Center the button */
}

button:hover {
    background-color: #27ae60; /* Darker green on hover */
}
#mrec{
     /* Red color for error messages */
    text-align: center; /* Center the error message */
    margin-top: 10px; 
}
/* Error Message */
.error-message {
    color: red; /* Red color for error messages */
    text-align: center; /* Center the error message */
    margin-top: 10px; /* Space above the error message */
}</style>
<body>


    <?php
    // Retrieve the reclamation by its ID if not already fetched
    if (!empty($_GET['id'])) {
        $reponse = $reponsec->getReponseById($_GET['id']);
    ?>
        <!-- Form to update the reclamation -->
        <form action="" method="POST">
        <a href="mesReponse.php" id="mrec">Mes reponse</a>
        <h3>Modifier votre reponse</h3>
            
            <label for="reponse">ID Réclamation :</label>
           <textarea name="reponse" id="reponse"></textarea>

            
            <button type="submit">Modifier le reponse</button>
        </form>
        <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the form and the error message container
        const form = document.querySelector("form");
        const errorMessageDiv = document.createElement("div"); // Create a dynamic div for error messages
        errorMessageDiv.id = "error-message";
        errorMessageDiv.style.display = "none"; // Hide initially
        errorMessageDiv.style.color = "red";
        form.prepend(errorMessageDiv); // Place it before the form

        form.addEventListener("submit", function (event) {
            let isValid = true; // To track form validity
            let errorMessages = []; // Array to hold error messages

            const objetField = document.getElementById("reponse");

            if (reponse.length < 10) {
                isValid = false;
                errorMessages.push("La reponse doit contenir au moins 10 caractères.");
            }
            if (!isValid) {
                event.preventDefault(); // Stop form submission
                errorMessageDiv.innerHTML = `<h3>Erreurs :</h3><ul><li>${errorMessages.join("</li><li>")}</li></ul>`;
                errorMessageDiv.style.display = "block"; // Show the error message div
            } else {
                errorMessageDiv.style.display = "none"; // Hide error messages if form is valid
            }
        });
    });
</script>

    <?php
    } else {
        echo "<p>Aucune reponse trouvée pour mise à jour.</p>";
    }
    ?>

    <?php if (!empty($error)): ?>
        <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
</body>

</html>