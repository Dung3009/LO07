
<?php

require_once '../model/ModelLien.php';

class ControllerLien {

    public static function lienReadAll() {
        include 'config.php';
        session_start();
        if (isset($_SESSION['idChoisi'])) {
            $famId = $_SESSION['idChoisi'];
            $results = ModelLien::getAll($famId);

            $vue = $root . '/app/view/lien/viewAll.php';
            if (DEBUG)
                echo ("ControllerLien : lienReadAll : vue = $vue");

            require ($vue);
        } else {
            include 'config.php';
            $vue = $root . '/app/view/evenement/viewNotSelectionFamille.php';

            require ($vue);
        }
    }

    public static function insertionLienParent() {

        include 'config.php';
        session_start();
        if (isset($_SESSION['idChoisi'])) {
            $famId = $_SESSION['idChoisi'];
            $results = ModelLien::viewInsert($famId);
            $vue = $root . '/app/view/lien/viewInsertLienParent.php';
            require ($vue);
        } else {
            include 'config.php';
            $vue = $root . '/app/view/evenement/viewNotSelectionFamille.php';

            require ($vue);
        }
    }

    public static function insertedLienParent() {
        include 'config.php';
        session_start();
        if (isset($_SESSION['idChoisi'])) {
            $nom_enfant = explode(" : ", $_GET['enfant'])[0];
            $prenom_enfant = explode(" : ", $_GET['enfant'])[1];
            $id_enfant = ModelLien::findId($nom_enfant, $prenom_enfant);

            $nom_parent = explode(" : ", $_GET['parent'])[0];
            $prenom_parent = explode(" : ", $_GET['parent'])[1];

            $sexe_parent = ModelLien::findSexe($nom_parent, $prenom_parent);

            $id_parent = ModelLien::findId($nom_parent, $prenom_parent);

            $famId = $_SESSION['idChoisi'];
            if ($id_enfant == $id_parent) {
                $results = false;
            } else {
                $parent = ModelLien::ajoutLienParent(
                                $famId, $id_enfant, $id_parent, $sexe_parent
                );

                $pere = ModelLien::findPere($nom_enfant, $prenom_enfant);
                $mere = ModelLien::findMere($nom_enfant, $prenom_enfant);
                $results = true;
            }


            include 'config.php';
            $vue = $root . '/app/view/lien/viewInsertedLienParent.php';
            require ($vue);
        } else {
            include 'config.php';
            $vue = $root . '/app/view/evenement/viewNotSelectionFamille.php';

            require ($vue);
        }
    }

    public static function insertionUnion() {

        include 'config.php';
        session_start();
        if (isset($_SESSION['idChoisi'])) {
            $famId = $_SESSION['idChoisi'];
            $results = ModelLien::viewInsertUnion($famId);
            $vue = $root . '/app/view/lien/viewInsertUnion.php';
            require ($vue);
        } else {
            include 'config.php';
            $vue = $root . '/app/view/evenement/viewNotSelectionFamille.php';

            require ($vue);
        }
    }

    public static function insertedUnion() {


        include 'config.php';
        session_start();
        if (isset($_SESSION['idChoisi'])) {
            $nom_homme = explode(" : ", $_GET['homme'])[0];
            $prenom_homme = explode(" : ", $_GET['homme'])[1];
            $id_homme = ModelLien::findId($nom_homme, $prenom_homme);

            $nom_femme = explode(" : ", $_GET['femme'])[0];
            $prenom_femme = explode(" : ", $_GET['femme'])[1];
            $id_femme = ModelLien::findId($nom_femme, $prenom_femme);

            $famId = $_SESSION['idChoisi'];
            if (empty(trim($_GET['lien_date'])) || empty(trim($_GET['lien_lieu']))) {
                $results = false;
            } else {
                $lien_type = htmlspecialchars($_GET['lien_type']);
                $lien_date = htmlspecialchars($_GET['lien_date']);
                $lien_lieu = htmlspecialchars($_GET['lien_lieu']);
                $lien_id = ModelLien::ajoutUnion(
                                $famId, $id_homme, $id_femme, $lien_type, $lien_date, $lien_lieu
                );
                $results = true;
            }




            include 'config.php';
            $vue = $root . '/app/view/lien/viewInsertedUnion.php';
            require ($vue);
        } else {
            include 'config.php';
            $vue = $root . '/app/view/evenement/viewNotSelectionFamille.php';

            require ($vue);
        }
    }

}
?>



