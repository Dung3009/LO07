
<?php
require_once '../model/ModelFamille.php';

class ControllerFamille {

    public static function familleReadAll() {

        $results = ModelFamille::getAll();


        include 'config.php';
        $vue = $root . '/app/view/famille/viewAll.php';
        if (DEBUG)
            echo ("ControllerFamille : familleReadAll : vue = $vue");

        require ($vue);
    }

    

    

    public static function familleCreate() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/famille/viewInsert.php';
        require ($vue);
    }

    public static function familleCreated() {
        $condition1 = empty(trim($_GET['nom']));
        $condition2 = !empty(trim($_GET['nom']));

        if ($condition1)
            $results = false;
        else if ($condition2) {
            $results = ModelFamille::insert(
                            htmlspecialchars($_GET['nom'])
            );
            session_start();

            $familleChoisi = htmlspecialchars($_GET['nom']);
            $_SESSION['familleChoisi'] = $familleChoisi;
            $_SESSION['idChoisi'] = $results;
        }



        include 'config.php';
        $vue = $root . '/app/view/famille/viewInserted.php';
        require ($vue);
    }

    public static function familleSelection() {
        $results = ModelFamille::getAllNom();
        $target = $args['target'];

        include 'config.php';
        $vue = $root . '/app/view/famille/viewSelection.php';
        require ($vue);
    }

    public static function familleSelectionned() {
        $familleChoisi = htmlspecialchars($_GET['nom']);
        session_start();
        error_reporting(0);

        $_SESSION['familleChoisi'] = $familleChoisi;

        $id = ModelFamille::findId(
                        $familleChoisi
        );
        $idChoisi = $id[0]->getId();

        $_SESSION['idChoisi'] = $idChoisi;
        include 'config.php';
        $vue = $root . '/app/view/famille/viewSelectionned.php';
        require ($vue);
    }

}
?>



