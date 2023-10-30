<?php
use FTP\Connection;
require_once 'Modele/ConnexionModels.php';

class ControleurConnexion {
    public function defautAction() {
        Vue::montrer("Connexion");
    }
    public function traiterFormulaireAction(array $urlParameters, array $A_postParams = null) {
        $pseudo = $A_postParams['pseudo'];
        $email = $A_postParams['email'];
        $mdp1 = $A_postParams['mdp1'];
        $mdp2 = $A_postParams['mdp2'];

        $O_inscription = new InscriptionModels();
        if ($O_inscription -> champsRequis($pseudo,$email,$mdp1,$mdp2)){
            if($O_inscription -> mdp1egalemdp2($mdp1,$mdp2)){
                $O_inscription -> inscription($pseudo,$email,$mdp1);
                Vue::montrer("Connexion", array('reussite'=>'Connexion reussite'));
            }
            else{
                Vue::montrer("Connexion", array('erreur'=>'Mots de passe pas identique'));
            }
        }
        else {
            Vue::montrer("Connexion", array('erreur'=>'Champs requis tout remplire'));
        }
        //$O_inscription -> afficher($pseudo,$email,$mdp1,$mdp2);
    }
}
?>
