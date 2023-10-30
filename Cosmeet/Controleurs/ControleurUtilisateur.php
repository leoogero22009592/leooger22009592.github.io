<?php
class ControleurUtilisateur {
    public function defautAction(){
        if (isset($_SESSION['utilisateur'])) {
            $utilisateur = $_SESSION['utilisateur'];
            $pseudo = $utilisateur['pseudo'];
            Vue::montrer('Utilisateur');
        } else {
            Vue::montrer("Connexion", array('erreur'=>'Vous n\'êtes pas conecter a un compte' ));
        }
    }

    public function decoAction() {
        unset($_SESSION['utilisateur']);
        Vue::montrer('Connexion');

    }

    public function modifierPageAction(){
        Vue::montrer('UtilisateurModifier');
    }

}