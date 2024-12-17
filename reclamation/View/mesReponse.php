<?php
include "../Controller/reponseController.php";
$reponsec = new reponseController();

try {
    $list = $reponsec->recList(); // Fetch all responses
} catch (Exception $e) {
    die("Error: " . $e->getMessage()); // Handle any retrieval errors gracefully
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Réponses</title>
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-image: url('logoo.png');
            background-size: cover;
            background-position: center;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 28px;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #2ecc71;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e0f7fa;
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: #27ae60;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #219653;
        }

        .empty-message {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #555;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            background-color: #2ecc71;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #27ae60;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Liste des Réponses</h1>
        <a href="mesReclamations.php" class="back-button">mes reclamations</a>

       
            <table>
                <tr>
                    <th>Id Réclamation</th>
                    <th>Réponse</th>
                    <th>Date de Réponse</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($list as $reponse) : ?>
                    <tr>
                        <td><?= htmlspecialchars($reponse['id_reclamation']); ?></td>
                        <td><?= htmlspecialchars($reponse['reponse']); ?></td>
                        <td><?= htmlspecialchars($reponse['date_reponse']); ?></td>
                        <td>
                            <!-- Update Button -->
                            <a href="updateReponse.php?id=<?=($reponse['id_reponse']); ?>">Modifier</a>
                            <!-- Delete Button -->
                            <a href="deleteReponse.php?id=<?=($reponse['id_reponse']); ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
                    
    </div>
</body>

</html>
