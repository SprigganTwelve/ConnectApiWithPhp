<?php

ob_start();

include("../partials/header.php");
include("../config/pdo.php");




if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (!empty(!empty($_POST["email"]) && !empty($_POST["password"]))) {


        $email = $_POST['email'];
        $password = $_POST['password'];


        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $stmt = $db->prepare('SELECT * password FROM users WHERE email = ? ');
            $stmt->execute($email);
            $result = $stmt->fetch();

            if ($result) {

                $hash = $result['password'];
                if (password_verify($password, $hash)) {
                    session_start();
                    $_SESSION['users'] = $result;
                    $_SESSION['user']['logged'] = true;
                    header('location:profile.view.php');
                    ob_end_flush();

                }
                ;

            } else {

                $error = "L'email ne correspond pas";

            }


        } else {
            $error = "Veullez remplir tout les champs vides!";
        }
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
</div>

<?php
include("../partials/footer.php");
?>