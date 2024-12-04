<?php
require "../config.php";

class reponseController
{
    // select all product list
    public function recList()
    {
        $sql = "SELECT * FROM reponse";
        $conn = config::getConnexion();

        try {
            $liste = $conn->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    //select one product by id
    public function getReclamationById($id_reclamation)
    {
        $sql = "SELECT * FROM reclamation WHERE id_reclamation =$id_reclamation";
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            
            $query->execute();
            $reclamation = $query->fetch(PDO::FETCH_ASSOC);
            return $reclamation;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    

    // add new product
    
        // Ajout d'une réclamation
        public function addReponse($reponse)
        {
            $db = config::getConnexion(); // Make sure the database connection is established
    
            $sql = "INSERT INTO reponse (id_reclamation, reponse, date_reponse) 
                    VALUES (:id_reclamation, :reponse, :date_reponse)";
            $query = $db->prepare($sql);
    
            // Using the getIdReclamation method to fetch the id_reclamation
            $params = [
                'id_reclamation' => $reponse->getIdReclamation(), // Ensure this method is being called correctly
                'reponse' => $reponse->getReponse(),
                'date_reponse' => $reponse->getDateReponse()
            ];
    
            if ($query->execute($params)) {
                echo "Response added successfully!";
            } else {
                echo "Failed to add response.";
            }
        }
            
    
        function updateReclamation($reclamation, $id_reclamation)
{
    $db = config::getConnexion();

    // Corrected SQL statement
    $query = $db->prepare(
        'UPDATE reclamation SET 
            objet = :objet,
            description = :description,
            state = :state,
        WHERE id_reclamation = :id_reclamation'
    );

    try {
        // Execute the query with all parameters
        $query->execute([
            'objet' => $reclamation->getObjet(),
            'state' => $reclamation->getState(),
            'description' => $reclamation->getDescription(),
            'id_reclamation' => $id_reclamation // Bind the id_reclamation parameter
        ]);

        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

        




    // delete one product by id
    public function deleteReponse($id)
    {
        $sql = "DELETE FROM reponse WHERE id_reponse=:id";
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
