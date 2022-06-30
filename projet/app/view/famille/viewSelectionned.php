
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
    echo("<h2> Confirmation de la selection d'une famille </h2>");
                printf("<h4> La famille $familleChoisi ($idChoisi) est maintenant sélectionnée</h4>");

    echo("</div>");
    
    
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>

    
    