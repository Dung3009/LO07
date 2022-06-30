

<?php
require_once 'Model.php';
require_once 'ModelEvenement.php';
require 'ModelLien.php';

class ModelIndividu {

    private $famille_id, $id, $nom, $prenom, $sexe, $pere, $mere;

    public function __construct($id = NULL, $nom = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->famille_id = $famille_id;
            $this->id = $id;
            
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->sexe = $sexe;
            $this->pere = $pere;
            $this->mere = $mere;
            
            
        }
    }

    public function getFamille_id() {
        return $this->famille_id;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getSexe() {
        return $this->sexe;
    }

    public function getPere() {
        return $this->pere;
    }

    public function getMere() {
        return $this->mere;
    }

    public function setFamille_id($famille_id){
        $this->famille_id = $famille_id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function setSexe($sexe) {
        $this->sexe = $sexe;
    }

    public function setPere($pere) {
        $this->pere = $pere;
    }

    public function setMere($mere) {
        $this->mere = $mere;
    }




    

    
    

   

    public static function getAll($famId) {
        try {
            
            
            $database = Model::getInstance();
            $query = "select * from individu where famille_id= $famId";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelIndividu");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    

    public static function findId($nom, $prenom) {
        try {
            $database = Model::getInstance();
            $query = "select id from individu where nom = '$nom' and prenom = '$prenom'";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelIndividu");
            $id = $results[0] -> getId();
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function findEvenement($famId, $iid) {
        try {
            $database = Model::getInstance();
            $results = array();
            
            
            $query = "select * from evenement where famille_id = $famId and iid = $iid ";
            $statement = $database->prepare($query);
            $statement->execute();
            $results['evenement'] = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelEvenement');
            
            

            return $results;
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    public static function findNom($famId, $id) {
        try {
            $database = Model::getInstance();
            $results = array();
            
            $query = "select * from individu where famille_id = $famId and id = $id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results['individu'] = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelIndividu');
            
            
            
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    public static function findEnfant($famId, $id1,$id2) {
        try {
            $database = Model::getInstance();
            $results = array();
            
            $query = "select * from individu where famille_id = $famId and pere = $id1 and mere = $id2";
            $statement = $database->prepare($query);
            $statement->execute();
            $results['enfant'] = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelIndividu');
            
            
            
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    public static function findIdPere($nom, $prenom) {
        try {
            $database = Model::getInstance();
            $query = "select pere from individu where nom = '$nom' and prenom = '$prenom'";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelIndividu");
            $pere = $results[0]->getPere();
            return $pere;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function findIdMere($nom, $prenom) {
        try {
            $database = Model::getInstance();
            $query = "select mere from individu where nom = '$nom' and prenom = '$prenom'";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelIndividu");
            $mere = $results[0]->getMere();
            return $mere;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function findNomPere($famId, $id) {
        try {
            $database = Model::getInstance();
            $results = array();
            
            $query = "select * from individu where famille_id = $famId and id = $id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results['pere'] = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelIndividu');
            
            
            
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    public static function findNomMere($famId, $id) {
        try {
            $database = Model::getInstance();
            $results = array();
            
            $query = "select * from individu where famille_id = $famId and id = $id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results['mere'] = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelIndividu');
            
            
            
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    
    public static function findSexe($nom, $prenom) {
        try {
            $database = Model::getInstance();
            $query = "select sexe from individu where nom = '$nom' and prenom = '$prenom'";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelIndividu");
            $sexe = $results[0]->getSexe();
            return $sexe;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function findUnionHomme($famId, $iid1) {
        try {
            $database = Model::getInstance();
            $query = "select iid2 from lien where famille_id = $famId and iid1 = $iid1";
            $statement = $database->prepare($query);
            $statement->execute();
            $results['union'] = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelLien');
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    public static function findUnionFemme($famId, $iid2) {
        try {
            $database = Model::getInstance();
            $query = "select iid1 from lien where famille_id = $famId and iid2 = $iid2";
            $statement = $database->prepare($query);
            $statement->execute();
            $results['union'] = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelLien');
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    public static function ajout($famId, $nom,  $prenom, $sexe ) {
        try {
            $database = Model::getInstance();

            $query = "select max(id) from individu where famille_id = $famId ";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;
            
            
            $query = "insert into individu (famille_id, id, nom, prenom, sexe, pere, mere) 
                     value ($famId, $id, '$nom', '$prenom', '$sexe', 0,0)";
            $statement = $database->prepare($query);
            $statement->execute();

            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    
    
    
    public static function viewInsert($famId) {
        try {
            $database = Model::getInstance();
            $results = array();
            
            $query = "select * from individu where famille_id = $famId order by id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results['individu'] = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelIndividu');
            
            
            
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    
    
    

}
?>
