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

        <div class='offset-m2 l6 offset-l3'>
          <div class='card-panel grey lighten-5 z-depth-1'>
            <div class='row valign-wrapper'>
              <div class='col s12'>
                <span class='black-text'>
                  <h5 class="center">Banque</h5>
                </span>
              </div>
            </div>
          </div>
        </div>

        <div class='offset-m2 l6 offset-l3'>
          <div class='card-panel grey lighten-5 z-depth-1'>
            <div class='row valign-wrapper'>
              <div class='col s12'>
                <span class='black-text'>
                  <p><b>Trésorerie :</b> 0€</p>
                </span>
              </div>
            </div>
          </div>
        </div>

        <div class='offset-m2 l6 offset-l3'>
          <div class='card-panel grey lighten-5 z-depth-1'>
            <div class='row valign-wrapper'>
              <div class='col s12'>
                <span class='black-text'>
                  <p><b>Déclaration d'impôt :</b></p>
                  <p>Prochaine date de déclaration : </p>
                  <p>Montant : 0€</p>
                </span>
              </div>
            </div>
          </div>
        </div>
            
    </div>
    </div>

    <div class="col s12 m4">
    <div class="icon-block">

          <div class='offset-m2 l6 offset-l3'>
            <div class='card-panel grey lighten-5 z-depth-1'>
              <div class='row valign-wrapper'>
                <div class='col s12'>
                  <span class='black-text'>
                    <h5 class="center">Services</h5>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <a href='index.php?link=service'>

          <?php

          if($Service->getService() != null){

              foreach ($Service->getService() as $service) {

              echo "<div class='offset-m2 l6 offset-l3'>
                <div class='card-panel grey lighten-5 z-depth-1'>
                  <div class='row valign-wrapper'>
                    <div class='col s12'>
                      <span class='black-text'>
                        <p>".$service['name']."</p>
                      </span>
                    </div>
                  </div>
                </div>
              </div>";

              }

            }else{

              echo "<div class='offset-m2 l6 offset-l3'>
                <div class='card-panel grey lighten-5 z-depth-1'>
                  <div class='row valign-wrapper'>
                    <div class='col s12'>
                      <span class='black-text'>
                        <p>Pas de service pour le moment</p>
                      </span>
                    </div>
                  </div>
                </div>
              </div>";

              }

            ?>

          </a>
            
          </div>
        </div>

        <div class="col s12 m4">
        <div class="icon-block">
          
          <div class='offset-m2 l6 offset-l3'>
            <div class='card-panel grey lighten-5 z-depth-1'>
              <div class='row valign-wrapper'>
                <div class='col s12'>
                  <span class='black-text'>
                    <h5 class="center">Clients</h5>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <a href='index.php?link=client'>

          <?php

            if($Client->getClient() != null){

              foreach($Client->getClient() as $client) {

                echo "<div class='offset-m2 l6 offset-l3'>
                <div class='card-panel grey lighten-5 z-depth-1'>
                  <div class='row valign-wrapper'>
                    <div class='col s12'>
                      <span class='black-text'>
                        <p>".$client['name']."</p>
                      </span>
                    </div>
                  </div>
                </div>
                </div>";

              }

              }else{

              echo "<div class='offset-m2 l6 offset-l3'>
                <div class='card-panel grey lighten-5 z-depth-1'>
                  <div class='row valign-wrapper'>
                    <div class='col s12'>
                      <span class='black-text'>
                        <p>Pas de client pour le moment</p>
                      </span>
                    </div>
                  </div>
                </div>
              </div>";

              }

            ?>

            </a>

          </div>
        </div>
      </div>

    </div>
</div>