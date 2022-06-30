
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
            echo ("<h3>Confirmation de la création d'un évenement </h3>");
            echo("<ul>");
            echo ("<li>famille_id = " . $famId . "</li>");
            echo ("<li>individu_id = " . $iid . "</li>");
            echo ("<li>event_id = " . $event_id . "</li>");
            echo ("<li>event_type = " . $event_type . "</li>");
            echo ("<li>event_date = " . $event_date . "</li>");
            echo ("<li>event_lieu = " . $event_lieu . "</li>");

            echo("</ul>");
        } else {
            echo ("<h3>Problème d'insertion de l'evenement</h3>");
            
        }



        echo("</div>");

        include $root . '/app/view/fragment/fragmentFooter.html';
        ?>


