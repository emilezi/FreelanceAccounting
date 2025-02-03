<?php

require("class/Setting.php");
require("class/User.php");

$Setting = new Setting();
$User = new User();

require("actions/admin/interface/reset.php");
require("actions/admin/date/edit_monthly_start.php");
require("actions/admin/date/edit_monthly_end.php");
require("actions/admin/date/edit_quarterly_start.php");
require("actions/admin/date/edit_quarterly_end.php");
require("actions/admin/rate/edit_bic1_rate.php");
require("actions/admin/rate/edit_bic2_rate.php");
require("actions/admin/rate/edit_bnc_rate.php");
require("actions/admin/rate/edit_bic1_pay.php");
require("actions/admin/rate/edit_bic2_pay.php");
require("actions/admin/rate/edit_bnc_pay.php");
require("actions/admin/rate/edit_protraining_rate.php");

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
                    <h5>Date des prochains paiements d'impôts</h5>
                    <p>Date de début de la déclaration mensuelle : <?=$Setting->getMonthlyTaxDateStart()?></p>
                    <a class='waves-effect waves-light btn modal-trigger' data-target='modal_monthly_start_edit'>Modifier</a>
                    <p>Date de fin de la déclaration mensuelle : <?=$Setting->getMonthlyTaxDateEnd()?></p>
                    <a class='waves-effect waves-light btn modal-trigger' data-target='modal_monthly_end_edit'>Modifier</a>
                    <p>Date de début trimestriel : <?=$Setting->getQuarterlyTaxDateStart()?></p>
                    <a class='waves-effect waves-light btn modal-trigger' data-target='modal_quarterly_start_edit'>Modifier</a>
                    <p>Date de fin trimestriel : <?=$Setting->getQuarterlyTaxDateEnd()?></p>
                    <a class='waves-effect waves-light btn modal-trigger' data-target='modal_quarterly_end_edit'>Modifier</a>
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
                    <p>Versement liberatoire de l'impot sur le revenu (Prestations BIC) : <?=$Setting->getBIC1PayRate()?>%</p>
                    <a class='waves-effect waves-light btn modal-trigger' data-target='modal_bic1_pay_edit'>Modifier</a>
                    <p>Versement liberatoire de l'impot sur le revenu (vente BIC) : <?=$Setting->getBIC2PayRate()?>%</p>
                    <a class='waves-effect waves-light btn modal-trigger' data-target='modal_bic2_pay_edit'>Modifier</a>
                    <p>Versement liberatoire de l'impot sur le revenu (Prestations BNC) : <?=$Setting->getBNCPayRate()?>%</p>
                    <a class='waves-effect waves-light btn modal-trigger' data-target='modal_bnc_pay_edit'>Modifier</a>
                    <p>Formation prof.liberale obligatoire : <?=$Setting->getProfessionalTrainingRate()?>%</p>
                    <a class='waves-effect waves-light btn modal-trigger' data-target='modal_professional_training_edit'>Modifier</a>
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

<div id='modal_monthly_start_edit' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
      <h4>Modifier la date de début</h4>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='monthly_date_start' id='monthly_date_start' type='date' value='<?=$Setting->getMonthlyTaxDateStart()?>' class='validate'>
          <label for='monthly_date_start'>Date de début</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
        <input class='waves-effect waves-green btn' id='submit_monthly_date_start_edit' type='submit' name='submit_monthly_date_start_edit' value='Modifier' class='validate'>
    </div>
    </form>
</div>

<div id='modal_monthly_end_edit' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
      <h4>Modifier la date de fin</h4>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='monthly_date_end' id='monthly_date_end' type='date' value='<?=$Setting->getMonthlyTaxDateEnd()?>' class='validate'>
          <label for='monthly_date_end'>Date de fin</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
        <input class='waves-effect waves-green btn' id='submit_monthly_date_end_edit' type='submit' name='submit_monthly_date_end_edit' value='Modifier' class='validate'>
    </div>
    </form>
</div>

<div id='modal_quarterly_start_edit' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
      <h4>Modifier la date de début</h4>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='quarterly_date_start' id='quarterly_date_start' type='date' value='<?=$Setting->getQuarterlyTaxDateStart()?>' class='validate'>
          <label for='quarterly_date_start'>Date de début</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
        <input class='waves-effect waves-green btn' id='submit_quarterly_date_start_edit' type='submit' name='submit_quarterly_date_start_edit' value='Modifier' class='validate'>
    </div>
    </form>
</div>

<div id='modal_quarterly_end_edit' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
      <h4>Modifier la date de fin</h4>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='quarterly_date_end' id='quarterly_date_end' type='date' value='<?=$Setting->getQuarterlyTaxDateEnd()?>' class='validate'>
          <label for='quarterly_date_end'>Date de fin</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
        <input class='waves-effect waves-green btn' id='submit_quarterly_date_end_edit' type='submit' name='submit_quarterly_date_end_edit' value='Modifier' class='validate'>
    </div>
    </form>
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

<div id='modal_bic1_pay_edit' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
      <h4>Modifier le taux d'imposition</h4>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='bic_pay_1_rate' id='bic_pay_1_rate' type='text' value='<?=$Setting->getBIC1PayRate()?>' class='validate'>
          <label for='bic_pay_1_rate'>Taux d'imposition en %</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
        <input class='waves-effect waves-green btn' id='submit_bic1_pay_rate_edit' type='submit' name='submit_bic1_pay_rate_edit' value='Modifier' class='validate'>
    </div>
    </form>
</div>

<div id='modal_bic2_pay_edit' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
      <h4>Modifier le taux d'imposition</h4>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='bic_pay_2_rate' id='bic_pay_2_rate' type='text' value='<?=$Setting->getBIC2PayRate()?>' class='validate'>
          <label for='bic_pay_2_rate'>Taux d'imposition en %</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
        <input class='waves-effect waves-green btn' id='submit_bic2_pay_rate_edit' type='submit' name='submit_bic2_pay_rate_edit' value='Modifier' class='validate'>
    </div>
    </form>
</div>

<div id='modal_bnc_pay_edit' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
      <h4>Modifier le taux d'imposition</h4>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='bnc_pay_rate' id='bnc_pay_rate' type='text' value='<?=$Setting->getBNCPayRate()?>' class='validate'>
          <label for='bnc_pay_rate'>Taux d'imposition en %</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
        <input class='waves-effect waves-green btn' id='submit_bnc_pay_rate_edit' type='submit' name='submit_bnc_pay_rate_edit' value='Modifier' class='validate'>
    </div>
    </form>
</div>

<div id='modal_professional_training_edit' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
      <h4>Modifier le taux d'imposition</h4>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='professional_training_rate' id='professional_training_rate' type='text' value='<?=$Setting->getProfessionalTrainingRate()?>' class='validate'>
          <label for='professional_training_rate'>Taux d'imposition en %</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
        <input class='waves-effect waves-green btn' id='submit_protraining_rate_edit' type='submit' name='submit_protraining_rate_edit' value='Modifier' class='validate'>
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