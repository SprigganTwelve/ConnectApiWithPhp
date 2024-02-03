<?php

/*ob_start()....  ob_end_flush(); */
session_start();
include("../partials/header.php");
include("../utils/functions.php");
include("../config/pdo.php");




if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (!empty(!empty($_POST["email"]) && !empty($_POST["password"]))) {


        $email = $_POST['email'];
        $password = $_POST['password'];


        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            if (checkExist("email", $email, $db)) {

                $stmt = $db->prepare('SELECT * FROM users WHERE email = ? ');
                $stmt->execute([$email]);
                $result = $stmt->fetch();
                $hash = $result['password'];
                if (password_verify($password, $hash)) {
                    $_SESSION['users'] = $result;
                    $_SESSION['user']['logged'] = true;
                    header('location:profile.view.php');
                } else if (!password_verify($password, $hash)) {
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
    <form action="" method="post" class="signup">

        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Mot de passe">

        <input type="submit" name="submit" value="Envoyer">
    </form>
    <div>
        <p class="error">
            <?= @$error; ?>
        </p>

    </div>
</div>

<?php
include("../partials/footer.php");
?>