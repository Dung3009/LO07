 
        
        <div class="panel p-5   " style="background-color:orange; ">
            <div class="panel-body" class="titre">
                <?php 
               
                
               
                if ((isset ($_SESSION['familleChoisi'])) && isset($_SESSION['idChoisi'])) {
                    $nomChoisi = $_SESSION['familleChoisi'];
                    $idChoisi = $_SESSION['idChoisi'];
                    echo("<h1 style='text-align: center ; font-weight: 600; margin-top: 100px; margin-bottom: 100px' > FAMILLE $nomChoisi </h1>"); 
                }
                else 
                    echo("<h1 style='text-align: center ; font-weight: 600; margin-top: 100px; margin-bottom: 100px' > PAS DE FAMILLE SELECTIONNE</h1>");
                ?>
            </div>
        </div>
