<?php
require("class/Client.php");
require("class/Service.php");
require("class/Currency.php");

$Client = new Client();
$Service = new Service();
$Currency = new Currency();

$date_array = getdate();
$date = $date_array['year']."-".$date_array['mon']."-".$date_array['mday']." min=".$date_array['year']."-".$date_array['mon']."-".$date_array['mday'];

require("actions/currency/add_quote.php");
require("actions/currency/cancel_quote.php");

echo "<table>
    <thead><tr>
        <th>Nom du client</th>
        <th>Nom du service</th>
        <th>Date de début :</th>
        <th>Date de fin :</th>
        <th>Nombre d'heures/Jour</th>
        <th>Nombre de jours</th>
        <th>Crée le :</th>
        <th>Action :</th>
    </tr></thead>
    <tbody>";

if($Currency->getCurrency() != null){

  $i = 0;

    foreach ($Currency->getCurrency() as $currency) {

        $i = $i + 1;
        
        echo "<tr>
        <td>".$currency['customer_name']."</td>
        <td>".$currency['service_name']."</td>
        <td>".$currency['start_date']."</td>
        <td>".$currency['end_date']."</td>
        <td>".$currency['hours_days']."</td>
        <td>".$currency['number_days']."</td>
        <td>".$currency['date']."</td>";
        if($currency['state'] === 'active'){
          echo "<td><a class='waves-effect waves-light btn red modal-trigger' data-target='modal_delete_".$i."'>Annuler la facture</a><a class='waves-effect waves-light btn modal-trigger' data-target='modal_edit_".$i."'>Finaliser le paiement</a></td>";
        }elseif($currency['state'] === 'cancel'){
          echo "<td><p>Annulé</p></td>";
        }
        echo "<td></td>
        </tr>";

    }

}else{

    echo "<tr>
    <td>Pas de facture pour le moment</td>
    </tr>";

}

echo "</tbody>
    </table>";

if($Currency->getCurrency() != null){

  $i = 0;

    foreach($Currency->getCurrency() as $currency) {

      $i = $i + 1;

      echo "<div id='modal_delete_".$i."' class='modal modal-fixed-footer'>
      <form class='col s6' method='post'>
      <div class='modal-content'>
        <h4>Annuler la facture sélectionner</h4>
        <p>Êtes-vous sûr de vouloir annuler la facture sélectionné ?</p>
      </div>
      <div class='modal-footer'>
          <input class='waves-effect waves-green btn' id='submit_delete' type='submit' name='submit_delete' value='Oui' class='validate'>
          <input class='modal-close waves-effect waves-green btn red' id='cancel' type='submit' name='cancel' value='Non' class='validate'>
      </div>
      <input id='value' type='hidden' name='value' value=".$currency['id'].">
      </form>
      </div>";

    }

}

echo "<a class='btn btn-floating btn-large waves-effect waves-light red'><i data-target='modal_new' class='material-icons modal-trigger'>add</i></a>";

echo "<div id='modal_new' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
    <h4>Nouvelle facture</h4>";
echo "<div class='row'>
    <div class='input-field col s12'>
    <select name='customer_name'>";
    if($Client->getClient() != null){
        echo "<option disabled selected>Nom du client</option>";
      foreach ($Client->getClient() as $client) {
        echo "<option value='".$client['name']."'>".$client['name']."</option>";
      }
    }else{
      echo "<option disabled selected>Pas de client</option>";
    }
echo "</select>
    <label>Nom du client</label>
    </div>
    </div>
    <div class='row'>
    <div class='input-field col s12'>
    <select name='service_name'>";
    if($Service->getService() != null){
        echo "<option disabled selected>Nom du service</option>";
      foreach ($Service->getService() as $service) {
        echo "<option value='".$service['name']."'>".$service['name']."</option>";
      }
    }else{
      echo "<option disabled selected>Pas de service</option>";
    }
echo "</select>
    <label>Nom du service associé</label>
    </div>
    </div>";
echo "<div class='row'>
        <div class='input-field col s12'>
          <input name='start_date' id='start_date' type='date' value=".$date.">
          <label for='start_date'>Date de début</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='end_date' id='end_date' type='date' value=".$date.">
          <label for='end_date'>Date de fin</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='hours_days' id='hours_days' type='time' min='00:00' max='12:00' value='00:00'>
          <label for='hours_days'>Nombre d'heures par jour</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='number_days' id='number_days' type='number' class='validate'>
          <label for='number_days'>Nombre de jours</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <textarea name='description' id='description' class='materialize-textarea'></textarea>
          <label for='description'>Description de la facture</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
          <input class='modal-close waves-effect waves-green btn' id='submit' type='submit' name='submit' value='Créer la facture' class='validate'>
      </div>
    </form>
    </div>";