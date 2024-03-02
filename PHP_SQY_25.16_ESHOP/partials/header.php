<?php
@session_start();



?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Eshop PHP</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="container">

        <span class="material-symbols-outlined burger-menu">
            menu
        </span>
        <nav>
            <ul class="dropDown">

                <li><a href="index.view.php">Accueil</a></li>
                <li><a href="contact.views.php">Contact</a></li>

                <?php if (isset($_SESSION['user']['logged'])): ?>


                    <li><a href="products.php">Produits</a></li>
                    <li><a href="logout.php">Logout</a></li>


                <?php else: ?>

                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.view.php">SignUp</a></li>


                <?php endif ?>
            </ul>
        </nav>