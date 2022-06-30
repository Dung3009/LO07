
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
    if ($results) {
     echo ("<h3>Confirmation de la création d'une famille </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
     echo ("<li>nom = " . $_GET['nom'] . "</li>");
     
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion de la famille</h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>

    
    