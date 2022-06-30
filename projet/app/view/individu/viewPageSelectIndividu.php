
 
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
          <input type="hidden" name='action' value='selectedIndividu'>        
          <div style="margin-bottom: 14px;">
              <h3> Selection d'un individu</h3>
              <label for="centre_label">Sélectionnez un individu </label>
              <select class="form-control" id='individu' name='individu' style="width: 500px">
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




