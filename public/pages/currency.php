<?php
require("class/Client.php");
require("class/Service.php");
require("class/Currency.php");

$Client = new Client();
$Service = new Service();
$Currency = new Currency();

require("actions/currency/add_quote.php");
require("actions/currency/bill_customer.php");
require("actions/currency/cancel_quote.php");
require("actions/currency/pay_quote.php");

echo "<table>
    <thead><tr>
        <th>Nom</th>
        <th>Date de début :</th>
        <th>Date de fin :</th>
        <th>Nombre d'heures</th>
        <th>Prix</th>
        <th>Documents</th>
        <th>Crée le :</th>
        <th>Action :</th>
    </tr></thead>
    <tbody>";

if($Currency->getCurrency() != null){

    foreach ($Currency->getCurrency() as $currency) {
        
        echo "<tr>
        <td>".$currency['name']."</td>
        <td>".$currency['start_date']."</td>
        <td>".$currency['end_date']."</td>
        <td>".$currency['hours']."</td>
        <td>".$currency['price']."</td>
        <td>".$currency['documents']."</td>
        <td>".$currency['date']."</td>
        <td></td>
        </tr>";

    }

}else{

    echo "<tr>
    <td>Pas de devise pour le moment</td>
    </tr>";

}

echo "</tbody>
    </table>";

echo "<a class='btn btn-floating btn-large waves-effect waves-light red'><i data-target='modal_new' class='material-icons modal-trigger'>add</i></a>";

echo "<div id='modal_new' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
    <h4>Nouvelle devise</h4>";
echo "<div class='row'>
    <div class='input-field col s12'>
    <select>";
    if($Client->getClient() != null){
      echo "<option disabled selected>Nom du client</option>";
      foreach ($Client->getClient() as $client) {
        echo "<option>".$client['name']."</option>";
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
    <select>";
    if($Service->getService() != null){
      echo "<option disabled selected>Nom du service</option>";
      foreach ($Service->getService() as $service) {
        echo "<option>".$service['name']."</option>";
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
          <input name='start_date' id='start_date' type='text' class='datepicker'>
          <label for='start_date'>Date de début</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='end_date' id='end_date' type='text' class='datepicker'>
          <label for='end_date'>Date de fin</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='hours_days' id='hours_days' type='text' class='timepicker'>
          <label for='hours_days'>Nombre d'heures par jour</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='number_days' id='number_days' type='text' class='validate'>
          <label for='number_days'>Nombre de jours</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='documents' id='documents' type='text' class='validate'>
          <label for='documents'>Documents associés</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <textarea name='description' id='description' class='materialize-textarea'></textarea>
          <label for='description'>Description de la devise</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
          <input class='modal-close waves-effect waves-green btn' id='submit' type='submit' name='submit' value='Créer la devise' class='validate'>
      </div>
    </form>
    </div>";