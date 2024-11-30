<?php
require "../config.php";

class ReclamationController
{
    // select all product list
    public function recList()
    {
        $sql = "SELECT * FROM reclamation";
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
        public function addReclamation($reclamation) {
            $sql = "INSERT INTO reclamation (id_reclamation, objet, description, state, date_rec, id) 
                    VALUES (NULL, :objet, :description, :state, :date_rec, :id)";
            
            $db = config::getConnexion();
    
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'objet' => $reclamation->getObjet(),
                    'description' => $reclamation->getDescription(),
                    'state' => $reclamation->getState(),
                    'date_rec' => $reclamation->getDateRec(),
                    'id' => $reclamation->getId()
                ]);
                echo "Réclamation ajoutée avec succès.";
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
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
            state = :state
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
    public function deleteReclamation($id)
    {
        $sql = "DELETE FROM reclamation WHERE id_reclamation=:id";
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
