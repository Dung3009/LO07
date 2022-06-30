

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
                <input type="hidden" name='action' value='insertedIndividu'>        
                <div style="margin-bottom: 14px;">
                    <h3> Creation d'un individu </h3>


                    <label for="nom">Nom? : </label>
                    <input type="text" name='nom' style="width: 500px" class="form-control">
                    <br><!-- comment -->
                    <label for="prenom">Prenom ? : 
                    </label><input type="text" name='prenom' style="width: 500px" class="form-control">
                    <label for="Sexe">Sexe? : </label>
                    <div>
                        <input type="radio" id="masculin" name="sexe" value="H" 
                               checked>
                        <label for="masculin">Masculin</label>
                   
                        <input type="radio" id="Feminin" name="sexe" value="F">
                        <label for="feminin">Feminin</label>
                    </div>
                </div>


            </div>
            <p/>
            <button class="btn btn-primary" type="submit">Go</button>
        </form>
        <p/>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>




