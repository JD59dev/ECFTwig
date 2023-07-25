<?php


if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("Location: login"); 
    }else{
        $filmDao = new FilmsDAO();
        $message = "";
        $film = null;
        
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['titre']) && !empty($_POST['realisateur']) && !empty($_POST['affiche']) && !empty($_POST['annee']) && !empty($_POST['roles'])) {
                if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
                // L'utente non è autenticato, quindi reindirizzalo alla pagina di login
                header("Location: /login"); // Sostituisci "/login" con l'URL della tua pagina di login
                exit();
            $titre = $_POST['titre'];
                $realisateur = $_POST['realisateur'];
                $affiche = $_POST['affiche'];
                $annee = $_POST['annee'];
                $roles = $_POST['roles'];
        
                $film = new Film(null, $titre, $realisateur, $affiche, $annee, $roles);
                $ajouter = $filmDao->add($film);
        
                if ($ajouter) {
                    $message =  "Ajout OK";
                } else {
                    $message = "Erreur Ajout";
                }
            } else {
                $message = "Tous les champs du formulaire doivent être remplis.";
            }
        
        echo $twig->render('creation_film.html.twig', ['erreur' => $message]);
        }
        
    }
