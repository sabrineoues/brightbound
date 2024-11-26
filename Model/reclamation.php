<?php
class Reclamation
{
    private $id_reclamation;
    private $objet;
    private $description;
    private $state;
    private $date_rec;
    private $id;

    public function __construct($id_reclamation, $objet, $description, $state, $date_rec, $id)
    {
        $this->id_reclamation = $id_reclamation;
        $this->objet = $objet;
        $this->description = $description;
        $this->state = $state;
        $this->date_rec = $date_rec;
        $this->id = $id;
    }

    public function getObjet()
    {
        return $this->objet;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getDateRec()
    {
        return $this->date_rec;
    }

    public function getId()
    {
        return $this->id;
    }
}
?>
