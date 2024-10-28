<?php

require("class/Application.php");
require("class/Setting.php");
require("class/User.php");

$Application = new Application();
$Setting = new Setting();
$User = new User();

require("actions/admin/interface/reset.php");
require("actions/admin/rate/edit_bic1_rate.php");
require("actions/admin/rate/edit_bic2_rate.php");
require("actions/admin/rate/edit_bnc_rate.php");

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
                    <h5>Taux d'imposition des activités en %</h5>
                    <p>Pour des raisons juridiques les taux doit être conforme au statut micro entrepreneur.</p>
                    <p>Les modifications sont exclusivement réservées en cas de changement imposé par l'évolution du statut</p>
                    <p>Activité achat-vente de marchandises (BIC-1) : <?=$Setting->getBIC1Rate()?>%</p>
                    <a class='waves-effect waves-light btn modal-trigger' data-target='modal_bic1_edit'>Modifier</a>
                    <p>Prestations de services commerciales et artisanales (BIC-2) : <?=$Setting->getBIC2Rate()?>%</p>
                    <a class='waves-effect waves-light btn modal-trigger' data-target='modal_bic2_edit'>Modifier</a>
                    <p>Prestations de services et professions libérales (BNC) : <?=$Setting->getBNCRate()?>%</p>
                    <a class='waves-effect waves-light btn modal-trigger' data-target='modal_bnc_edit'>Modifier</a>
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

<div id='modal_bic1_edit' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
      <h4>Modifier le taux d'imposition</h4>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='bic_1_rate' id='bic_1_rate' type='text' value='<?=$Setting->getBIC1Rate()?>' class='validate'>
          <label for='bic_1_rate'>Taux d'imposition en %</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
        <input class='waves-effect waves-green btn' id='submit_bic1_rate_edit' type='submit' name='submit_bic1_rate_edit' value='Modifier' class='validate'>
    </div>
    </form>
</div>

<div id='modal_bic2_edit' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
      <h4>Modifier le taux d'imposition</h4>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='bic_2_rate' id='bic_2_rate' type='text' value='<?=$Setting->getBIC2Rate()?>' class='validate'>
          <label for='bic_2_rate'>Taux d'imposition en %</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
        <input class='waves-effect waves-green btn' id='submit_bic2_rate_edit' type='submit' name='submit_bic2_rate_edit' value='Modifier' class='validate'>
    </div>
    </form>
</div>

<div id='modal_bnc_edit' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
      <h4>Modifier le taux d'imposition</h4>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='bnc_rate' id='bnc_rate' type='text' value='<?=$Setting->getBNCRate()?>' class='validate'>
          <label for='bnc_rate'>Taux d'imposition en %</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
        <input class='waves-effect waves-green btn' id='submit_bnc_rate_edit' type='submit' name='submit_bnc_rate_edit' value='Modifier' class='validate'>
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