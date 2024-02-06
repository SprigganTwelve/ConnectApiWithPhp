<?php
include "../partials/header.php";
include "../config/cUrl.php";

?>


<div class="wrapper">
    <h1>Page de produit</h1>
</div>



<ul class="products-list">
    <?php

    foreach ($products as $product):
        ?>

        <li>

            <a href="product.php?id=<?= $product['id'] ?>"> <img src="<?= $product['image'] ?>" alt="">
            </a>
            <h2>
                <?= $product['title'] ?>
            </h2>
            <h3>
                <?= substr($product['description'], 50) ?>
            </h3>
            <h2>
                <?= $product['price'] ?>
            </h2>

            <button>

                <a href="Panier.view.php?product=<?= $product['id'] ?>"> Ajouter au panier</a>

            </button>

        </li>
    <?php endforeach ?>
</ul>





<?php
include "../partials/footer.php";
?>