<?php 
include "BD.php";
require "BD.php";
class InscriptionModels {
    public function inscription(){
        if (isset($_POST['valider'])) {
            $champsRequis = ['nom', 'prenom', 'email', 'mdp1', 'mdp2'];

            $champsManquants = array_filter($champsRequis, function($champ) {
                    return empty($_POST[$champ]);
                });

            if (!empty($champsManquants)) {
                $messageErreur = "Veuillez remplir tous les champs.";
            } else {
                $sql = "INSERT INTO utilisateurs (pseudonyme,mot_de_passe,email,date_inscription) VALUES ($nom,$prenom,$email,$mdp1,now())";
                $result = mysqli_query($connexion,$sql);
            }
        }
   }
}

?>