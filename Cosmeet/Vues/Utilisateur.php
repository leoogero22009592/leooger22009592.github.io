<?php
if (isset($A_vue['reussite'])){
    $condition = $A_vue['reussite'];
} elseif (isset($A_vue['erreur'])){
    $condition = $A_vue['erreur'];
} else{
    $condition ="";
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div class="container">
    <p><?php echo $condition ?></p>
    <div class="user-info">
        <p>Nom d'utilisateur : <?= $_SESSION['utilisateur']['pseudo'] ?></p>
        <p>Adresse email : <?= $_SESSION['utilisateur']['email'] ?></p>
    </div>
    <div class="actions">
        <a href="./index.php?url=Utilisateur/modifierPage" class="btn">Modifier les informations</a>
        <a href="./index.php?url=Utilisateur/deco" class="btn">Déconnexion</a>
    </div>
</div>
</body>
</html>
<style>
    @import url("/Cosmeet/CSS/style.css");
</style>

