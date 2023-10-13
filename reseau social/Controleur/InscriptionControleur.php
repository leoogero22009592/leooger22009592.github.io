<?php
class InscriptionControleur{

    public function defautAction()
    {
        $O_inscription = new inscription();
        Vue::montrer('Vues/inscription');
    }

    public function traiterFormulaire() {
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $mdp1 = $_POST['mdp1'];
        $mdp2 = $_POST['mdp2'];

        $O_inscription = new inscription();
        
        $0_inscription->inscription($bd)
    }
}
?>
