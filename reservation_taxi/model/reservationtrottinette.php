<?php
class reservationtrottinette{
    private ?string $heure=null;
    private ?string $adresse=null;
    private ?string $duree=null;
    private ?string $CIN=null;
    private ?string $numero=null;
    

    public function __construct( $CIN,$heure, $duree,$adresse,  $numero)
    {
        $this->CIN = $CIN;
        $this->heure = $heure;
        $this->duree = $duree;
        $this->adresse = $adresse;
      
       
        $this->numero = $numero;
    }
    public function getCIN(){
        return   $this->CIN;
    }
    public function setCIN($CIN){
        $this->CIN=$CIN;
        return $this;
    }


    public function getheure(){
        return   $this->heure;
    }
    public function setheure($heure){
        $this->heure=$heure;
        return $this;
    }

    public function getduree(){
        return   $this->duree;
    }
    public function setduree($duree){
        $this->duree=$duree;
        return $this;
    }

    public function getadresse(){
        return   $this->adresse;
    }
    public function setadresse($adresse){
        $this->adresse=$adresse;
        return $this;
    }

   
  
    public function getnumero(){
        return   $this->numero;
    }
    public function setnumero($numero){
        $this->numero=$numero;
        return $this;
    }

}
?>