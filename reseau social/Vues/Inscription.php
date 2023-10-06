

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="php/css/inscription.css">
        <title>Inscription</title>
    </head>
    <body>


    <div id="page">
        <div id="formulaire">
            <form method="post">
                <h2>Inscrivez-vous</h2>
                <div id="part1">
                    <p>Nom:</p>
                    <input type="text" name="nom" placeholder="veuillez entrez votre nom">
                    <p>Votre prénom:</p>
                        <input type="text" placeholder="Veuillez entrer votre prenom" name="prenom">
                        <p>Votre Email:</p>
                        <input type="mail" placeholder="Veuillez entrer votre email" name="email">

                        <p>Date de naissance</p>
                        <input type="date" placeholder="Veuillez entrer votre date de naissance" name="datenaiss">
                        <p>Sexe</p>

                        <select name="sexe" id="">
                                <option value="homme">homme</option>
                                <option value="femme">femme</option>
                                <option value="Entreprise">Entreprise</option>

                        </select>
        </div>
        <div id="part2">
            <br> <br>
                    <p>Statue</p>
                        <select name="statue" id="">
                            <option value="etudiant">Etudiant</option>
                            <option value="professeur">Professeur</option>
                            <option value="eleve">eleve</option>
                            <option value="Simple visiteur">simple visiteur</option>
                        </select>

                        <p>Votre Classe</p>
                        <select name="classe" id="">
                            <option value="mage">Mage</option>
                            <option value="guerrier">Guerrier</option>
                            <option value="assassin">Assassin</option>
                            <option value="Urbain"></option>
                        </select>
                         <p>Mot de passe</p>
                         <input type="password" name="mdp1" placeholder="veuillez entrez votre mot de passe" name="mdp1">
                         <p>Confirmation de votre mot de passe</p>
                         <input type="password" name="mdp2" placeholder="confirmez votre mot de passe" name="mdp2">

                           <br><br>

                           <br><br>

                         <input type="submit" value="valider" name="valider">
                         <br><br>
                         <input type="reset" value="tout éffacer">
                         <br><br>
                        <!--<a href="Retour"><button>retour</button></a> -->
                        </div>
            </form>
        </div>
    </div>

    </body>
</html>