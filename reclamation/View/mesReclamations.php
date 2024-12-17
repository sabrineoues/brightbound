<?php
include "../Controller/ReclamationController.php";
$reclamationC = new ReclamationController();

// Filtre pour l'état sélectionné
$filter = isset($_GET['state']) ? $_GET['state'] : null;

// Récupération des réclamations avec ou sans filtre
$list = $reclamationC->recList($filter);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Réclamations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styles CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            margin: 30px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #2ecc71;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        tr:hover td {
            background-color: #d4edda;
        }

        select, button {
            padding: 8px 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }

        button {
            background-color: #27ae60;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #219653;
        }

        a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 5px 10px;
            border-radius: 5px;
            margin-right: 5px;
        }

        a:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #e74c3c;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Liste des Réclamations</h1>

        <!-- Formulaire de filtrage -->
        <form method="GET" action="" class="mb-3">
            <label for="state">Filtrer par État :</label>
            <select name="state" id="state">
                <option value="">Tous</option>
                <option value="En attente" <?= isset($_GET['state']) && $_GET['state'] === 'En attente' ? 'selected' : '' ?>>En attente</option>
                <option value="En cours" <?= isset($_GET['state']) && $_GET['state'] === 'En cours' ? 'selected' : '' ?>>En cours</option>
                <option value="Fini" <?= isset($_GET['state']) && $_GET['state'] === 'Fini' ? 'selected' : '' ?>>Fini</option>
            </select>
            <button type="submit">Filtrer</button>
            <a href="addReclamation.php" class="btn btn-success">Ajouter Réclamation</a>
        </form>

        <!-- Tableau des réclamations -->
        <table>
            <thead>
                <tr>
                    <th>ID Réclamation</th>
                    <th>Objet</th>
                    <th>Description</th>
                    <th>État</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($list)): ?>
                    <?php foreach ($list as $reclamation): ?>
                        <tr>
                            <td><?= htmlspecialchars($reclamation['id_reclamation']); ?></td>
                            <td><?= htmlspecialchars($reclamation['objet']); ?></td>
                            <td><?= htmlspecialchars($reclamation['description']); ?></td>
                            <td><?= htmlspecialchars($reclamation['state']); ?></td>
                            <td><?= htmlspecialchars($reclamation['date_rec']); ?></td>
                            <td>
                                <a href="updateReclamation.php?id=<?= $reclamation['id_reclamation']; ?>">Modifier</a>
                                <a href="deleteReclamation.php?id=<?= $reclamation['id_reclamation']; ?>" class="btn-danger">Supprimer</a>
                                <a href="addReponse.php?id=<?= $reclamation['id_reclamation']; ?>">Répondre</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Aucune réclamation trouvée.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
