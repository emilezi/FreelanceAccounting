<?php
require("actions/start/new_business.php");
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
              <h4>Créez votre nouvelle entreprise</h4>
              <div class='row'>
                <form class='col s12' method='post'>
                  <div class='row'>
                    <div class='input-field col s12'>
                      <input name='first_name' id='first_name' type='text' class='validate'>
                      <label for='first_name'>Prénom</label>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='input-field col s12'>
                      <input name='last_name' id='last_name' type='text' class='validate'>
                      <label for='last_name'>Nom</label>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='input-field col s12'>
                      <input name='identifier' id='identifier' type='text' class='validate'>
                      <label for='identifier'>Identifiant</label>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='input-field col s12'>
                      <input name='email' id='email' type='email' class='validate'>
                      <label for='email'>Email</label>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='input-field col s12'>
                      <input name='phone' id='phone' type='tel' class='validate'>
                      <label for='phone'>Téléphone</label>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='input-field col s12'>
                    <select name='status'>
                      <option value='ei' selected>EI (Entrepreneur individuel, anciennement appelé EIRL)</option>
                      <option value='eurl'>EURL (Entreprise unipersonnelle à responsabilité limitée, possibilité de commutation vers SARL)</option>
                    </select>
                    <label>Status</label>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='input-field col s12'>
                      <input name='SIREN' id='SIREN' type='text' class='validate'>
                      <label for='SIREN'>SIREN</label>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='input-field col s12'>
                      <input name='SIRET' id='SIRET' type='text' class='validate'>
                      <label for='SIRET'>SIRET</label>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='input-field col s12'>
                      <input name='date_creation' id='date_creation' type='date' class='validate'>
                      <label for='date_creation'>Date de création de l'entreprise</label>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='input-field col s12'>
                    <select name='taxation'>
                      <option value='month' selected>Chaque mois</option>
                      <option value='quarterly'>Trimestriel</option>
                    </select>
                    <label>Imposition</label>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='input-field col s12'>
                      <input name='password' id='password' type='password' class='validate'>
                      <label for='password'>Mot de passe</label>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='input-field col s12'>
                      <input name='repassword' id='repassword' type='password' class='validate'>
                      <label for='repassword'>Retaper le mot de passe</label>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='input-field col s6'>
                      <input class='waves-effect waves-light btn' id='submit' type='submit' name='submit' value='Créer le profil' class='validate'>
                    </div>
                  </div>
                </form>
              </div>
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