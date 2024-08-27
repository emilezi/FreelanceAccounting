<?php
require("class/Service.php");
require("actions/service/add_service.php");
require("actions/service/delete_service.php");

$Service = new Service();

echo "<table>
    <thead><tr>
        <th>Nom</th>
        <th>Coût par heure :</th>
        <th>Documents</th>
        <th>Crée le :</th>
        <th>Action :</th>
    </tr></thead>
    <tbody>";

if($Service->getService() != null){

    foreach ($Service->getService() as $service) {
        
        echo "<tr>
        <td>".$service['name']."</td>
        <td>".$service['costhour']."</td>
        <td>".$service['documents']."</td>
        <td>".$service['date']."</td>
        <td></td>
        </tr>";

    }

}else{

    echo "<tr>
    <td>Pas de service pour le moment</td>
    </tr>";

}

echo "</tbody>
    </table>";

echo "<a class='btn btn-floating btn-large waves-effect waves-light red'><i data-target='modal_new' class='material-icons modal-trigger'>add</i></a>";

echo "<div id='modal_new' class='modal modal-fixed-footer'>
    <div class='modal-content'>
    <h4>Nouveau service</h4>
    <form class='col s6' method='post'>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='name' id='name' type='text' class='validate'>
          <label for='name'>Nom du service</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='costhour' id='costhour' type='text' class='validate'>
          <label for='costhour'>Coût par heure en €</label>
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
            <input class='modal-close waves-effect waves-green btn-flat' id='submit' type='submit' name='submit' value='Créer le service' class='validate'>
        </div>
        </div>
    </div>";