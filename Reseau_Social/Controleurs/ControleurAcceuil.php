<?php
final class ControleurAccueil
{
    public function defautAction() {
        Vue::montrer("Accueil/vue");
    }
}