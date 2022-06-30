
<?php
require_once '../model/ModelEvenement.php';

class ControllerEvenement {

    public static function evenementReadAll() {
        include 'config.php';
        session_start();
        if (isset($_SESSION['idChoisi'])) {
            $famId = $_SESSION['idChoisi'];
            $results = ModelEvenement::getAll($famId);


            $vue = $root . '/app/view/evenement/viewAll.php';
            if (DEBUG)
                echo ("ControllerEvenement : evenementReadAll : vue = $vue");

            require ($vue);
        } else {
            include 'config.php';
            $vue = $root . '/app/view/evenement/viewNotSelectionFamille.php';

            require ($vue);
        }
    }

    public static function insertionEvenement() {

        include 'config.php';
        session_start();
        if (isset($_SESSION['idChoisi'])) {
            $famId = $_SESSION['idChoisi'];
            $results = ModelEvenement::viewInsert($famId);
            $vue = $root . '/app/view/evenement/viewInsert.php';
            require ($vue);
        } else {
            include 'config.php';
            $vue = $root . '/app/view/evenement/viewNotSelectionFamille.php';

            require ($vue);
        }
    }

    public static function insertedEvenement() {


        include 'config.php';
        session_start();
        if (isset($_SESSION['idChoisi'])) {
            
            $nom = explode(" : ", $_GET['individu'])[0];
            $prenom = explode(" : ", $_GET['individu'])[1];
            $iid = ModelEvenement::findId($nom, $prenom);
            
            
            
            $famId = $_SESSION['idChoisi'];
            $results = ModelEvenement::viewInsert($famId);
            if ( empty(trim($_GET['event_type'])) ||  empty(trim($_GET['event_date']))  || empty(trim($_GET['event_lieu']))) {
                $results = false;
            }
            else{
                $event_type = htmlspecialchars($_GET['event_type']);
            $event_date = htmlspecialchars($_GET['event_date']);
            $event_lieu = htmlspecialchars($_GET['event_lieu']);
            $event_id = ModelEvenement::ajout(
                           $famId, $iid, $event_type, $event_date, $event_lieu
            );
            }
            
           
            

            include 'config.php';
            $vue = $root . '/app/view/evenement/viewInserted.php';
            require ($vue);
        } else {
            include 'config.php';
            $vue = $root . '/app/view/evenement/viewNotSelectionFamille.php';

            require ($vue);
        }
    }

}
?>



    