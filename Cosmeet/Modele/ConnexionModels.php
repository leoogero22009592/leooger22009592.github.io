<?php
require_once 'Noyau/Connection.php';

class ConnexionModels
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
        return $mdp1 === $mdp2; 
    }

    public function inscription($pseudo,$email,$mdp1)
    {
        $mdp1 = password_hash($mdp1, PASSWORD_DEFAULT);
        $S_table = "utilisateurs";
        $A_parametres = [
            "pseudonyme" => "$pseudo",
            "email" => "$email",
            "mot_de_passe" => "$mdp1",
            "date_inscription" => date('y-m-d'),
            "date_derniere_connexion" => date('y-m-d')
        ];
        return $this->pdo->insert($S_table, $A_parametres);
    }
}
?>