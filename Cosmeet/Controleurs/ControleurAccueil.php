<?php
final class ControleurAccueil
{
    public function defautAction() {
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'Inscription':
                    $this->inscription();
                    break;
                case 'Connexion':
                    $this->connexion();
                    break;
                default:
                    $this->accueil();
                    break;
            }
        } else {
            $this->accueil();
        }
    }

    public function accueil() {
        if (isset($_SESSION['utilisateur'])) {
            //$pseudo = $_SESSION['utilisateur']['pseudo'];
            Vue::montrer('Accueil/vue');
        } else {
            Vue::montrer('Inscription');
        }
    }

    public function inscription() {
        Vue::montrer('Inscription/vue');
    }

    public function connexion() {
        Vue::montrer('Connexion/vue');
    }
}