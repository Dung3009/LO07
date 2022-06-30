

<?php
require_once 'Model.php';
require_once 'ModelIndividu.php';

class ModelEvenement {

    private $famille_id, $id, $iid, $event_type, $event_date, $event_lieu;

    public function __construct($id = NULL, $nom = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->famille_id = $famille_id;
            $this->id = $id;
            
            $this->iid = $iid;
            $this->event_type = $event_type;
            $this->event_date = $event_date;
            $this->event_lieu = $event_lieu;
            
            
        }
    }

    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }
    public function getFamille_id() {
        return $this->famille_id;
    }

    public function getIid() {
        return $this->iid;
    }

    public function getEvent_type() {
        return $this->event_type;
    }

    public function getEvent_date() {
        return $this->event_date;
    }

    public function getEvent_lieu() {
        return $this->event_lieu;
    }

    public function setFamille_id($famille_id) {
        $this->famille_id = $famille_id;
    }

    

    public function setIid($iid) {
        $this->iid = $iid;
    }

    public function setEvent_type($event_type) {
        $this->event_type = $event_type;
    }

    public function setEvent_date($event_date) {
        $this->event_date = $event_date;
    }

    public function setEvent_lieu($event_lieu) {
        $this->event_lieu = $event_lieu;
    }
    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }
    

    public static function getAllId() {
        try {
            $database = Model::getInstance();
            $query = "select id from evenement";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    

   

    public static function getAll($famId) {
        try {
            
            
            $database = Model::getInstance();
            $query = "select * from evenement where famille_id= $famId order by id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelEvenement");
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

    public static function ajout($famId, $iid,  $event_type, $event_date, $event_lieu ) {
        try {
            $database = Model::getInstance();

            $query = "select max(id) from evenement where famille_id = $famId ";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;
            
            
            $query = "insert into evenement (famille_id, id, iid, event_type, event_date, event_lieu) 
                     value ($famId, $id, $iid, '$event_type', '$event_date', '$event_lieu')";
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
