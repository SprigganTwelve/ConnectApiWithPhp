<?php

// ob_start();
// session_start();
include("../partials/header.php");
include("../utils/functions.php");
include("../config/pdo.php");




if (isset($_POST)/* or $_SERVER['REQUEST_METHOD'] === "POST"*/) {
    if (!empty(!empty($_POST["email"]) && !empty($_POST["password"]))) {


        $email = $_POST['email'];
        $password = $_POST['password'];


        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            if (checkExist("email", $email, $db)) {

                $stmt = $db->prepare('SELECT * FROM users WHERE email = ? ');
                $stmt->execute([$email]);
                $result = $stmt->fetch();
                $hash = $result['password'];
                $password = md5($password);


                if ($password == $hash) {
                    $_SESSION['users'] = $result;
                    $_SESSION['user']['logged'] = true;
                    header('location:profile.view.php');
                    ob_end_flush();

                } else {

                    $error = 'mot de passe incorrect';
                }

            } else {

                $error = "Compte inexistant";

            }


        } else {

            $error = "Verifier la syntaxe de votre email";

        }

    } else {
        $error = "veullez remplir les champs vides";
    }
}
;
?>

<div class="wrapper">
    <h1>Login</h1>
    <form action="" method="post">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="submit" name="submit" value="Envoyer">
    </form>
    <?php if (isset($error)): ?>
        <p class="error">
            <?= $error ?>
        </p>
    <?php endif ?>
</div>

<?php
include("../partials/footer.php");



?>