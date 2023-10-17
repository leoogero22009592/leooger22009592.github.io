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

    public function inscription($pseudo,$email,$mdp1,$mdp2)
    {
        session_start(); // a suprimer 

        if (isset($_POST['boutonLog'])) {
            $champsRequis = ['pseudo', 'email', 'mdp1', 'mdp2'];
        }
        $champsManquants = array_filter($champsRequis, function ($champ) {
            return empty($_POST[$champ]);
        });

        if (!empty($champsManquants)) {
            $_SESSION['error'] = "Veuillez remplir tous les champs.";
        } 
        else {
            try {
                if ($mdp1 != $mdp2) {
                    throw new Exception("Les mots de passe ne sont pas identiques.");
                }
            } catch (Exception $e) {
                $_SESSION['error'] = "Une erreur s'est produite : " . $e->getMessage();
                exit();
            }

            $mdp1 = password_hash($mdp1, PASSWORD_DEFAULT);

            $table = "utilisateurs";
            $parametres = [
                "pseudonyme" => $pseudo,
                "mot_de_passe" => $mdp1,
                "email" => $email,
                "date_inscription" => date("Y-m-d H:i:s")
            ];

            $this->pdo->insert($table, $parametres);

            $_SESSION['success'] = "Inscription réussie.";
            exit();
        }
    }
} 