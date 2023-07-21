<?php

$userDao = new UserDAO();
$message = "";
$user;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userLogin']) && isset($_POST['userPassword'])) {
    $email = $_POST['userLogin'];
    $password = $_POST['userPassword'];


    $user = $userDao->getOne($email);
    $_SESSION['email'] = $user->getEmail();
    $_SESSION['id'] = $user->getIdUser();
    $_SESSION['userName'] = $user->getUserName();
    if ($user) {

        if (password_verify($password, $user->getPassword())) {
        } else {

            $message = "Mot de passe incorrect. Veuillez réessayer.";
        }
    } else {

        $message = "E-mail non trouvé, veuillez réessayer.";
    }
    $_SESSION['email'] = $user->getEmail();


    header("Location: carousel");
    exit();
}

echo $twig->render('login.html.twig', [
    'message' => $message,
]);
