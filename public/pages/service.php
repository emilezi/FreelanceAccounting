<?php
require("class/Service.php");

$Service = new Service();

require("actions/service/add_service.php");
require("actions/service/edit_service.php");
require("actions/service/delete_service.php");

echo "<table>
    <thead><tr>
        <th>Nom</th>
        <th>Coût par heure :</th>
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
      <td>".$service['date']."</td>
      <td><a class='waves-effect waves-light btn red modal-trigger' data-target='modal_delete_".$i."'>Supprimer</a><a class='waves-effect waves-light btn modal-trigger' data-target='modal_edit_".$i."'>Modifier</a></td>
      </tr>";

    }

}else{

    echo "<tr>
    <td>Pas de service pour le moment</td>
    </tr>";

}

echo "</tbody>
    </table>";

if($Service->getService() != null){

  $i = 0;

    foreach ($Service->getService() as $service) {

      $i = $i + 1;

      echo "<div id='modal_delete_".$i."' class='modal modal-fixed-footer'>
      <form class='col s6' method='post'>
      <div class='modal-content'>
        <h4>Suppression du service</h4>
        <p>Êtes-vous sûr de vouloir supprimer le service sélectionné ?</p>
      </div>
      <div class='modal-footer'>
          <input class='waves-effect waves-green btn' id='submit_delete' type='submit' name='submit_delete' value='Oui' class='validate'>
          <input class='modal-close waves-effect waves-green btn red' id='cancel' type='submit' name='cancel' value='Non' class='validate'>
      </div>
      <input id='value' type='hidden' name='value' value=".$service['id'].">
      </form>
      </div>";

      echo "<div id='modal_edit_".$i."' class='modal modal-fixed-footer'>
      <form class='col s6' method='post'>
      <div class='modal-content'>
      <h4>Nouveau service</h4>
        <div class='row'>
          <div class='input-field col s12'>
            <input name='name' id='name' type='text' value='".$service['name']."' class='validate'>
            <label for='name'>Nom du service</label>
          </div>
        </div>
        <div class='row'>
          <div class='input-field col s12'>
            <input name='costhour' id='costhour' type='text' value='".$service['costhour']."' class='validate'>
            <label for='costhour'>Coût par heure en €</label>
          </div>
        </div>
        <div class='row'>
          <div class='input-field col s12'>
            <textarea name='description' id='description' class='materialize-textarea'>".$service['description']."</textarea>
            <label for='description'>Description du service</label>
          </div>
        </div>
      </div>
      <div class='modal-footer'>
            <input class='modal-close waves-effect waves-green btn' id='submit_edit' type='submit' name='submit_edit' value='Modifier le service' class='validate'>
          </div>
      <input id='value' type='hidden' name='value' value=".$service['id'].">
      </form>
      </div>";

    }

}

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