<?php

require("class/Service.php");
require("class/Setting.php");
require("class/Client.php");
require("class/Bank.php");

$Service = new Service();
$Setting = new Setting();
$Client = new Client();
$Bank = new Bank();

$turnovermax = $Setting->getTurnover();
$bankinfo = $Bank->getBank();

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

        <a href='index.php?link=bank'>

        <div class='offset-m2 l6 offset-l3'>
          <div class='card-panel grey lighten-5 z-depth-1'>
            <div class='row valign-wrapper'>
              <div class='col s12'>
                <span class='black-text'>
                  <p><b>Trésorerie :</b> <?=$bankinfo['treasury']?>€</p>
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
                  <p><b>Chiffre d'affaire :</b></p>
                  <p>Montant : </p>
                  <p>Montant maximum annuel  : <?=$turnovermax?>€ hors taxes</p>
                </span>
              </div>
            </div>
          </div>
        </div>

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