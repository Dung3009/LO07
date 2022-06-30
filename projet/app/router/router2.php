
<!-- ----- debut Router1 -->
<?php
require ('../controller/Controller.php');
require ('../controller/ControllerEvenement.php');
require ('../controller/ControllerFamille.php');
require ('../controller/ControllerIndividu.php');
require ('../controller/ControllerLien.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);


// Modification du routeur pour prendre en compte l'ensemble des parametres 
$action = $param['action'];

// On supprime l'element action de la structure 
unset($param['action']);

// Tout ce qui reste sont des arguments
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
    case "familleReadAll" :
    
    case "familleCreate" :
    case "familleCreated" :
    case "familleSelection":
    case "familleSelectionned":
  
        ControllerFamille::$action($args);
        break;
 
    case "evenementReadAll": 
    case "insertionEvenement":
    case "insertedEvenement":
        

        ControllerEvenement::$action();
        break; 
    
    case "lienReadAll":
    case "insertionLienParent":
    case "insertedLienParent":
    case "insertionUnion":
    case "insertedUnion":
    
         ControllerLien::$action();
        break;
    case "individuReadAll":
    case "insertionIndividu":
    case "insertedIndividu":
    case "pageSelectIndividu":
    case "selectedIndividu":
        ControllerIndividu::$action();
        break;
    case "selectedIndividuDansPage":
         ControllerIndividu::$action($args);
        break;
    default:
        $action = "accueil";
        Controller::$action();
     
}
?>

