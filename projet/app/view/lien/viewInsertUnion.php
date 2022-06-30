

<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentMenu.html';
        include $root . '/app/view/fragment/fragmentJumbotron.php';
        ?> 

        <form role="form" method='get' action='router2.php'>
            <div class="form-group">
                <input type="hidden" name='action' value='insertedUnion'>        
                <div style="margin-bottom: 14px;">
                    <h3> Ajout d'une union</h3>
                    <label for="centre_label">Sélectionnez un homme </label>
                    <select class="form-control" id='homme' name='homme' style="width: 500px">
                        <?php
                        foreach ($results['homme'] as $homme) {
                            echo ("<option>{$homme->getNom()} : {$homme->getPrenom()} </option>");
                        }
                        ?>
                    </select>
                    <label for="centre_label">Sélectionnez une femme </label>
                    <select class="form-control" id='femme' name='femme' style="width: 500px">
                        <?php
                        foreach ($results['femme'] as $femme) {
                            echo ("<option>{$femme->getNom()} : {$femme->getPrenom()} </option>");
                        }
                        ?>
                    </select>


                    <div style="margin-bottom: 14px;">
                        <label for="centre_label">Sélectionnez un type d'union : </label>
                        <select class="form-control" id='lien_type' name='lien_type' style="width: 500px">
                            <option> MARIAGE </option>
                            <option> COUPLE </option>
                            <option> SEPARATION </option>
                            <option> PACS </option>
                            <option> DIVORCE </option>

                        </select>
                    </div>

                    <label for="lien_date">Date (AAAA-MM-JJ)? : </label>
                    <input type="text" name='lien_date' style="width: 500px" class="form-control">
                    <br><!-- comment -->
                    <label for="lien_lieu">Lieu ? : 
                    </label><input type="text" name='lien_lieu' style="width: 500px" class="form-control">
                </div>


            </div>
            <p/>
            <button class="btn btn-primary" type="submit">Go</button>
        </form>
        <p/>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>




