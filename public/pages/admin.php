<?php

require("class/Application.php");
require("class/Setting.php");
require("class/User.php");

$Application = new Application();
$Setting = new Setting();
$User = new User();

require("actions/admin/interface/reset.php");
require("actions/admin/tax/edit_tax.php");

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
                  <h3>Administration</h3>
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
                    <h5>Applications</h5>
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
                    <h5>Utilisateurs</h5>
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
                    <h5>Imposition</h5>
                    <p>Pourcentage du taux d'imposition : <?=$Setting->getTaxPercentage()?>%</p>
                    <a class='waves-effect waves-light btn modal-trigger' data-target='modal_tax_edit'>Modifier le taux d'imposition</a>
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
                    <h5>Réinitialisation</h5>
                    <p>Réinitialiser les paramètres de l'interface en état d'usine</p>
                    <a class='waves-effect waves-light btn modal-trigger' data-target='modal_reset'>Réinitialiser les paramètres</a>
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

<div id='modal_tax_edit' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
      <h4>Modifier le taux d'imposition</h4>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='tax_value' id='tax_value' type='text' value='<?=$Setting->getTaxPercentage()?>' class='validate'>
          <label for='tax_value'>Taux d'imposition en %</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
        <input class='waves-effect waves-green btn' id='submit_tax_edit' type='submit' name='submit_tax_edit' value='Modifier' class='validate'>
    </div>
    </form>
</div>

<div id='modal_reset' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
      <h4>Réinitialiser les paramètres</h4>
      <p>Êtes-vous sûr de vouloir réinitialiser les paramètres d’interface à l’état d’usine ?</p>
    </div>
    <div class='modal-footer'>
        <input class='waves-effect waves-green btn' id='submit_reset' type='submit' name='submit_reset' value='Oui' class='validate'>
        <input class='modal-close waves-effect waves-green btn red' id='cancel' type='submit' name='cancel' value='Non' class='validate'>
    </div>
    </form>
</div>