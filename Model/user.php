<?php
class USER 
{
    //décalaration des attributs private en raison de sécurité
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $tel;
    private $role;
    private $parcours;
    private $mdp;

    public function __construct($id, $nom, $prenom, $email, $tel, $role, $parcours, $mdp) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->tel = $tel;
        $this->role = $role;
        $this->parcours = $parcours;
        $this->mdp= $mdp;

    }
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom): self {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom): self {
        $this->prenom = $prenom;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email): self {
        $this->email = $email;
        return $this;
    }

    public function getTel() {
        return $this->tel;
    }

    public function setTel($tel): self {
        $this->tel = $tel;
        return $this;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role): self {
        $this->role = $role;
        return $this;
    }

    public function getParcours() {
        return $this->parcours;
    }

    public function setParcours($parcours): self {
        $this->parcours = $parcours;
        return $this;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function setMdp($mdp): self {
        $this->mdp = $mdp;
        return $this;
    }
}

?>
