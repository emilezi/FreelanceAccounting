<?php
require("actions/auth/authentication.php");
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
                    <h3 class='center'>Freelance Accounting</h3>
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
              <h4>Authentification</h4>
              <div class='row'>
                <form class='col s12' method='post'>
                  <div class='row'>
                    <div class='input-field col s12'>
                      <input name='email' id='email' type='email' class='validate'>
                      <label for='email'>Email</label>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='input-field col s12'>
                      <input name='password' id='password' type='password' class='validate'>
                      <label for='password'>Mot de passe</label>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='input-field col s6'>
                      <input class='waves-effect waves-light btn' name='submit' id='submit' type='submit' value='Connexion'>
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
