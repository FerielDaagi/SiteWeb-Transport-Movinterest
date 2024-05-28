<?php

require_once('C:/xampp/htdocs/test/ab2/config.php');

class TrotinettesC
{
    // afficher le dernier id ajouté à la table
    function find_id_trotinette()
    {
        $req = "SELECT id_location
        FROM trotinettes 
        ORDER BY id_location DESC 
        LIMIT 1"; // afficher 1 ligne

        $db = config::getConnexion();
        try {
            $list = $db->query($req);
            $lastId = $list->fetch(PDO::FETCH_ASSOC);
            return $lastId['id_location'];
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    //  << ==============================  debut jointure ================================== >>
    public function lister_localisation()
    { // afficher la table localisation
        $sql = "SELECT * FROM localisation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    // afficher la table trotinette ou l'id_location se trouve dans la table localisation ET le champ ville dans la table localisation = $ville
    public function jointure($ville)
    {
        $sql = "SELECT * FROM trotinettes JOIN localisation ON trotinettes.id_location = localisation.id_location 
        where localisation.ville LIKE :ville";

        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':ville', '%' . $ville . '%');
            $req->execute();
            $list = $req->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    //  << ==============================  fin jointure ================================== >>





    // <===================================  start filter ========================================>
    // filtre marque ascendant
    public function filter_Marque_ASC()
    {
        $sql = "SELECT * FROM trotinettes ORDER BY marque ASC";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    // filtre marque descandant
    public function filter_Marque_DESC()
    {
        $sql = "SELECT * FROM trotinettes ORDER BY marque DESC";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    // filtre modele ascendant
    public function filter_Modele_ASC()
    {
        $sql = "SELECT * FROM trotinettes ORDER BY modele ASC";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    // filtre modele descendant

    public function filter_Modele_DESC()
    {
        $sql = "SELECT * FROM trotinettes ORDER BY modele DESC";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    // filtre duree ascendant
    public function filter_Duree_ASC()
    {
        $sql = "SELECT * FROM trotinettes ORDER BY duree ASC";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    // filtre duree descendant
    public function filter_Duree_DESC()
    {
        $sql = "SELECT * FROM trotinettes ORDER BY duree DESC";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    // filtre numero de serie ascendant
    public function filter_num_serie_ASC()
    {
        $sql = "SELECT * FROM trotinettes ORDER BY num_serie ASC";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    // filtre numero de serie descendant
    public function filter_num_serie_DESC()
    {
        $sql = "SELECT * FROM trotinettes ORDER BY num_serie DESC";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    // filtre afficher la table trotinette où la date = $date
    function filter_date($date)
    {
        $sql = "SELECT * FROM trotinettes WHERE date = :datee";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':datee', $date);

            $query->execute();
            $events = $query->fetchAll();
            return $events;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    // search afficher la table trotinette où (marque = $recherche) ou (modele = $recherche) ou (num_serie = recherche)
    function search($recherche)
    {
        $sql = "SELECT * FROM trotinettes
        WHERE marque LIKE :recherche
        OR modele LIKE :recherchee
        OR num_serie LIKE :rechercheee";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':recherche', '%' . $recherche . '%');
            $query->bindValue(':recherchee', '%' . $recherche . '%');
            $query->bindValue(':rechercheee', '%' . $recherche . '%');
            $query->execute();
            $events = $query->fetchAll();
            return $events;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    // <===================================  end filter ========================================>

    public function listTrotinettes()
    {
        $sql = "SELECT * FROM trotinettes";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }



    function deleteTrotinettes($id)
    {
        $sql = "DELETE FROM `trotinettes` WHERE id_location = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addTrotinettes(Trotinettes $trotinettes)
    {
        $sql = "INSERT INTO `trotinettes`  
        VALUES (
            NULL, 
            :marque,
            :modele,
            :num_serie,
            :duree,
            :date,
            :heure
        )";
        $db = config::getConnexion();
        try {

            $query = $db->prepare($sql);

            $query->execute([
                'marque' => $trotinettes->getMarque(),
                'modele' => $trotinettes->getModele(),
                'num_serie' => $trotinettes->getNum_serie(),
                'duree' => $trotinettes->getduree(),
                'date' => $trotinettes->getDate(),
                'heure' => $trotinettes->getHeure(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showTrotinettes($id)
    {
        $sql = "SELECT * FROM `trotinettes` WHERE id_location = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $trotinettes = $query->fetch();
            return $trotinettes;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateTrotinettes($trotinettes, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE `trotinettes` SET 
                    marque = :marque, 
                    modele = :modele, 
                    num_serie = :num_serie, 
                    duree = :duree, 
                    date = :date, 
                    heure = :heure
                WHERE id_location = :id_location'
            );

            $query->execute([
                'id_location' => $id,
                'marque' => $trotinettes->getMarque(),
                'modele' => $trotinettes->getModele(),
                'num_serie' => $trotinettes->getNum_serie(),
                'duree' => $trotinettes->getduree(),
                'date' => $trotinettes->getDate(),
                'heure' => $trotinettes->getHeure(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}


class localisationC
{
    // afficher les localisations où trotinette["id_location"]= localisation["id_location"]
    function jointure($id)
    {
        $sql = "SELECT * FROM localisation WHERE id_location = :id";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(":id", $id);
            $req->execute();
            $list = $req->fetch();
            return $list;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    // ajouter localisation
    function ajouter_localisation($local)
    {
        $sql = "INSERT INTO localisation
        VALUES (null, :id_location, :ville,:adresse)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_location' => $local->getIdlocation(),
                'ville' => $local->getville(),
                'adresse' => $local->getadresse()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    // update localisation
    function updatelocalisation($id_localisation, $id_location, $local)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE links SET
                    id_location  = :id_location,
                    ville  = :ville,
                    adresse  = :adresse
                WHERE id_localisation = :id_localisation'
            );
            $query->execute([
                'id_location' => $id_location,
                'ville' => $local->getville(),
                'adresse' => $local->getadresse(),
                'id_localisation' => $id_localisation,
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            // Output the error message
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>