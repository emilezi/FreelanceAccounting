<?php
require("class/Client.php");

$Client = new Client();

require("actions/client/add_client.php");
require("actions/client/edit_client.php");
require("actions/client/remove_client.php");

echo "<table>
    <thead><tr>
        <th>Nom</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Ajoutée le :</th>
        <th>Action :</th>
    </tr></thead>
    <tbody>";

if($Client->getClient() != null){

  $i = 0;

    foreach($Client->getClient() as $client) {

      $i = $i + 1;
        
        echo "<tr>
        <td>".$client['name']."</td>
        <td>".$client['email']."</td>
        <td>".$client['phone']."</td>
        <td>".$client['date']."</td>
        <td><a class='waves-effect waves-light btn red modal-trigger' data-target='modal_delete_".$i."'>Supprimer</a><a class='waves-effect waves-light btn modal-trigger' data-target='modal_edit_".$i."'>Modifier</a></td>
        </tr>";

    }

}else{

    echo "<tr>
        <td>Pas de client pour le moment</td>
        </tr>";

}

echo "</tbody>
    </table>";

if($Client->getClient() != null){

  $i = 0;
    
  foreach($Client->getClient() as $client) {

    $i = $i + 1;

    echo "<div id='modal_delete_".$i."' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
      <h4>Suppression du client</h4>
      <p>Êtes-vous sûr de vouloir supprimer le client sélectionné ?</p>
    </div>
    <div class='modal-footer'>
        <input class='waves-effect waves-green btn' id='submit_delete' type='submit' name='submit_delete' value='Oui' class='validate'>
        <input class='modal-close waves-effect waves-green btn red' id='cancel' type='submit' name='cancel' value='Non' class='validate'>
    </div>
    <input id='value' type='hidden' name='value' value=".$client['id'].">
    </form>
    </div>";

    echo "<div id='modal_edit_".$i."' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
    <h4>Modifier le client</h4>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='name' id='name' type='text' value='".$client['name']."' class='validate'>
          <label for='name'>Nom du client</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='email' id='email' type='text' value='".$client['email']."' class='validate'>
          <label for='email'>Adresse email</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='phone' id='phone' type='text' value='".$client['phone']."' class='validate'>
          <label for='phone'>Numéro de téléphone</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <textarea name='description' id='description' class='materialize-textarea'>".$client['description']."</textarea>
          <label for='description'>Description du client</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
          <input class='waves-effect waves-green btn' id='submit_edit' type='submit' name='submit_edit' value='Modifier le client' class='validate'>
      </div>
    <input id='value' type='hidden' name='value' value=".$client['id'].">
    </form>
    </div>";

  }
    
}

echo "<a class='btn btn-floating btn-large waves-effect waves-light red'><i data-target='modal_new' class='material-icons modal-trigger'>add</i></a>";

echo "<div id='modal_new' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
    <h4>Nouveau client</h4>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='name' id='name' type='text' class='validate'>
          <label for='name'>Nom du client</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='email' id='email' type='text' class='validate'>
          <label for='email'>Adresse email</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='phone' id='phone' type='text' class='validate'>
          <label for='phone'>Numéro de téléphone</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <textarea name='description' id='description' class='materialize-textarea'></textarea>
          <label for='description'>Description du client</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
          <input class='waves-effect waves-green btn' id='submit' type='submit' name='submit' value='Créer le client' class='validate'>
      </div>
    </form>
    </div>";