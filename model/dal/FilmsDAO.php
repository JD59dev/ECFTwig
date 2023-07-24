<?php
class FilmsDAO extends Dao
{
    // ...

    // Affichage de tous les films réalisés par les réalisateurs et acteurs concernés
    public function getAll($search)
    {
        try {
            $data = null;

            $q = $this->BDD->prepare("SELECT films.idFilm, titre, realisateur, affiche, annee, roles.personnage, acteurs.nom, acteurs.prenom, acteurs.idActeur
            FROM films
            INNER JOIN roles ON films.idFilm = roles.idFilm
            INNER JOIN acteurs ON roles.idActeur = acteurs.idActeur
            WHERE LOWER(titre) LIKE :titre
            ORDER BY films.idFilm ASC");

            $q->execute([':titre' => "%" . $search . "%"]);
            $movies = [];
          
            while ($data = $q->fetch()) {
       
                $acteurData = new Acteur($data['idActeur'], $data['nom'], $data['prenom']);

                $roleData = new Role($data['personnage'], $acteurData);  
                if (!isset($movies[$data['idFilm']])) {
                    $movies[$data['idFilm']] = new Film($data['idFilm'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee']);
                }
                $movies[$data['idFilm']]->addRole($roleData);
                // il fallait utiliser les capacités d'un tableau associatif pour faire des lien key=value. ici on utilise la cles $data['idFilm'] 
                // comme cles pour acceder au element du tableau. du coup chaque objet Film de ce tableau a pour cles l'id du  dit objet. a present 
                // le tableau a des cles et des valeurs par données et donc on peut les sortir avec le vardump  dans les controllers qui utilise la methode
            }
                
            
        } catch (Exception $err) {
            return "ERROR : " . $err->getMessage();
        }
        return ($movies);
        // array_values ne fait que retourner les valeurs du tableau associatif dans un nouveau tableau indexé. on prend le tableau $movies
        // qui contient les objets films et retourne un tableau indexé contenant seulement les objets films et pas les cles [$data['idFilm']]
    }
    // Ajout d'un film
    public function add($data)
    {
        try {
            $values = ['titre' => $data->getTitre(), 'realisateur' => $data->getRealisateur(), 'affiche' => $data->getAffiche(), 'annee' => $data->getAnnee()]; // Initialisation des valeurs pour la requête

            $q = "INSERT INTO films (titre, realisateur, affiche, annee) 
            VALUES (:titre, :realisateur, :affiche, :annee)"; // Initialisation de la requête

            $insert = $this->BDD->prepare($q); // Exécution de la requête

            if (!$insert->execute($values)) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $err) {
            return "ERROR : " . $err->getMessage();
        }
    }

    // Recherche d'un film
    public function getOne($titre)
    {
        try {
            $q = $this->BDD->prepare("SELECT * FROM films WHERE titre = :titre");
            $q->execute([":titre" => $titre]);
            $data = $q->fetch(); // Récupération des résultats
            $movie = new Film($data['idFilm'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee'], $data['roles']); // Stockage dans la classe Film
        } catch (Exception $err) {
            return "ERROR : " . $err->getMessage();
        }

        return ($movie);
    }
}
