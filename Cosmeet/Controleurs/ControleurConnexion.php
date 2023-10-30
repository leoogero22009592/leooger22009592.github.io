<?php
use FTP\Connection;
require_once 'Modele/ConnexionModels.php';

class ControleurConnexion {
    public function defautAction() {
        Vue::montrer("Connexion");
    }

    public function verifierUtilisateurAction(array $urlParameters, array $A_postParams = null) {
        $pseudo = $A_postParams['pseudo'] ?? '';
        $mdp1 = $A_postParams['mdp1'] ?? '';

        $O_connexion = new ConnexionModels();

        if ($O_connexion -> champsRequis($pseudo,$mdp1)) {
            if ($O_connexion->pseudonymeExiste($pseudo)){
                if ($O_connexion->verifierUtilisateur($pseudo,$mdp1)) {
                    $_SESSION['utilisateur'] = array(
                        'pseudo' => $pseudo,
                        'email' =>"truc@gmail.com",
                        'mdp1' => $mdp1
                    );
                    Vue::montrer('Accueil/vue');
                }
                else{
                    Vue::montrer("Connexion", array('erreur'=>'mot de passe mauvais'));
                }
            }
            else{
                Vue::montrer("Connexion", array('erreur' => 'pseudonyme existe pas'));
            }
        } 
        else {
            Vue::montrer("Connexion", array('erreur' => 'Tous les champs sont requis'));
        }
    }
}
?>
