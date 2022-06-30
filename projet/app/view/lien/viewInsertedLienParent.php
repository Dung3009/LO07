
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.php';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results){
        echo ("<h3>Confirmation de la création d'un évenement </h3>");
        echo("<ul>");
        echo ("<li>famille_id = " . $famId . "</li>");
        echo ("<li>id = " . $id_enfant . "</li>");
        echo ("<li>nom = " . $nom_enfant . "</li>");
        echo ("<li>prenom = " . $prenom_enfant . "</li>");
        echo ("<li>sexe = " . $sexe_parent . "</li>");
        echo ("<li>pere = " . $pere . "</li>");
        echo ("<li>mere = " . $mere . "</li>");
        
        
        echo("</ul>");
    }
    else{
        echo ("<h3>Problème d'insertion d'un lien parent </h3>");
    }
    

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>

    
    