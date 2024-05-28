<?php

require_once('C:/xampp/htdocs/test/ab2/config.php');


class Trotinettes
{
    // Attributes
    private $id_location;
    private $marque;
    private $modele;
    private $num_serie;
    private $duree;
    private $date;
    private $heure;

    // Constructor without parameters
    public function __construct()
    {
    }

    // Method to set attribute values
    public function setValues($marque, $modele, $num_serie, $duree, $date, $heure)
    {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->num_serie = $num_serie;
        $this->duree = $duree;
        $this->date = $date;
        $this->heure = $heure;
    }

    // Getters and setters for each attribute

    public function getIdTrotinettes()
    {
        return $this->id_location;
    }

    public function getMarque()
    {
        return $this->marque;
    }

    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    public function getModele()
    {
        return $this->modele;
    }

    public function setModele($modele)
    {
        $this->modele = $modele;
    }

    public function getNum_serie()
    {
        return $this->num_serie;
    }

    public function setNum_serie($num_serie)
    {
        $this->num_serie = $num_serie;
    }

    public function getduree()
    {
        return $this->duree;
    }

    public function setduree($duree)
    {
        $this->duree = $duree;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getHeure()
    {
        return $this->heure;
    }

    public function setHeure($heure)
    {
        $this->heure = $heure;
    }

    // Method to save the trotinettes in the database
    public function save()
    {
        try {
            $db = $GLOBALS['db'];

            // Prepare the SQL query
            $query = "INSERT INTO trotinettes (marque, modele, num_serie, duree, date, heure) VALUES (?, ?, ?, ?, ?, ?)";

            // Prepare the SQL statement
            $statement = $db->prepare($query);

            // Bind values
            $statement->bindParam(1, $this->marque);
            $statement->bindParam(2, $this->modele);
            $statement->bindParam(3, $this->num_serie);
            $statement->bindParam(4, $this->duree);
            $statement->bindParam(5, $this->date);
            $statement->bindParam(6, $this->heure);

            // Execute the query
            $result = $statement->execute();

            // Close the database connection
            $db = null;

            return $result;
        } catch (PDOException $e) {
            // Handle database errors
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }
}


class localisation
{
    private $id_localisation;
    private $id_location;
    private $ville;
    private $adresse;

    function __construct($id_localisation_var, $id_location_var, $ville_var, $adresse_var)
    {
        $this->id_localisation = $id_localisation_var;
        $this->id_location = $id_location_var;
        $this->ville = $ville_var;
        $this->adresse = $adresse_var;
    }
    public function getIdlocalisation()
    {
        return $this->id_localisation;
    }
    public function getIdlocation()
    {
        return $this->id_location;
    }
    public function setIdlocation($new_id_location)
    {
        $this->id_location = $new_id_location;
        return $this;
    }
    public function getville()
    {
        return $this->ville;
    }
    public function setville($new_ville)
    {
        $this->ville = $new_ville;
        return $this;
    }
    public function getadresse()
    {
        return $this->adresse;
    }
    public function setadresse($new_adresse)
    {
        $this->adresse = $new_adresse;
        return $this;
    }
}

?>