

<?php
require_once 'Model.php';

class ModelFamille {

    private $id, $nom;

    public function __construct($id = NULL, $nom = NULL) {
        if (!is_null($id)) {
            $this->id = $id;
            $this->nom = $nom;
        }
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

// retourne une liste des id
   
    public static function getAllNom() {
        try {
            $database = Model::getInstance();
            $query = "select nom from famille";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

   

    public static function getAll() {
        try {
            
            $database = Model::getInstance();
            $query = "select * from famille order by id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelFamille");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getOne($id) {
        try {
            $database = Model::getInstance();
            $query = "select * from famille where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelFamille");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function findId($nom) {
        try {
            $database = Model::getInstance();
            $query = "select id from famille where nom = :nom";
            $statement = $database->prepare($query);
            $statement->execute([
                'nom' => $nom
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelFamille");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($nom) {
        try {
            $database = Model::getInstance();

            $query = "select max(id) from famille";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            $query = "insert into famille value (:id, :nom)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
            ]);
            
            $query = "insert into individu value (:famille_id, :id, :nom, :prenom, :sexe, :pere, :mere)";
            $statement = $database->prepare($query);
            $statement->execute([
                'famille_id' => $id,
                'id' => 0,
                'nom' => '?',
                'prenom' => '?',
                'sexe' => '?',
                'pere' => 0,
                'mere' => 0,
            ]);

            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function update() {
        echo ("ModelFamille : update() TODO ....");
        return null;
    }

}
?>
