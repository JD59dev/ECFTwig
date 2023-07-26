<?php
class FilmsDAO extends Dao
{

    // Affichage de tous les films réalisés par les réalisateurs et acteurs concernés
    public function getAll($search)
    {
        try {
            $data = null;

            $q = $this->BDD->prepare("SELECT films.idFilm, titre, realisateur, affiche, annee, roles.personnage, acteurs.nom, acteurs.prenom, acteurs.idActeur
            FROM films
            INNER JOIN roles ON films.idFilm = roles.idFilm
            INNER JOIN acteurs ON roles.idActeur = acteurs.idActeur
            WHERE LOWER(titre) LIKE LOWER(:titre)
            ORDER BY films.idFilm ASC");

            $q->execute([':titre' => "%" . $search . "%"]);
            $movies = [];

            while ($data = $q->fetch()) {

                $acteurData = new Acteur($data['idActeur'], $data['nom'], $data['prenom']);

                $roleData = new Role(null, $data['personnage'], $acteurData);
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
        $values = [
            ':idFilm' => $data->getId(),
            ':titre' => $data->getTitre(),
            ':realisateur' => $data->getRealisateur(),
            ':affiche' => $data->getAffiche(),
            ':annee' => $data->getAnnee()
        ];
        // Initialisation des valeurs pour la requête


        $q = "INSERT INTO films (idFilm, titre, realisateur, affiche, annee) 
        VALUES (:idFilm, :titre, :realisateur, :affiche, :annee)"; // Initialisation de la requête
        $insert = $this->BDD->prepare($q); // Exécution de la requête


        try {
            if (!$insert->execute($values)) {
                return false;
            }

            // Utilisation de la méthode getPDO() ajouté dans SPDO
            $idFilm = SPDO::getInstance()->getPDO()->lastInsertId();

            // Ajout des acteurs associés aux rôles dans la table "acteurs" et les rôles dans "roles"
            $roles = $data->getRoles(); // Récupération de l'objet Role de chaque film
            if (!empty($roles)) {
                foreach ($roles as $role) {
                    $acteur = $role->getActeur(); // Récupération de l'objet Acteur de chaque Role
                    $valuesActeur = [
                        ':nom' => $acteur->getNom(),
                        ':prenom' => $acteur->getPrenom()
                    ]; // Stockage des variabes nécessaires pour l'ajout d'un acteur

                    // Exécution de la requête d'insertion de l'acteur
                    $qActeur = "INSERT INTO acteurs (nom, prenom) 
                    VALUES (:nom , :prenom)
                    ON DUPLICATE KEY UPDATE idActeur = LAST_INSERT_ID(idActeur)";
                    // DUPLICATE KEY UPDATE => fonctionnalité pour vérifier si le nom et prénom de l'acteur existe déjà
                    // S'il existe, on conserve in idActeur. Sinon, il sera créé.

                    $insertActeur = $this->BDD->prepare($qActeur);
                    // Exécution de la requête pour l'insertion, s'il y a erreur on retourne false et on arrête
                    if (!$insertActeur->execute($valuesActeur)) {
                        return false;
                    }

                    // Récupération du dernier ID créé ou récupéré, dans ce cas celui de l'acteur
                    $newIdActeur = SPDO::getInstance()->getPDO()->lastInsertId();

                    // Insertion du rôle dans la table "roles" en utilisant l'idActeur existant
                    $valuesRole = [
                        ':idActeur' => $newIdActeur,
                        ':idFilm' => $idFilm,
                        ':personnage' => $role->getPersonnage(),
                        ':idRole' => $role->getIdRole(),
                        ':test' => '0'
                    ];

                    // Exécution de la requête pour l'insertion du rôle
                    $qRole = "INSERT INTO roles (idActeur, idFilm, personnage, idRole, test) VALUES (:idActeur, :idFilm, :personnage, :idRole, :test)";
                    $insertRole = $this->BDD->prepare($qRole);
                    if (!$insertRole->execute($valuesRole)) {
                        return false;
                    }
                }
            }
            return $idFilm;
        } catch (Exception $err) {
            return "ERROR : " . $err->getMessage();
        }
    }

    // Recherche d'un film
    public function getOne($id)
    {
        try {
            $q = $this->BDD->prepare("SELECT * FROM films WHERE films.idFilm = :id_film");
            $q->execute([":titre" => $id]);
            $data = $q->fetch(); // Récupération des résultats
            $movie = new Film($data['idFilm'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee'], $data['roles']); // Stockage dans la classe Film
        } catch (Exception $err) {
            return "ERROR : " . $err->getMessage();
        }

        return ($movie);
    }
}
