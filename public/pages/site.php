<?php

require("class/Service.php");
require("class/Client.php");

$Service = new Service();
$Client = new Client();

?>

<div class="container">
    <div class="section">
      
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h5 class="center">Banque</h5>

            <p><b>Trésorerie : 0€</b></p>
            <p><b>Déclaration d'impôt :</b></p>
            <p>Prochaine date de déclaration : </p>
            <p>Montant : 0€</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h5 class="center">Services</h5>

            <?php

            if($Service->getService() != null){

              foreach ($Service->getService() as $service) {
                  
                  echo "<p>".$service['name']." - ".$service['date']."</p>";

              }

              }else{

              echo "<p>Pas de service pour le moment</p>";

              }

            ?>
            
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h5 class="center">Clients</h5>

            <?php

            if($Client->getClient() != null){

              foreach($Client->getClient() as $client) {

                echo "<p>".$client['name']." - ".$client['date']."</p>";

              }

              }else{

              echo "<p>Pas de client pour le moment</p>";

              }

            ?>

          </div>
        </div>
      </div>

    </div>
</div>