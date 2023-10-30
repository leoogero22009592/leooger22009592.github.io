<?php

require_once 'Modele/UtilisateurModels.php';
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

    public function modifierAction(array $urlParameters, array $A_postParams = null) {
        $pseudo = $A_postParams['pseudo'];
        $email = $A_postParams['email'];
        $mdp = $A_postParams['mdp'];

            $O_Utilisateur = new Utilisateur();
                if ($O_Utilisateur->pseudoUtilise($pseudo) && $pseudo != $_SESSION['utilisateur']['pseudo']) {
                    Vue::montrer("UtilisateurModifier", array('erreur' => 'Pseudonyme déjà utilisé'));
                }
                elseif ($email != $_SESSION['utilisateur']['email'] && $O_Utilisateur->emailUtiliser($email)) {
                    Vue::montrer("UtilisateurModifier", array('erreur' => 'Email déjà utilisé'));
                }   
                elseif ($mdp != $_SESSION['utilisateur']['mdp1']) {
                    Vue::montrer("UtilisateurModifier", array('erreur' => 'Mot de passe incorect'));
                }
                else{
                    $_SESSION['utilisateur'] = array(
                        'pseudo' => $pseudo,
                        'email'=> $email,
                    );
                    $O_Utilisateur -> modifier($pseudo,$email);
                    Vue::montrer('Utilisateur', array('reussite' => 'Modification prise en compte'));
                    
                }   
        }
    }
