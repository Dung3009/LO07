
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
        echo ("<h3>Confirmation de la création d'un union </h3>");
        echo("<ul>");
        echo ("<li>famille_id = " . $famId . "</li>");
        echo ("<li>homme_id = " . $id_homme . "</li>");
        echo ("<li>femme_id = " . $id_femme . "</li>");
        echo ("<li>lien_id = " . $lien_id . "</li>");
        echo ("<li>lien_type = " . $lien_type . "</li>");
        echo ("<li>lien_date = " . $lien_date . "</li>");
        echo ("<li>lien_lieu = " . $lien_lieu . "</li>");
        
        
        echo("</ul>");
        
    }
    else{
        echo ("<h3>Problème d'insertion de l'union </h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>

    
    