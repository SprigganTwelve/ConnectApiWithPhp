<?php

session_start();
if (isset($_GET['delete'])) {
    unset($_SESSION['user']['cart'][$_GET['delete']]);
    header('location:Panier.view.php');
}
