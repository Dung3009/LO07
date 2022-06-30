
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
        echo ("<h2 style ='color : red;'> $nom $prenom </h2>");
        echo("<ul>");
        if (count($evenement['evenement']) == 1) {
            $type = $evenement['evenement'][0]->getEvent_type();
            $date = $evenement['evenement'][0]->getEvent_date();
            $lieu = $evenement['evenement'][0]->getEvent_lieu();

            if ($type == 'NAISSANCE') {
                echo('<li> Né le ' . $date . ' à ' . $lieu . '</li>');
                echo ('<li> Décès le ?  </li>');
            } else if ($type == 'DECES') {
                echo ('<li> Né le ? </li>');
                echo ('<li> Décès le ' . $date . ' à ' . $lieu . '  </li>');
            }
        } else if (count($evenement['evenement']) == 2) {
            $type = $evenement['evenement'][0]->getEvent_type();
            if ($type == 'NAISSANCE') {
                $date_naissance = $evenement['evenement'][0]->getEvent_date();
                $lieu_naissance = $evenement['evenement'][0]->getEvent_lieu();
                $date_deces = $evenement['evenement'][1]->getEvent_date();
                $lieu_deces = $evenement['evenement'][1]->getEvent_lieu();
            } else if ($type == 'DECES') {
                $date_naissance = $evenement['evenement'][1]->getEvent_date();
                $lieu_naissance = $evenement['evenement'][1]->getEvent_lieu();
                $date_deces = $evenement['evenement'][0]->getEvent_date();
                $lieu_deces = $evenement['evenement'][0]->getEvent_lieu();
            }
            echo('<li> Né le ' . $date_naissance . ' à ' . $lieu_naissance . '</li>');
            echo('<li> Décès le ' . $date_deces . ' à ' . $lieu_deces . '</li>');
        }
        echo("</ul>");
        echo ("<h3> Parents </h3>");
        echo("<ul>");
        if ($id_pere == 0) {
            echo("<li> Père ? </li>");
        } else {
            $nom_pere = $pere['pere'][0]->getNom();
            $prenom_pere = $pere['pere'][0]->getPrenom();
            $id_pere = $pere['pere'][0]->getId();
            echo("<li> Père <a href ='../router/router2.php?action=selectedIndividuDansPage&id=$id_pere'> $nom_pere $prenom_pere</a> </li>");
        }
        if ($id_mere == 0) {
            echo("<li> Mère ? </li>");
        } else {
            $nom_mere = $mere['mere'][0]->getNom();
            $prenom_mere = $mere['mere'][0]->getPrenom();
            echo("<li> Mère <a href ='../router/router2.php?action=selectedIndividuDansPage&id=$id_mere'> $nom_mere $prenom_mere</a> </li>");
        }
        echo("</ul>");
        if (!empty($union['union'])) {
            echo ("<h3> Unions et enfants </h3>");
            echo("<ul>");
            if ($sexe == 'H') {
                foreach ($union['union'] as $id_union) {
                    $id_union2 = $id_union->getIid2();
                    $find_nom_union = ModelIndividu::findNom($famId, $id_union2);
                    $nom_union = $find_nom_union['individu'][0]->getNom();
                    $prenom_union = $find_nom_union['individu'][0]->getPrenom();
                    echo ("<li> Union avec <a href='../router/router2.php?action=selectedIndividuDansPage&id=$id_union2'> $nom_union $prenom_union </a> </li>");
                    $enfant = ModelIndividu::findEnfant($famId, $individu_id, $id_union2);
                    if (!empty($enfant['enfant'])) {

                        echo ("<li style='list-style : none'>" );
                        echo ("<ol>");
                        foreach ($enfant['enfant'] as $enf) {
                            $nom_enf = $enf->getNom();
                            $prenom_enf = $enf->getPrenom();
                            $id_enf = $enf->getId();
                            echo(" <li> Enfant  <a href='../router/router2.php?action=selectedIndividuDansPage&id=$id_enf'>  $nom_enf $prenom_enf </a> </li>");
                        }
                        echo ("</ol>");
                        echo("</li>");
                    }
                }
            } else if ($sexe == 'F') {
                foreach ($union['union'] as $id_union) {
                    $id_union2 = $id_union->getIid1();
                    $find_nom_union = ModelIndividu::findNom($famId, $id_union2);
                    $nom_union = $find_nom_union['individu'][0]->getNom();
                    $prenom_union = $find_nom_union['individu'][0]->getPrenom();
                    echo ("<li> Union avec <a href='../router/router2.php?action=selectedIndividuDansPage&id=$id_union2'> $nom_union $prenom_union </a> </li>");
                    $enfant = ModelIndividu::findEnfant($famId, $id_union2, $individu_id);
                    if (!empty($enfant['enfant'])) {

                        echo ("<li style='list-style : none'>" );
                        echo ("<ol>");
                        foreach ($enfant['enfant'] as $enf) {
                            $nom_enf = $enf->getNom();
                            $prenom_enf = $enf->getPrenom();
                            $id_enf = $enf->getId();
                            echo(" <li> Enfant      <a href='../router/router2.php?action=selectedIndividuDansPage&id=$id_enf'>  $nom_enf $prenom_enf </a> </li>");
                        }
                        echo ("</ol>");
                        echo("</li>");
                    }
                }
            }
        }
            echo("</ul>");

            echo("</div>");

            include $root . '/app/view/fragment/fragmentFooter.html';
            ?>


