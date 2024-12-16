<?php

include "../Controller/reponseController.php";
$reponsec = new reponseController();
$list = $reponsec->recList(); // This method will fetch all reponse
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes reponses.</title>
</head>
<style>
    /* General Styles */
/* General Styles */
/* General Styles */
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
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5); /* Ensure the background image covers the entire body */
    color: #333;
}


.container {
    width: 90%; /* Increased width of the container */
    max-width: 1200px; /* Set a maximum width for larger screens */
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
/* Table Styling */
table {
    width: 100%; /* Table takes full width of the container */
    border-collapse: collapse;
    margin-top: 30px;
}

th {
    background-color: #2ecc71; /* Green background for table headers */
    color: white; /* White text color for headers */
    font-size: 16px;
}

td {
    background-color: #e8f5e9; /* Light green background for table cells */
    font-size: 14px;
    color: #555;
    word-wrap: break-word; /* Allow long words to break and wrap */
    max-width: 200px; /* Set a maximum width for the description column */
}

tr:nth-child(even) td {
    background-color: #c8e6c9; /* Slightly darker light green for even rows */
}

tr:hover td {
    background-color: #a5d6a7; /* Darker green on hover */
}
/* Button Styles */
a, input[type="submit"] {
    background-color: #27ae60; /* Changed button color to a darker green */
    color: white;
    padding: 15px 30px; /* Increased padding for a larger button */
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px; /* Increased font size */
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    display: inline-block; /* Ensure the button behaves like a block element */
}

a:hover, input[type="submit"]:hover {
    background-color: #219653; /* Darker green on hover */
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
    padding: 15px 30px; /* Increased padding for a larger button */
    border-radius: 5px;
    text-decoration: none;
    text-align: center;
    width: 200px; /* Increased width */
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
}</style>
<body>
    <a href="addReponse.php">BACK</a>
    <table border>
        <tr>
            <th>Id Réclamation</th>
            <th>reponse</th>
            <th>Date de Reponse</th>
           
        </tr>
        <?php
        foreach ($list as $reponse) {
        ?>
            <tr>
                <td><?= $reponse['id_reclamation']; ?></td>
                <td><?= $reponse['reponse']; ?></td>
                <td><?= $reponse['date_reponse']; ?></td>

                <td>
                    <!-- Update button for modifying the reclamation -->
     
<a href="updateReponse.php?id=<?= $reponse['id_reponse']; ?>">update</a>


                    
                    <!-- Delete link for removing the reclamation -->
                    <a href="deleteReponse.php?id=<?= $reponse['id_reponse']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
