<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Afficher utilisateur</title>
</head>
<body>
    <?php
        include './menu.php';
        include './utils/connectBdd.php';
        include './utils/function.php';
    ?>
    <h3>Profil utilisateurs</h3>
    <?php
        showAllUser($bdd);
    ?>
</body>
</html>