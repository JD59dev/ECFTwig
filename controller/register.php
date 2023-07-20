<?php

$userDao = new UserDAO();
$user=null;
$message="";
if ($_SERVER["REQUEST_METHOD"] == "POST" and !empty($_POST['newEmail']) and !empty($_POST['newPassword'])) {

    $user = new User(null, $_POST["newEmail"], $_POST["newPassword"]);

$validation = $userDao->add($user);


if ($validation) {
    $message =  "Votre compte ".$user->getEmail(). " a bien été créé.";
} else {
    $message = "Erreur : veuillez recommencer.";
}
}

echo $twig->render('register.html.twig', [
    'message' => $message,
    'user' => $user
]);
?>