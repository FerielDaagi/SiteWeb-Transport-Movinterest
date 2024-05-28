<?php

require_once('C:\xampp\htdocs\test\reservation_taxi\controller\config.php');

class reservationtrottinetteC
{
    public function addreservationtrottinette($reservationtrottinette)
    {
        $sql = "INSERT INTO reservationtrottinette (CIN, heure, duree, adresse, numero) 
        VALUES (:CIN, :heure,  :duree, :adresse, :numero)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'CIN' => $reservationtrottinette->getCIN(),
                'heure' => $reservationtrottinette->getheure(),
                'duree' => $reservationtrottinette->getduree(),
                'adresse' => $reservationtrottinette->getadresse(),
                'numero' => $reservationtrottinette->getnumero()


            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function listereservationtrottinette()
    {
        $sql = "SELECT * FROM reservationtrottinette";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deletereservationtrottinette($CIN)
    {
        $sql = "DELETE FROM reservationtrottinette WHERE CIN = :CIN";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':CIN', $CIN);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function showreservationtrottinette($CIN)
    {
        $sql = "SELECT * FROM reservationtrottinette WHERE CIN = :CIN";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':CIN', $CIN);
            $query->execute();
            $ID = $query->fetch();
            return $ID;
        } catch (Exception $e) {
            // Log or handle the exception
            throw new Exception('Error showing reservationtrottinette: ' . $e->getMessage());
        }


    }
    function updatereservationtrottinette($reservationtrottinette, $CIN)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reservationtrottinette SET
            heure = :heure,
            adresse=:adresse,
            duree=:duree,
            numero=:numero
            WHERE CIN=:CIN'
            );
            $query->execute([
                'CIN' => $CIN,
                'heure' => $reservationtrottinette->getheure(),
                'adresse' => $reservationtrottinette->getadresse(),
                'duree' => $reservationtrottinette->getduree(),
                'numero' => $reservationtrottinette->getnumero(),

            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage(); // Handle the exception appropriately for your application
        }
    }

}