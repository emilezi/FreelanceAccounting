<?php
require("class/Service.php");

$Service = new Service();

require("actions/service/add_service.php");
require("actions/service/delete_service.php");

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

  $i = 0;

    foreach ($Service->getService() as $service) {

      $i = $i + 1;
        
      echo "<tr>
      <td>".$service['name']."</td>
      <td>".$service['costhour']."€</td>
      <td>".$service['documents']."</td>
      <td>".$service['date']."</td>
      <td><a class='waves-effect waves-light btn red modal-trigger' data-target='modal_delete_".$i."'>Supprimer</a><a class='waves-effect waves-light btn modal-trigger'>Modifier</a></td>
      </tr>";

      echo "<div id='modal_delete_".$i."' class='modal modal-fixed-footer'>
      <div class='modal-content'>
        <h4>Suppression du service</h4>
        <p>Êtes-vous sûr de vouloir supprimer le service sélectionné ?</p>
      </div>
      <form class='col s6' method='post'>
      <div class='modal-footer'>
          <input class='modal-close waves-effect waves-green btn' id='submit_".$i."' type='submit' name='submit' value='Oui' class='validate'>
          <input class='modal-close waves-effect waves-green btn red' id='cancel' type='submit' name='cancel' value='Non' class='validate'>
      </div>
      </form>
      </div>";

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
    <form class='col s6' method='post'>
    <div class='modal-content'>
    <h4>Nouveau service</h4>
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
      <div class='row'>
        <div class='input-field col s12'>
          <textarea name='description' id='description' class='materialize-textarea'></textarea>
          <label for='description'>Description du service</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
          <input class='modal-close waves-effect waves-green btn' id='submit' type='submit' name='submit' value='Créer le service' class='validate'>
        </div>
    </form>
    </div>";