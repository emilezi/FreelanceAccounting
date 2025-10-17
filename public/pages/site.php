<?php

require("class/Service.php");
require("class/Setting.php");
require("class/Client.php");
require("class/Bank.php");

$Service = new Service();
$Setting = new Setting();
$Client = new Client();
$Bank = new Bank();

$bankinfo = $Bank->getBank();
$annualturnover = $Bank->getAnnualTurnover($Setting);
$turnovermax = $Setting->getTurnoverMax();
$startmonthlydate = $Setting->getMonthlyTaxDateStart();
$endmonthlydate = $Setting->getMonthlyTaxDateEnd();
$startquarterlydate = $Setting->getQuarterlyTaxDateStart();
$endquarterlydate = $Setting->getQuarterlyTaxDateEnd();
$turnoverbic1 = $Bank->getTurnoverBIC1($Setting);
$turnoverbic2 = $Bank->getTurnoverBIC2($Setting);
$turnoverbnc = $Bank->getTurnoverBNC($Setting);

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
                  <p>Montant total annuel : <?=$annualturnover?>€</p>
                  <p>Montant BIC-1 : <?=$turnoverbic1?>€</p>
                  <p>Montant BIC-2 : <?=$turnoverbic2?>€</p>
                  <p>Montant BNC : <?=$turnoverbnc?>€</p>
                  <p>Montant maximum annuel  : <?=$turnovermax?>€ hors taxes</p>
                  <?php
                  if($_SESSION['taxation'] === 'month'){
                    echo "<p><b>Début de la prochaine imposition : </b></p>";
                    echo "<p>Date : ".$startmonthlydate."</p>";
                    echo "<p><b>Fin de la prochaine imposition : </b></p>";
                    echo "<p>Date : ".$endmonthlydate."</p>";
                  }elseif($_SESSION['taxation'] === 'quarterly'){
                    echo "<p><b>Début de la prochaine imposition : </b></p>";
                    echo "<p>Date : ".$startquarterlydate."</p>";
                    echo "<p><b>Fin de la prochaine imposition : </b></p>";
                    echo "<p>Date : ".$endquarterlydate."</p>";
                  }
                  ?>
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