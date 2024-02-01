<?php
include("../partials/header.php");
include("../config/pdo.php");



if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (!empty(!empty($_POST["email"]) && !empty($_POST["password"]))) {


        $email = $_POST['email'];
        $password = $_POST['password'];
        $infoAbout = $db->prepare('SELECT email , password FROM users ');
        $user = $infoAbout->fetch(PDO::FETCH_ASSOC);
        foreach ($user as $key => $value) {




        }


        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            if ($password == $infoAbout) {



                if ($result) {

                    header("location:signup-succes.php");

                }


            } else {

                $error = "Les mots de passe sont differents";

            }
            ;

        } else {

            $error = "L'email ne correspond pas";

        }


    } else {
        $error = "Veullez remplir tout les champs vides!";
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