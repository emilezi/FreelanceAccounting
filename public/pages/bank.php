<?php

require("class/Setting.php");
require("class/Bank.php");

$Setting = new Setting();
$Bank = new Bank();

$turnovermax = $Setting->getTurnover();
$bankinfo = $Bank->getBank();

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
                    <p>Montant : </p>
                    <p>Montant maximum annuel  : <?=$turnovermax?>€ hors taxes</p>
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
                    <p>Activité achat-vente de marchandises (BIC-1) : <?=$Setting->getBIC1Rate()?>%</p>
                    <p>Prestations de services commerciales et artisanales (BIC-2) : <?=$Setting->getBIC2Rate()?>%</p>
                    <p>Prestations de services et professions libérales (BNC) : <?=$Setting->getBNCRate()?>%</p>
                    <p>Versement liberatoire de l'impot sur le revenu (Prestations BIC) : <?=$Setting->getBIC1PayRate()?>%</p>
                    <p>Versement liberatoire de l'impot sur le revenu (vente BIC) : <?=$Setting->getBIC2PayRate()?>%</p>
                    <p>Versement liberatoire de l'impot sur le revenu (Prestations BNC) : <?=$Setting->getBNCPayRate()?>%</p>
                    <p>Formation prof.liberale obligatoire : <?=$Setting->getProfessionalTrainingRate()?>%</p>
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