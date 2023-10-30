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

    public function champsRequis($pseudo, $email, $mdp1)
    {
        return !empty($pseudo) && !empty($email) && !empty($mdp1);
    }

    public function verifierUtilisateur($pseudo, $email, $mdp1)
    {
        $query = "SELECT * FROM utilisateurs WHERE pseudonyme = :pseudo AND email = :email";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $utilisateur = $stmt->fetch();
    
        if ($utilisateur) {
            return password_verify($mdp1, $utilisateur['mot_de_passe']);
        }
    
        return false;
    }
}
?>