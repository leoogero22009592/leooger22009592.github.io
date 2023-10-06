<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inscription</title>
</head>
<body>
    <?php
        if (isset($messageErreur)) {
            echo "<p>$messageErreur</p>";
        } elseif (isset($messageSucces)) {
            echo "<p>$messageSucces</p>";
        }

        include 'views/inscription_form.php';
    ?>
</body>
</html>
