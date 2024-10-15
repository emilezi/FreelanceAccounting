<?php

require("class/Bank.php");

$Bank = new Bank();
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
                    <h5>Trésorerie</h5>
                    <p>Votre montant : <?=$bankinfo['treasury']?>€</p>
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
                    <h5>Déclaration d'impôt :</h5>
                    <p>Prochaine date de déclaration : </p>
                    <p>Montant : </p>
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