<?php

require("actions/user/user_disconnect.php");
require("actions/user/user_edit.php");

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
                  <h3><?=$_SESSION['first_name']?> <?=$_SESSION['last_name']?></h3>
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
                    <h5>Informations personnelles</h5>
                    <p><b>N° SIREN :</b> <?=$_SESSION['SIREN']?></p>
                    <p><b>N° SIRET :</b> <?=$_SESSION['SIRET']?></p>
                    <?php
                    if($_SESSION['status'] === 'ei'){
                      echo '<p><b>Statut juridique :</b> EI (Entrepreneur individuel)</p>';
                    }elseif($_SESSION['status'] === 'eurl'){
                      echo '<p><b>Statut juridique :</b> EURL (Entreprise unipersonnelle à responsabilité limitée, possibilité de commutation vers SARL)</p>';
                    }else{
                      echo '<p><b>Statut juridique :</b> Nulle</p>';
                    }
                    ?>
                    <p><b>Date de création de l'entreprise :</b> <?=$_SESSION['date_creation']?></p>
                    <?php
                    if($_SESSION['taxation'] === 'month'){
                      echo "<p><b>Période d'imposition :</b> Chaque mois</p>";
                    }elseif($_SESSION['taxation'] === 'quarterly'){
                      echo "<p><b>Période d'imposition :</b> Trimestriel</p>";
                    }else{
                      echo "<p><b>Période d'imposition :</b> Nulle</p>";
                    }
                    ?>
                    <p><b>Identifiant :</b> <?=$_SESSION['identifier']?></p>
                    <p><b>Email :</b> <?=$_SESSION['email']?></p>
                    <p><b>Téléphone :</b> <?=$_SESSION['phone']?></p>
                    <a class='waves-effect waves-light btn modal-trigger' data-target='modal_edit'>Modifier</a><a class='waves-effect waves-light btn red modal-trigger' data-target='modal_disconnect'>Se déconnecter</a>
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

<div id='modal_disconnect' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
      <h4>Se déconnecter</h4>
      <p>Etes-vous sûr de vouloir vous déconnecter ?</p>
    </div>
    <div class='modal-footer'>
        <input class='waves-effect waves-green btn' id='submit_logout' type='submit' name='submit_logout' value='Oui' class='validate'>
        <input class='modal-close waves-effect waves-green btn red' id='cancel' type='submit' name='cancel' value='Non' class='validate'>
    </div>
    </form>
</div>

<div id='modal_edit' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
    <h4>Modifier le profil</h4>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='email' id='email' type='text' value='<?=$_SESSION['email']?>' class='validate'>
          <label for='email'>Adresse email</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='phone' id='phone' type='text' value='<?=$_SESSION['phone']?>' class='validate'>
          <label for='phone'>Numéro de téléphone</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
          <input class='waves-effect waves-green btn' id='submit_edit' type='submit' name='submit_edit' value='Modifier le profil' class='validate'>
      </div>
    </form>
</div>