<?php

require_once 'Modele/InscriptionModels.php';

class InscriptionControleur {
    public function defautAction()
    {
        $O_inscription = new InscriptionModels();
        Vue::montrer('Vues/Inscription');
    }
    public function traiterFormulaire() {
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $mdp1 = $_POST['mdp1'];
        $mdp2 = $_POST['mdp2'];
        $O_inscription = new InscriptionModels();

        ob_start();
        $O_inscription->inscription();
        $message = ob_get_clean();

        Vue::montrer('Vues/Inscription', array('message' => $message));
    }
}
?>
