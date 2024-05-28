<?php
require_once('config.php');

class UserC
{

    function adduser($user)
    {
        $sql = "INSERT INTO user (cin_user, nom_user, email_user, mdp_user, tel_user, sexe_user, role_user) 
        VALUES (:cin, :nom, :email, :mdp, :tel, :sexe, :role)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'cin' => $user->getcin(),
                'nom' => $user->getnom(),
                'email' => $user->getemail(),
                'mdp' => $user->getmdp(),
                'tel' => $user->gettel(),
                'sexe' => $user->getsexe(),
                'role' => $user->getrole(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    public function listeuser()
    {
        $sql = "SELECT * FROM user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteuser($cin)
    {
        $sql = "DELETE FROM user WHERE cin_user = :cin";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':cin', $cin);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function showuser($cin)
    {
        $sql = "SELECT * FROM user WHERE cin_user = :cin";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':cin', $cin);
            $query->execute();
            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            // Log or handle the exception
            throw new Exception('Error showing user: ' . $e->getMessage());
        }
    }

    function updateuser($user, $cin)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET
            nom_user = :nom_user,
            email_user = :email_user,
            mdp_user=:mdp_user,
            tel_user=:tel_user,
            sexe_user=:sexe_user,
            role_user=:role_user
            WHERE cin_user=:cin_user'
            );
            $query->execute([
                'cin_user' => $cin,
                'nom_user' => $user->getnom(),
                'email_user' => $user->getemail(),
                'mdp_user' => $user->getmdp(),
                'tel_user' => $user->gettel(),
                'sexe_user' => $user->getsexe(),
                'role_user' => $user->getrole(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage(); // Handle the exception appropriately for your application
        }
    }
}


?>