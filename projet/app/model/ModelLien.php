

<?php
require_once 'Model.php';
require_once 'ModelIndividu.php';

class ModelLien {

    private $famille_id, $id, $iid1, $iid2, $lien_type, $lien_date, $lien_lieu;

    public function __construct($id = NULL, $nom = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->famille_id = $famille_id;
            $this->id = $id;

            $this->iid1 = $iid1;
            $this->iid2 = $iid2;
            $this->lien_type = $lien_type;
            $this->lien_date = $lien_date;
            $this->lien_lieu = $lien_lieu;
        }
    }

    public function getFamille_id() {
        return $this->famille_id;
    }

    public function getId() {
        return $this->id;
    }

    public function getIid1() {
        return $this->iid1;
    }

    public function getIid2() {
        return $this->iid2;
    }

    public function getLien_type() {
        return $this->lien_type;
    }

    public function getLien_date() {
        return $this->lien_date;
    }

    public function getLien_lieu() {
        return $this->lien_lieu;
    }

    public function setFamille_id($famille_id) {
        $this->famille_id = $famille_id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIid1($iid1) {
        $this->iid1 = $iid1;
    }

    public function setIid2($iid2) {
        $this->iid2 = $iid2;
    }

    public function setLien_type($lien_type) {
        $this->lien_type = $lien_type;
    }

    public function setLien_date($lien_date) {
        $this->lien_date = $lien_date;
    }

    public function setLien_lieu($lien_lieu) {
        $this->lien_lieu = $lien_lieu;
    }

    

    public static function getAll($famId) {
        try {


            $database = Model::getInstance();
            $query = "select * from lien where famille_id= $famId";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelLien");
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
            $id = $results[0]->getId();
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
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
    
    
    public static function findPere($nom, $prenom) {
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
    
    public static function findMere($nom, $prenom) {
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
    public static function ajoutLienParent($famId, $id_enfant, $id_parent , $sexe) {
        try {
            $database = Model::getInstance();

            if ("$sexe" == "H") {
                
                
                
                
                $query = " update  individu set pere =$id_parent where famille_id=$famId and id=$id_enfant";
                $statement = $database->prepare($query);
                $statement->execute();  
                
                return 0;
            }
            else if ("$sexe" == "F") {
                
                
                
                $query = " update individu set mere =$id_parent where famille_id=$famId and id=$id_enfant";
                $statement = $database->prepare($query);
                $statement->execute(); 
                
                return 0;
            }
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
    public static function viewInsertUnion($famId) {
        try {
            $database = Model::getInstance();
            $results = array();

            $query = "select * from individu where famille_id = $famId and sexe='H' order by id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results['homme'] = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelIndividu');
            
            $query = "select * from individu where famille_id = $famId and sexe='F' order by id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results['femme'] = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelIndividu');
            
            
            
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    public static function ajoutUnion($famId, $id_homme,$id_femme,  $lien_type, $lien_date, $lien_lieu ) {
        try {
            $database = Model::getInstance();

            $query = "select max(id) from lien ";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;
            
            
            $query = "insert into lien (famille_id, id, iid1,iid2, lien_type, lien_date, lien_lieu) 
                     value ($famId, $id, $id_homme,$id_femme, '$lien_type', '$lien_date', '$lien_lieu')";
            $statement = $database->prepare($query);
            $statement->execute();

            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    
}
?>
