<?php
$userDao = new UserDAO();
$user = null;
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User(null, $_POST["newUserName"], $_POST["newEmail"], $_POST["newPassword"], $_POST["rePassword"]);

    $userNameExistsError= $userDao->userNameExists($user->getUserName());
    $emptyInputError = $user->emptyInputRegister();
    $validUserNameError = $user->validUserName();
    $validEmailError = $user->validEmail();
    $validPasswordError = $user->validPassword($_POST["newPassword"]);
    $passwordMatchError = $user->passwordMatch();

    if ($emptyInputError !== true) {
        $message = $emptyInputError;
    }  elseif ($userDao->userNameExists($user->getUserName())) {
        $message = "Le nom d'utilisateur existe déjà.";
    }elseif ($validUserNameError !== true) {
        $message = $validUserNameError;
    } elseif ($validEmailError !== true) {
        $message = $validEmailError;
    } elseif ($userDao->emailExists($user->getEmail())) { // Here, use $user->getEmail()
        $message = "L'adresse email est déjà utilisée.";
    } elseif ($passwordMatchError !== true) {
        $message = $passwordMatchError;
    } elseif ($validPasswordError !== true) {
        $message = $validPasswordError;
    } else {
        // Register the user
        $validation = $userDao->add($user);

        if ($validation) {
            $message = "Votre compte " . $user->getEmail() . " a bien été créé.";
        } else {
            $message = "Error: veuillez recommencer.";
        }
    }
}

echo $twig->render('register.html.twig', [
    'message' => $message,
    'user' => $user
]);
