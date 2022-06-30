
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
    if($results) {
        echo ("<h3>Confirmation de la création d'un évenement </h3>");
        echo("<ul>");
        echo ("<li>famille_id = " . $famId . "</li>");
        echo ("<li>id = " . $individu_id . "</li>");
        echo ("<li>nom = " . $nom . "</li>");
        echo ("<li>prenom = " . $prenom . "</li>");
        echo ("<li>sexe = " . $sexe . "</li>");
        echo ("<li>pere =  0 </li>");
        echo ("<li>mere =  0 </li>");
        
        echo("</ul>");
    }   
    else{
         echo ("<h3>Problème d'insertion de l'individu </h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>

    
    