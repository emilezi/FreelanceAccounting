<?php

require("class/Setting.php");
require("class/Bank.php");

$Setting = new Setting();
$Bank = new Bank();

$turnovermax = $Setting->getTurnover();
$startmonthlydate = $Setting->getMonthlyTaxDateStart();
$endmonthlydate = $Setting->getMonthlyTaxDateEnd();
$startquarterlydate = $Setting->getQuarterlyTaxDateStart();
$endquarterlydate = $Setting->getQuarterlyTaxDateEnd();
$bankinfo = $Bank->getBank();
$turnover = $Bank->getAnnualTurnover();
$amountbic1 = $Bank->getAmountBIC1($Setting);
$amountbic2 = $Bank->getAmountBIC2($Setting);
$amountbnc = $Bank->getAmountBNC($Setting);

?>

<div class="container">
    <div class="section">
      
    <div class="row">

        <div class="col s12 m12">
        <div class="icon-block">

        <div class='offset-m2 l6 offset-l3'>
          <div class='card-panel grey lighten-5 z-depth-1'>
            <div class='row valign-wrapper'>
              <div class='col s12'>
                <span class='black-text'>
                    <h3>Banque</h3>
                    <p>Montant de la trésorerie : <?=$bankinfo['treasury']?>€</p>
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
                    <h5>Chiffre d'affaire :</h5>
                    <p>Montant total : <?=$bankinfo['turnover_excluding_tax']?>€</p>
                    <p>Montant annuel : <?=$turnover?>€</p>
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

        <div class='offset-m2 l6 offset-l3'>
          <div class='card-panel grey lighten-5 z-depth-1'>
            <div class='row valign-wrapper'>
              <div class='col s12'>
                <span class='black-text'>
                    <h5>Taux d'imposition actuel</h5>
                    <p><b>Activité achat-vente de marchandises (BIC-1) : <?=$Setting->getBIC1Rate()?>%</b></p>
                    <p>Montant à déclarer : <?=$amountbic1?>€</p>
                    <p><b>Prestations de services commerciales et artisanales (BIC-2) : <?=$Setting->getBIC2Rate()?>%</b></p>
                    <p>Montant à déclarer : <?=$amountbic2?>€</p>
                    <p><b>Prestations de services et professions libérales (BNC) : <?=$Setting->getBNCRate()?>%</b></p>
                    <p>Montant à déclarer : <?=$amountbnc?>€</p>
                    <p><b>Versement liberatoire de l'impot sur le revenu (Prestations BIC) : <?=$Setting->getBIC1PayRate()?>%</b></p>
                    <p>Montant à déclarer :</p>
                    <p><b>Versement liberatoire de l'impot sur le revenu (vente BIC) : <?=$Setting->getBIC2PayRate()?>%</b></p>
                    <p>Montant à déclarer :</p>
                    <p><b>Versement liberatoire de l'impot sur le revenu (Prestations BNC) : <?=$Setting->getBNCPayRate()?>%</b></p>
                    <p>Montant à déclarer :</p>
                    <p><b>Formation prof.liberale obligatoire : <?=$Setting->getProfessionalTrainingRate()?>%</b></p>
                    <p>Montant à déclarer :</p>
                </span>
              </div>
            </div>
          </div>
        </div>
            
        </div>
        </div>
    
    </div>

    </div>
</div>