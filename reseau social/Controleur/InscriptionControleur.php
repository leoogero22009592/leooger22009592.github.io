<?php
class InscriptionControleur {
    public function afficherFormulaire() {
        include 'views/inscription.php';
    }

    public function traiterFormulaire() {
        if (isset($_POST['valider'])) {
            $champsRequis = ['nom', 'prenom', 'sexe', 'email', 'datenaiss', 'statue', 'classe', 'mdp1', 'mdp2'];

            $champsManquants = array_filter($champsRequis, function($champ) {
                return empty($_POST[$champ]);
            });

            if (!empty($champsManquants)) {
                $messageErreur = "Veuillez remplir tous les champs.";
                include 'views/inscription.php';
            } else {
                $messageSucces = "Inscription réussie!";
                include 'views/inscription.php';
            }
            $model = new InscriptionModels();
            $model->inscription();
        }
    }
}
?>
