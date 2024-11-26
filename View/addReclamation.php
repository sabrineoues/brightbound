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
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #28a745;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .form-group textarea {
            resize: vertical;
            height: 150px;
        }
        .form-group select {
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #218838;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #888;
        }
        #mrec {
            display: inline-block;
            margin-bottom: 20px;
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
        }
        #mrec:hover {
            background-color: #218838;
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
            <input type="text" id="id" name="id" required>
        </div>

        <div class="form-group">
            <label for="support-type">Type de Réclamation :</label>
            <select id="support-type" name="support_type" required>
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
            <textarea id="issue-description" name="issue_description" required></textarea>
        </div>

        <div class="form-group">
            <button type="submit">Envoyer la Réclamation</button>
        </div>
    </form>
</div>

<div class="footer">
    <p>&copy; 2024 - Assistance Étudiante</p>
</div>

</body>
</html>
