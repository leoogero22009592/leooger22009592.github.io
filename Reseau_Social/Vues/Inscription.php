<?php
?>
<!DOCTYPE html>
<html lang="fr">

<body>
    <div id="formulaire">
        <form method="post" action="../index.php?url=InscriptionControleur/traiterFormulaire" enctype="multipart/form-data">
            
            <div id="Onglets">
                <h3><a id="connexion" href="../index.php?url=Connection">SE CONNECTER</a> <a id="inscription">S'INSCRIRE</a></h3>
            </div>
            <input type="text" name="pseudo" placeholder="PSEUDO">
            <input type="email" name="email" placeholder="E-MAIL">
            <input type="password" name="mdp1" placeholder="MOT DE PASSE">
            <input type="password" name="mdp2" placeholder="CONFIRMER LE MOT DE PASSE">

            <button class="boutonLog" type="submit">Valider</button>

        </form>
    </div>
</body>

</html>
<style>
    @import url("/Reseau_Social/CSS/inscription.css");
</style>