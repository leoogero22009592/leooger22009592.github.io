<?php
?>
<!DOCTYPE html>
<html lang="fr">

<body>
    <div id="formulaire">
        <form method="post" action="../reseau social/index.php?url=inscription/creerUtilisateur" enctype="multipart/form-data">
            <div id="Onglets">
                <h3><a id="connexion" href="../reseau social/index.php?url=Connexion">SE CONNECTER</a> <a id="inscription">S'INSCRIRE</a></h3>
            </div>
            <input type="text" name="pseudo" placeholder="PSEUDO">
            <input type="email" name="email" placeholder="E-MAIL">
            <input type="password" name="mdp1" placeholder="MOT DE PASSE">
            <input type="password" name="mdp2" placeholder="CONFIRMER LE MOT DE PASSE">

            <button class="boutonLog" type="submit">Validé</button>

        </form>
    </div>
</body>

</html>
<style>
    @import url("/resau social/CSS/inscription.css");
</style>