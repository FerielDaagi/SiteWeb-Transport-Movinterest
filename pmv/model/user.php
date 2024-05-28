<?php
class user{
    private   ?string $cin_user=null;
    private ?string $nom_user=null;
    private ?string $email_user=null;
    private ?string $mdp_user=null;
    private ?string $tel_user=null;
    private ?string $sexe_user=null;
    private ?string $role_user=null;

    public function __construct($cin, $nom, $email, $mdp, $tel, $sexe, $role)
    {
        $this->cin_user = $cin;
        $this->nom_user = $nom;
        $this->email_user = $email;
        $this->mdp_user = $mdp;
        $this->tel_user = $tel;
        $this->sexe_user = $sexe;
        $this->role_user = $role;
    }
    public function getcin(){
        return   $this->cin_user;
    }
    public function setcin($cin_user){
        $this->cin_user=$cin_user;
        return $this;
    }

    public function getnom(){
        return   $this->nom_user;
    }
    public function setnom($nom_user){
        $this->nom_user=$nom_user;
        return $this;
    }

    public function getemail(){
        return   $this->email_user;
    }
    public function setemail($email_user){
        $this->email_user=$email_user;
        return $this;
    }

    public function getmdp(){
        return   $this->mdp_user;
    }
    public function setmdp($mdp_user){
        $this->mdp_user=$mdp_user;
        return $this;
    }

    public function gettel(){
        return   $this->tel_user;
    }public function settel($tel_user){
        $this->tel_user=$tel_user;
        return $this;
    }

    public function getsexe(){
        return   $this->sexe_user;
    }
    public function setsexe($sexe_user){
        $this->sexe_user=$sexe_user;
        return $this;
    }

    public function getrole(){
        return   $this->role_user;
    }
    public function setrole($role_user){
        $this->role_user=$role_user;
        return $this;
    }
}
?>