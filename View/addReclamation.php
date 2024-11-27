<?php
include "../Model/reclamation.php";
include "../Controller/ReclamationController.php";

if (
    isset($_POST["id"]) && isset($_POST["support_type"]) && isset($_POST["issue_description"])
) {
    if (
        !empty($_POST["id"]) && !empty($_POST["support_type"]) && !empty($_POST["issue_description"])
    ) {
        $reclamation = new reclamation(
            null,
            $_POST["support_type"], 
            $_POST["issue_description"], 
            "En attente", // Default state
            date('Y-m-d'), // Current date
            $_POST["id"]
        );

        $reclamationC = new ReclamationController();
        $reclamationC->addReclamation($reclamation);

        header('Location: mesReclamations.php'); // Redirect to list of reclamations
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Étudiant - Assistance en ligne</title>
    <style>
        /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4; /* Light background color */
    color: #333;
    margin: 0;
    padding: 20px;
    background-image: url('logoo.png');
    background-size: cover;
}

.container {
    max-width: 600px; /* Maximum width for the form container */
    margin: 0 auto; /* Center the container */
    background-color: #fff; /* White background for the container */
    padding: 20px;
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

/* Link Styles */
#mrec {
    display: block; /* Make the link a block element */
    text-align: center; /* Center the link */
    margin-bottom: 20px; /* Space below the link */
    color: #2ecc71; /* Green color for the link */
    text-decoration: none; /* Remove underline */
    font-size: 18px; /* Font size */
}

#mrec:hover {
    text-decoration: underline; /* Underline on hover */
}

/* Heading Styles */
h1 {
    text-align: center; /* Center the heading */
    color: #2ecc71; /* Green color for the heading */
    margin-bottom: 20px; /* Space below the heading */
}

/* Form Group Styles */
.form-group {
    margin-bottom: 15px; /* Space between form groups */
}

/* Form Labels */
label {
    display: block; /* Make labels block elements */
    margin-bottom: 5px; /* Space between label and input */
    font-weight: bold; /* Bold labels */
}

/* Form Inputs */
input[type="text"],
select,
textarea {
    width: 100%; /* Full width inputs */
    padding: 10px; /* Padding inside inputs */
    margin-bottom: 10px; /* Space below inputs */
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
button,#mrec {
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

/* Footer Styles */
.footer {
    text-align: center; /* Center the footer text */
    margin-top: 20px; /* Space above the footer */
    color: #888; /* Light gray color for footer text */
}
    </style>
</head>
<body>

<div class="container">
    <!-- Mes Réclamations Link at the Top -->
    <a href="mesReclamations.php" id="mrec">Mes Réclamations</a>

    <h1>Formulaire de Support Étudiant</h1>

    <form action="" method="POST">
        <div class="form-group">
            <label for="id">ID Étudiant :</label>
            <input type="text" id="id" name="id" >
        </div>

        <div class="form-group">
            <label for="support-type">Type de Réclamation :</label>
            <select id="support-type" name="support_type" >
                <option value="">Sélectionner votre problème</option>
                <option value="cours">Problème avec le Cours</option>
                <option value="mentor">Problème avec le Mentor</option>
                <option value="compte">Problème de Compte Étudiant</option>
                <option value="comptem">Problème de Compte Mentor</option>
                <option value="technique">Problème Technique (accès plateforme)</option>
                <option value="autre">Autre</option>
            </select>
        </div>

        <div class="form-group">
            <label for="issue-description">Description du Problème :</label>
            <textarea id="issue-description" name="issue_description" ></textarea>
        </div>

        <div class="form-group">
            <button type="submit">Envoyer la Réclamation</button>
        </div>
    </form>
</div>

<div class="footer">
    <p>&copy; 2024 - Assistance Étudiante</p>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Récupérer le formulaire
        const form = document.querySelector("form");

        form.addEventListener("submit", function (event) {
            let isValid = true; // Variable pour vérifier si le formulaire est valide
            let errorMessages = []; // Tableau pour stocker les messages d'erreur

            // Récupérer les champs
            const idField = document.getElementById("id");
            const supportTypeField = document.getElementById("support-type");
            const issueDescriptionField = document.getElementById("issue-description");

            // Validation de l'ID (doit contenir uniquement des chiffres)
            const idValue = idField.value.trim();
            if (!/^\d+$/.test(idValue)) {
                isValid = false;
                errorMessages.push("L'ID étudiant doit contenir uniquement des chiffres.");
            }

            // Validation du type de réclamation (doit être sélectionné)
            const supportTypeValue = supportTypeField.value;
            if (supportTypeValue === "") {
                isValid = false;
                errorMessages.push("Veuillez sélectionner un type de réclamation.");
            }

            // Validation de la description du problème (au moins 10 caractères)
            const issueDescriptionValue = issueDescriptionField.value.trim();
            if (issueDescriptionValue.length < 10) {
                isValid = false;
                errorMessages.push("La description du problème doit contenir au moins 10 caractères.");
            }

            // Si le formulaire est invalide, empêcher l'envoi
            if (!isValid) {
                event.preventDefault(); // Empêche l'envoi du formulaire
                alert("Veuillez corriger les erreurs suivantes :\n" + errorMessages.join("\n"));
            }
        });
    });
</script>

</body>
</html>
