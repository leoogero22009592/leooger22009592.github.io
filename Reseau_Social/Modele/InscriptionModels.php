<?php
require_once 'Noyau/Connection.php';
require_once 'Vues/Inscription.php';
class InscriptionModels
{
    private $pdo;

    public function __construct()     {
        $this->pdo = Connection::getInstance();     
    }

    public function afficher($pseudo,$email,$mdp1,$mdp2){
        return $pseudo && $email && $mdp1 && $mdp2;
    }

    public function champsRequis($pseudo, $email, $mdp1, $mdp2)
    {
        return !empty($pseudo) && !empty($email) && !empty($mdp1) && !empty($mdp2);
    }

    public function mdp1egalemdp2($mdp1, $mdp2)
    {
        return $mdp1 == $mdp2; 
    }

    public function inscription($pseudo,$email,$mdp1,$mdp2)
    {
        session_start(); // a suprimer 

            $mdp1 = password_hash($mdp1, PASSWORD_DEFAULT);

            $table = "utilisateurs";
            $parametres = [
                "pseudonyme" => $pseudo,
                "mot_de_passe" => $mdp1,
                "email" => $email,
                "date_inscription" => date("Y-m-d H:i:s")
            ];
            $this->pdo->insert($table, $parametres);
    }
}
?>