<?php
$userDao = new UserDAO();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userLogin']) && isset($_POST['userPassword'])) {
    $email = $_POST['userLogin'];
    $password = $_POST['userPassword'];

    $user = $userDao->getOne($email);

    if ($user && password_verify($password, $user->getPassword())) {
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['id'] = $user->getIdUser();
        $_SESSION['userName'] = $user->getUserName();
        header("Location: carousel");
    } else {
        $message = "Mot de passe ou email incorrect. Veuillez réessayer.";
    }
}

echo $twig->render('login.html.twig', [
    'message' => $message,
]);
