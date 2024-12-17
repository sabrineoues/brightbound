<?php
include "../Model/reponse.php";
include "../Controller/reponseController.php";

// Vérification et traitement du formulaire
if (isset($_POST["reponse"]) && isset($_GET["id"])) {
    if (!empty($_POST["reponse"]) && !empty($_GET["id"])) {
        $reponse = new Reponse(
            $_GET["id"],        // id_reclamation
            null,               // id_reponse (auto-généré par la base)
            $_POST["reponse"],  // Texte de la réponse
            date('Y-m-d')       // Date actuelle
        );

        $reponsec = new reponseController();
        $reponsec->addReponse($reponse);

        // Redirection après l'ajout réussi
        header('Location: http://localhost/productCRUD/reclamation/View/mesReponse.php');
        exit();
    } else {
        $error = "Erreur : Les champs sont vides.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Réponse</title>
    <style>
        /* Styles CSS */
        body {
            font-family: Arial, sans-serif;
            background-image: url('logoo.png');
            background-size: cover;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
            color: #2ecc71;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        textarea {
            width: 100%;
            height: 120px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        button {
            background-color: #2ecc71;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
            font-size: 16px;
        }
        button:hover {
            background-color: #27ae60;
        }
        a {
            display: inline-block;
            text-align: center;
            color: white;
            background-color: #3498db;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }
        a:hover {
            background-color: #2980b9;
        }
        .error {
            color: #e74c3c;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ajouter une Réponse</h1>

        <!-- Message d'erreur -->
        <?php if (isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <!-- Formulaire d'ajout de réponse -->
        <form action="" method="POST">
            <label for="reponse">Votre Réponse :</label>
            <textarea id="reponse" name="reponse" placeholder="Saisissez votre réponse ici..."></textarea>
            <button type="submit">Envoyer la Réponse</button>
        </form>

        <!-- Bouton retour -->
        <a href="mesReclamations.php">Retour</a>
    </div>
</body>
</html>
