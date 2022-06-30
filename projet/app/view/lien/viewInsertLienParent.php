
 
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
          <input type="hidden" name='action' value='insertedLienParent'>        
          <div style="margin-bottom: 14px;">
              <h3> Ajout d'un lien parental</h3>
              <label for="centre_label">Sélectionnez un enfant </label>
              <select class="form-control" id='enfant' name='enfant' style="width: 500px">
                  <?php
                  foreach ($results['individu'] as $individu) {
                      echo ("<option>{$individu->getNom()} : {$individu->getPrenom()} </option>");
                  }
              ?>
              </select>
          </div>

          <div style="margin-bottom: 14px;">
              <label for="centre_label">Sélectionnez un parent : </label>
              <select class="form-control" id='parent' name='parent' style="width: 500px">
                  <?php
                  foreach ($results['individu'] as $individu) {
                      echo ("<option>{$individu->getNom()} : {$individu->getPrenom()} </option>");
                  }
              ?>
              </select>
          </div>
          
         
        </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>




