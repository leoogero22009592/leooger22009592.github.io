<?php
use FTP\Connection;
require_once 'Modele/ConnexionModels.php';

class ControleurConnexion {
    public function defautAction() {
        Vue::montrer("Connexion");
    }

    public function verifierUtilisateurAction(array $urlParameters, array $A_postParams = null) {
        $pseudo = $A_postParams['pseudo'] ?? '';
        $email = $A_postParams['email'] ?? '';
        $mdp1 = $A_postParams['mdp1'] ?? '';

        $O_connexion = new ConnexionModels();
        
        if ($O_connexion -> champsRequis($pseudo,$email,$mdp1)) {
                if ($O_connexion->verifierUtilisateur($pseudo,$mdp1)) {
                    Vue::montrer("Connexion", array('reussite'=>'Connexion reussite'));
                }
        } 
        else {
            Vue::montrer("Connexion", array('erreur' => 'Tous les champs sont requis'));
        }
    }
}
?>
