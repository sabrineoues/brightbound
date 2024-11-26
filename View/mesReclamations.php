<?php

include "../Controller/ReclamationController.php";
$reclamationC = new ReclamationController();
$list = $reclamationC->recList(); // This method will fetch all reclamations
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Réclamations</title>
</head>
<style>
    /* General Styles */
/* General Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f7f9fc;
    color: #333;
}

.container {
    width: 80%;
    margin: 30px auto;
    background-color: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

/* Header Styles */
h1 {
    text-align: center;
    color: #333;
    margin-bottom: 30px;
    font-size: 32px;
    letter-spacing: 1px;
    font-weight: bold;
    text-transform: uppercase;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
}

th, td {
    padding: 16px;
    text-align: left;
    border-bottom: 1px solid #e5e5e5;
}

th {
    background-color: #3498db;
    color: white;
    font-size: 16px;
}

td {
    background-color: #f9f9f9;
    font-size: 14px;
    color: #555;
}

tr:nth-child(even) td {
    background-color: #f4f6f9;
}

tr:hover td {
    background-color: #e0f7fa;
}

/* Button Styles */
a, input[type="submit"] {
    background-color: #3498db;
    color: white;
    padding: 12px 25px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

a:hover, input[type="submit"]:hover {
    background-color: #2980b9;
    transform: translateY(-2px);
}

/* Action Button Styles */
td a {
    margin-right: 10px;
}

form {
    display: inline;
}

/* Footer Section */
.footer {
    text-align: center;
    font-size: 14px;
    margin-top: 40px;
    color: #888;
}

/* Add a "Back to Dashboard" button */
#back-button {
    display: block;
    background-color: #2ecc71;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    text-align: center;
    width: 180px;
    margin: 20px auto;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

#back-button:hover {
    background-color: #27ae60;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        width: 90%;
        padding: 20px;
    }

    h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    table {
        font-size: 14px;
    }

    th, td {
        padding: 12px;
    }

    a, input[type="submit"] {
        padding: 10px 20px;
        font-size: 13px;
    }
}


</style>
<body>
    <a href="addReclamation.php">Add Reclamation</a>
    <table border>
        <tr>
            <th>Id Réclamation</th>
            <th>Objet</th>
            <th>Description</th>
            <th>État</th>
            <th>Date de Réclamation</th>
            <td>Action</td>
        </tr>
        <?php
        foreach ($list as $reclamation) {
        ?>
            <tr>
                <td><?= $reclamation['id_reclamation']; ?></td>
                <td><?= $reclamation['objet']; ?></td>
                <td><?= $reclamation['description']; ?></td>
                <td><?= $reclamation['state']; ?></td>
                <td><?= $reclamation['date_rec']; ?></td>

                <td>
                    <!-- Update button for modifying the reclamation -->
     
<a href="updateReclamation.php?id=<?= $reclamation['id_reclamation']; ?>">update</a>


                    
                    <!-- Delete link for removing the reclamation -->
                    <a href="deleteReclamation.php?id=<?= $reclamation['id_reclamation']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
