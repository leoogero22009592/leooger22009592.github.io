<?php

use FTP\Connection;

require_once 'Modele/InscriptionModels.php';

class InscriptionControleur {
    public function defautAction() {
        Vue::montrer('Vues/Inscription');
    }
    public function traiterFormulaireAction(array $urlParameters, array $A_postParams = null) {
        $pseudo = $A_postParams['pseudo'];
        $email = $A_postParams['email'];
        $mdp1 = $A_postParams['mdp1'];
        $mdp2 = $A_postParams['mdp2'];

        $O_inscription = new InscriptionModels();
        //$O_inscription -> inscription($pseudo,$email,$mdp1,$mdp2);
        //$O_inscription -> afficher($pseudo,$email,$mdp1,$mdp2);
        Vue::montrer('Vues/Inscription', array('reussite'=>'ca marche'));
    }
}
?>
