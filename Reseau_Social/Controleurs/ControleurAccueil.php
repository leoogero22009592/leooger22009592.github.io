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
        Vue::montrer('Accueil/vue');
    }

    public function inscription() {
        Vue::montrer('Inscription/vue');
    }

    public function connexion() {
        Vue::montrer('Connexion/vue');
    }
}