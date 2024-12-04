<?php
class Reponse
{
    private $id_reclamation;
    private $id_reponse;
    private $reponse;
    private $date_reponse;

    public function __construct($id_reclamation, $id_reponse, $reponse, $date_reponse)
    {
        $this->id_reclamation = $id_reclamation;
        $this->id_reponse = $id_reponse;
        $this->reponse = $reponse;
        $this->date_reponse = $date_reponse;
    }

    public function getIdReclamation()
    {
        return $this->id_reclamation;
    }

    public function getIdReponse()
    {
        return $this->id_reponse;
    }

    public function getReponse()
    {
        return $this->reponse;
    }

    public function getDateReponse()
    {
        return $this->date_reponse;
    }
}
?>
