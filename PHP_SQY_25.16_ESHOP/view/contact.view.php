<?php

include("../partials/header.php");



?>
<div class="wrapper">
    <form action="" method="post">
        <h1>Page de Contact</h1>
        <input type="email" name="email" placeholder="votre email">
        <input type="text" name="object" placeholder="Le sujet de votre mail">
        <textarea name="message" placeholder="votre message"></textarea>
        <input type="submit" name="submit">
    </form>
</div>

<?php
if (isset($error)): ?>
    <div class="error">
        <?= $error ?>
    </div>
    <?php
endif ?>






<?php
include("../partials/footer.php");

?>