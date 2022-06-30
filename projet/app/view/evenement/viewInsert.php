
 
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
          <input type="hidden" name='action' value='insertedEvenement'>        
          <div style="margin-bottom: 14px;">
              <h3> Ajout d'un évènement</h3>
              <label for="centre_label">Sélectionnez un individu </label>
              <select class="form-control" id='individu' name='individu' style="width: 500px">
                  <?php
                  foreach ($results['individu'] as $individu) {
                      echo ("<option>{$individu->getNom()} : {$individu->getPrenom()} </option>");
                  }
              ?>
              </select>
          </div>

          <div style="margin-bottom: 14px;">
              <label for="centre_label">Sélectionnez un type d'evenement : </label>
              <select class="form-control" id='event_type' name='event_type' style="width: 500px">
                  <option> DECES </option>
                  <option> NAISSANCE </option>
              </select>
          </div>
          
          <label for="event_date">Date (AAAA-MM-JJ)? : </label>
          <input type="text" name='event_date' style="width: 500px" class="form-control">
          <br><!-- comment -->
          <label for="event_lieu">Lieu ? : 
          </label><input type="text" name='event_lieu' style="width: 500px" class="form-control">
        </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>




