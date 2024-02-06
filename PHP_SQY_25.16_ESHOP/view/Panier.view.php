<?php
include "../partials/header.php";
include "../config/cUrl.php";
include("../utils/functions.php");

if (isset($_GET["product"])) {
    $id = $_GET["product"];
}

?>

<h1>Mon panier</h1>

<?php foreach ($products as $product):
    ?>

    <?php if (isset($id)):
        ?>
        <?php $_SESSION["user"]['cart'][$id] = $product;
        ?>
        <h2>Vous avez ajoutez
            <?= $_SESSION['user']['cart'][$id]['title'] ?> au panier
        </h2>


    <?php endif ?>

<?php endforeach ?>


<?php if (isset($_SESSION['user']['cart'])):
    ?>

    <?php foreach ($_SESSION['user']['cart'] as $item):
        ?>

        <h3>
            <?= $item['title'] ?>
        </h3>
        <p>prix :
            <?= $item['price'] ?>
        </p>
        <a class="delete-btn" href='delete-product.php?enable=<?= $item['id'] ?>'>Suprimer</a>

    <?php endforeach ?>


<?php endif ?>

<?php
include "../partials/footer.php";
?>