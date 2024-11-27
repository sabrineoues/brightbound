<?php
require 'C:\xampp\htdocs\userfinal\config.php';

class userController
{
    // select all commande list
    public function userList()
    {
        $sql = "SELECT * FROM user";
        $conn = config::getConnexion();

        try {
            $liste = $conn->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    //select one commande by id
    function getUsersByRole($role)
{
    $sql = "SELECT * FROM user WHERE role = :role"; // Utilisation de la requête préparée avec des paramètres liés
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindValue(':role', $role, PDO::PARAM_STR); // On lie la variable :role
        $query->execute();

        // Retourne tous les utilisateurs correspondant au rôle
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
function getUsersById($id)
{
    $sql = "SELECT * FROM user WHERE id= :id"; // Utilisation de la requête préparée avec des paramètres liés
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_STR); // On lie la variable :id
        $query->execute();

        // Retourne tous les utilisateurs correspondant au rôle
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
    // add new user
    public function adduser($user)
{
    $sql = "INSERT INTO user (id, nom, prenom, email,tel,role,parcours,mdp)
    VALUES (NULL, :nom, :prenom, :email, :tel, :role, :parcours, :mdp)";
    $conn = config::getConnexion();

    try {
        $query = $conn->prepare($sql);
        $query->execute([
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email' => $user->getEmail(),
            'tel' => $user->getTel(),
            'role' => $user->getRole(),
            'parcours' => $user->getParcours(),
            'mdp' => $user->getMdp()
        ]);
       // echo "user inserted successfully";
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
function connexionUser($email,$mdp){
	$sql="SELECT * FROM user WHERE email='" . $email . "' and mdp = '". $mdp."'";
	$db = config::getConnexion();
	try{
		$query=$db->prepare($sql);
		$query->execute();
		$count=$query->rowCount();
		if($count==0) {
			$message = "Email ou le mot de passe est incorrect";
		} else {
			$x=$query->fetch();
			$message = $x['role'];
		}
	}
	catch (Exception $e){
			$message= " ".$e->getMessage();
	}
  return $message;
}

    function updateuser($user, $id)
    {
        $db = config::getConnexion();

        $query = $db->prepare(
            'UPDATE user SET
                id = :id,
                nom = :nom,
                prenom = :prenom,
                email = :email,
                tel = :tel,
                role = :role,
                parcours = :parcours,
                mdp = :mdp
            WHERE id = :id'
        );
        try {
            $query->execute([
                'id' => $id,
                'nom' => $user->getNom(),              
                'prenom' => $user->getPrenom(),
                'email' => $user->getEmail(),
                'tel' => $user->getTel(),
                'role' => $user->getRole(),
                'parcours' => $user->getParcours(),
                'mdp' => $user->getMdp(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }




    // delete one product by id
    public function deleteuser($id)
    {
        $sql = "DELETE FROM user WHERE id=:id";
        $conn = config::getConnexion();
        $req = $conn->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
