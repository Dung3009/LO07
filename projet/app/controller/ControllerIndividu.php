
<?php
require_once '../model/ModelIndividu.php';


class ControllerIndividu {

    public static function individuReadAll() {
        include 'config.php';
        session_start();
        if (isset($_SESSION['idChoisi'])) {
            $famId = $_SESSION['idChoisi'];
            $results = ModelIndividu::getAll($famId);


            $vue = $root . '/app/view/individu/viewAll.php';
            if (DEBUG)
                echo ("ControllerIndividu : individuReadAll : vue = $vue");

            require ($vue);
        } else {
            include 'config.php';
            $vue = $root . '/app/view/evenement/viewNotSelectionFamille.php';

            require ($vue);
        }
    }

    public static function insertionIndividu() {

        include 'config.php';
        session_start();
        if (isset($_SESSION['idChoisi'])) {
            $famId = $_SESSION['idChoisi'];
            $vue = $root . '/app/view/individu/viewInsertIndividu.php';
            require ($vue);
        } else {
            include 'config.php';
            $vue = $root . '/app/view/evenement/viewNotSelectionFamille.php';

            require ($vue);
        }
    }

    public static function insertedIndividu() {


        include 'config.php';
        session_start();
        if (isset($_SESSION['idChoisi'])) {
            
            
            
            
            $famId = $_SESSION['idChoisi'];
            if ( empty(trim($_GET['nom'])) ||  empty(trim($_GET['prenom']))) {
                $results = false;
            }
            else {
                 $nom = htmlspecialchars($_GET['nom']);
                $prenom = htmlspecialchars($_GET['prenom']);
                $sexe = $_GET['sexe'];
                $individu_id = ModelIndividu::ajout(
                           $famId, $nom, $prenom, $sexe
                );
                $results = true;
            }
           
           
            

            include 'config.php';
            $vue = $root . '/app/view/individu/viewInsertedIndividu.php';
            require ($vue);
        } else {
            include 'config.php';
            $vue = $root . '/app/view/evenement/viewNotSelectionFamille.php';

            require ($vue);
        }
    }
    public static function pageSelectIndividu() {

        include 'config.php';
        session_start();
        if (isset($_SESSION['idChoisi'])) {
            $famId = $_SESSION['idChoisi'];
            $results = ModelIndividu::viewInsert($famId);
            $vue = $root . '/app/view/individu/viewPageSelectIndividu.php';
            require ($vue);
        } else {
            include 'config.php';
            $vue = $root . '/app/view/evenement/viewNotSelectionFamille.php';

            require ($vue);
        }
    }
    public static function selectedIndividu(){
        include 'config.php';
        session_start();
        if (isset($_SESSION['idChoisi'])) {
            $famId = $_SESSION['idChoisi'];
            $nom = explode(" : ", $_GET['individu'])[0];
            $prenom = explode(" : ", $_GET['individu'])[1];
            $individu_id = ModelIndividu::findId($nom, $prenom);
            
            $evenement = ModelIndividu::findEvenement($famId, $individu_id);
            
            $id_pere = ModelIndividu::findIdPere($nom, $prenom);   
            $id_mere = ModelIndividu::findIdMere($nom, $prenom);
            
            if ($id_pere != 0){
                $pere = ModelIndividu::findNomPere($famId, $id_pere);
            }
            if ($id_mere !=0){
                $mere = ModelIndividu::findNomMere($famId, $id_mere);
            }
            
            $sexe = ModelIndividu::findSexe($nom, $prenom);
            
            if ($sexe == 'H'){
                $union = ModelIndividu::findUnionHomme($famId, $individu_id);
            }
            else if ($sexe == 'F'){
                $union = ModelIndividu::findUnionFemme($famId, $individu_id);
            }
            
            
            
            $vue = $root . '/app/view/individu/viewPageIndividu.php';
            require ($vue);
        } else {
            include 'config.php';
            $vue = $root . '/app/view/evenement/viewNotSelectionFamille.php';

            require ($vue);
        }
    }
    public static function selectedIndividuDansPage($args){
        include 'config.php';
        session_start();
        if (isset($_SESSION['idChoisi'])) {
            $famId = $_SESSION['idChoisi'];
            $individu_id = $args['id'];
            
            $individu = ModelIndividu::findNom($famId, $individu_id);
            $nom = $individu['individu'][0]->getNom();
            $prenom = $individu['individu'][0]->getPrenom();
            
            $evenement = ModelIndividu::findEvenement($famId, $individu_id);
            
            $id_pere = ModelIndividu::findIdPere($nom, $prenom);   
            $id_mere = ModelIndividu::findIdMere($nom, $prenom);
            
            if ($id_pere != 0){
                $pere = ModelIndividu::findNomPere($famId, $id_pere);
            }
            if ($id_mere !=0){
                $mere = ModelIndividu::findNomMere($famId, $id_mere);
            }
            
            $sexe = ModelIndividu::findSexe($nom, $prenom);
            
            if ($sexe == 'H'){
                $union = ModelIndividu::findUnionHomme($famId, $individu_id);
            }
            else if ($sexe == 'F'){
                $union = ModelIndividu::findUnionFemme($famId, $individu_id);
            }
            
            
            
            $vue = $root . '/app/view/individu/viewPageIndividu.php';
            require ($vue);
        } else {
            include 'config.php';
            $vue = $root . '/app/view/evenement/viewNotSelectionFamille.php';

            require ($vue);
        }
    }

}
?>



