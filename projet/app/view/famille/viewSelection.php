
 
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
        
        <input type="hidden" name='action' value='familleSelectionned'>        
        <select class='form-control' name='nom'>
            <?php
            foreach ($results as $nom) {
             echo ("<option>$nom</option>");
            }
            ?>
        </select>                           
                       
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>



