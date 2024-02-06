<?php
@session_start();

include("../utils/functions.php");

$_SERVER["REQUEST_URI"] === '/index.php' ? $path = 'views/' : $path = '';


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eshop PHP</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="container">
        <nav>
            <ul>

                <li><a href="<?= $path ?>index.php">Accueil</a></li>
                <li><a href="<?= $path ?>contact.php">Contact</a></li>

                <?php if (isset($_SESSION['user']['logged'])): ?>


                    <li><a href="<?= $path ?>products.php">Produits</a></li>
                    <li><a href="#">Logout</a></li>


                <?php else: ?>

                    <li><a href="<?= $path ?>login.php">Login</a></li>
                    <li><a href="<?= $path ?>signup.view.php">SignUp</a></li>


                <?php endif ?>
            </ul>
        </nav>