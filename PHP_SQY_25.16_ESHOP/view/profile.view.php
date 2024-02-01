<?php
session_start();
include("../partials/header.php");
include("../config/pdo.php");

?>

<div class="wrapper">
    <h1>profile de
        <?= $_SESSION['user']['name'] ?>
    </h1>
    <h2>
        <?= $_SESSION['user']['email'] ?>
    </h2>
    <img class="profile-avatar" src="../uploadAvatar/gojo-extension-du-territoire.jpg" alt="Avatar">
</div>

<?php
include("../partials/footer.php");
?>