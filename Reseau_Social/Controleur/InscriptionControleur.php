<?php
class InscriptionControleur implements InscriptionModels
{
    public function defautAction()
    {
        // Display the registration form
        include('Vues/Inscription.php');
    }

    public function traiterFormulaireAction($bd)
    {
        // Process the registration form submission
        if (isset($_POST['boutonLog'])) {
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $mdp1 = $_POST['mdp1'];
            $mdp2 = $_POST['mdp2'];

            $O_Inscription = new InscriptionModels();
            
            // Assuming the method 'inscription' in InscriptionModels processes the registration and returns a success/failure message
            $message = $O_Inscription->inscription($bd);

            // Display the appropriate feedback to the user based on the registration outcome
            if ($message == "Inscription réussie.") {
                // Successful registration
                echo $message;
                // Redirect to the login page or show a success message
                // header('Location: login.php');
            } else {
                // Failed registration
                echo $message;
                // Show the registration form again with the error message
                include('Vues/Inscription.php');
            }
        } else {
            // Show the registration form if the form wasn't submitted
            $this->defautAction();
        }
    }
}


/*class InscriptionControleur {

    public function defautAction()
    {
        $O_inscription = new Inscription();
        Vue::montrer('Vues/Inscription');
    }

    public function traiterFormulaire() {
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $mdp1 = $_POST['mdp1'];
        $mdp2 = $_POST['mdp2'];

        $O_inscription = new Inscription();
        
        $O_inscription->Inscription();
    }
}*/
?>
