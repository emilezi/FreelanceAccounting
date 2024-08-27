<?php
require("class/Currency.php");
require("actions/currency/add_quote.php");
require("actions/currency/bill_customer.php");
require("actions/currency/cancel_quote.php");
require("actions/currency/pay_quote.php");

$Currency = new Currency();

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
    <div class='modal-content'>
    <h4>Nouvelle devise</h4>
    <form class='col s6' method='post'>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='customer_name' id='customer_name' type='text' class='validate'>
          <label for='customer_name'>Nom du client</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='service_name' id='name' type='text' class='validate'>
          <label for='service_name'>Nom du service associé</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='start_date' id='start_date' type='text' class='validate datepicker'>
          <label for='start_date'>Date de début</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='end_date' id='end_date' type='text' class='validate datepicker'>
          <label for='end_date'>Date de fin</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='hours_days' id='hours_days' type='text' class='validate timepicker'>
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
    </form>
    </div>
    <div class='modal-footer'>
        <div class='input-field col s6'>
            <input class='modal-close waves-effect waves-green btn-flat' id='submit' type='submit' name='submit' value='Créer la devise' class='validate'>
        </div>
        </div>
    </div>";