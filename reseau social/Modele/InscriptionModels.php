<?php
require_once 'Connection.php';
class InscriptionModels
{
    private $bd;
    public function __construct()
    {
        $this->bd = Connection::getInstance()->bd;
    }

    public function inscription($bd)
    {
        if (isset($_POST['boutonLog'])) {
            $champsRequis = ['pseudo', 'email', 'mdp1', 'mdp2'];

            $champsManquants = array_filter($champsRequis, function ($champ) {
                return empty($_POST[$champ]);
            });

            if (!empty($champsManquants)) {
                echo "Veuillez remplir tous les champs.";
            } else {
                $pseudo = $_POST['pseudo'];
                $email = $_POST['email'];
                $mdp1 = $_POST['mdp1'];
                $mdp2 = $_POST['mdp2'];

                if ($mdp1 != $mdp2) {
                    echo "Les mots de passe ne sont pas identiques.";
                } else {
                    $mdp1 = password_hash($mdp1, PASSWORD_DEFAULT);
                }

                $stmt = $bd->prepare("SELECT * FROM utilisateurs WHERE pseudonyme=?");
                $stmt->bind_param("s", $pseudo);
                $stmt->execute();

                $result = $stmt->get_result();
                $stmt->close();

                $stmt = $bd->prepare("SELECT * FROM utilisateurs WHERE email=?");
                $stmt->bind_param("s", $email);
                $stmt->execute();

                $result2 = $stmt->get_result();
                $stmt->close();

                if ($result->num_rows > 0) {
                    echo "Ce pseudonyme est déjà pris.";
                } elseif ($result2->num_rows > 0) {
                    echo "Cet email est déjà utilisé.";
                } else {
                    $stmt = $bd->prepare("INSERT INTO utilisateurs (pseudonyme, mot_de_passe, email, date_inscription) VALUES (?, ?, ?, NOW())");
                    $stmt->bind_param("sss", $pseudo, $mdp1, $email);
                    $stmt->execute();
                    $stmt->close();
                    echo "Inscription réussie.";
                }
            }
        }
    }
}
