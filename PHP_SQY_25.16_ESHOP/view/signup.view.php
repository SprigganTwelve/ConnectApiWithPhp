<?php
include("../partials/header.php");
include("../config/pdo.php");
include("../utils/functions.php");



if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (!empty($_POST["name"] && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["confirm"]))) {

        $name = htmlspecialchars($_POST["name"]);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST["confirm"];

        if ($password == $confirm) {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                if (checkExist('name', $name, $db)) {

                    $error = "Le nom exist déja";

                } else if (checkExist("email", $email, $db)) {

                    $error = "l'email exist déja";
                } else {
                    $hash = md5($password);


                    $sql = "INSERT INTO users(name,email,password) VALUES (?,?,?)";
                    $result = $db->prepare($sql);
                    $result->execute([$name, $email, $hash]);

                    if ($result) {

                        header("location:signup-succes.php");

                    } else {
                        $error = "Erreur lors l'ajout:" . $stmt->errorInfo();
                    }
                }





            } else {

                $error = "l'email n'est pas au bon format";

            }
            ;

        } else {
            $error = "Les mots de passe sont differents";

        }


    } else {
        $error = "Veullez remplir tout les champs!";
    }
}
;

?>
<div class="wrapper">
    <h1>signup</h1>
    <form action="" method="post" class="signup">
        <input type="text" name="name" placeholder="Nom">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="password" name="confirm" placeholder="Confirmer le mot de passe">
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