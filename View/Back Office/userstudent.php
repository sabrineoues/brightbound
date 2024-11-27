<?php
include 'C:\xampp\htdocs\userfinal\Controller\userC.php';

$userC = new userController();
$students = $userC->getUsersByRole("Etudiant");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style55.css">
</head>

<body>
<script>
    // Function to confirm deletion
    function confirmDelete(userId) {
        const confirmation = confirm('Are you sure you want to delete this user?');
        if (confirmation) {
            // Redirect to the delete script if confirmed
            window.location.href = `../deleteuser.php?id=${userId}`;
        }
    }
</script>
<h2>Students list </h2>
    <a class="lien" href="../index2.php">Add</a>
    <table border='2'>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Numéro de télephone</th>
            <th>Role</th>
            <th>Parcours scolaire</th>
            <th>Mot de passe</th>
            <th> Update</th>
            <th> Delete </th>
        </tr>
        <?php
        foreach ($students as $user) {
        ?> <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['nom']; ?></td>
                <td><?= $user['prenom']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['tel']; ?></td>
                <td><?= $user['role']; ?></td>
                <td><?= $user['parcours']; ?></td>
                <td><?= $user['mdp']; ?></td>

                <td>
                    <!-- en cliquant sur le bouton update on appelle la page updatecommande.php et passe l'id du produit -->
                    <form method="POST" action="../updateuser.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $user['id']; ?> name="id">
                    </form>
        </td>
                 <td>   <!-- en cliquant sur le lien delete on appelle la page deletecommande.php et le id du produit sera passé dans l'url -->
                    <a href="#"onclick="confirmDelete(<?=$user['id'];?>) ">Delete</a>

                </td>
            </tr>
        <?php
        }
        ?>

    </table>
    <button href="C:\xampp\htdocs\userfinal\View\Back Office\index.html">Back To the Dashboard</button>
</body>

</html>