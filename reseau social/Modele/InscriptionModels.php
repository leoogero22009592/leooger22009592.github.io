<?php 

require "inscription.php";
$connexion = mysqli_connect("localhost","root","","cosmeet");

if (!$connexion)
{
    die("Pas connecté");
}

ob_start();
session_start();

class InscriptionModels {
    public function inscription($connexion){
        if (isset($_POST['valider'])) {
            $champsRequis = ['nom', 'prenom', 'email', 'mdp1', 'mdp2'];

            $champsManquants = array_filter($champsRequis, function($champ) {
                    return empty($_POST[$champ]);
                });

            if (!empty($champsManquants)) {
                $messageErreur = "Veuillez remplir tous les champs.";
            } else {
               $nom = $_POST['nom'];
               $prenom = $_POST['prenom'];
               $email = $_POST['email'];
               $mdp1 = $_POST['mdp1'];

               $stmt = $connexion->prepare("INSERT INTO utilisateurs (pseudonyme, mot_de_passe, email, date_inscription) VALUES (?, ?, ?, NOW())");
               $stmt->bind_param("sss", $nom, $mdp1, $email);
               
               $stmt->close();
            }
        }
   }
}

?>
