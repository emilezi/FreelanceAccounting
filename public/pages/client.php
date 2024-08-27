<?php
require("class/Client.php");
require("actions/client/add_client.php");
require("actions/client/edit_client.php");
require("actions/client/remove_client.php");

$Client = new Client();

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

    foreach($Client->getClient() as $client) {
        
        echo "<tr>
        <td>".$client['name']."</td>
        <td>".$client['email']."</td>
        <td>".$client['phone']."</td>
        <td>".$client['date']."</td>
        <td></td>
        </tr>";

    }

}else{

    echo "<tr>
        <td>Pas de client pour le moment</td>
        </tr>";

}

echo "</tbody>
    </table>";

echo "<a class='btn btn-floating btn-large waves-effect waves-light red'><i data-target='modal_new' class='material-icons modal-trigger'>add</i></a>";

echo "<div id='modal_new' class='modal modal-fixed-footer'>
    <div class='modal-content'>
    <h4>Nouveau client</h4>
    <form class='col s6' method='post'>
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
    </form>
    </div>
    <div class='modal-footer'>
        <div class='input-field col s6'>
            <input class='modal-close waves-effect waves-green btn-flat' id='submit' type='submit' name='submit' value='Créer le client' class='validate'>
        </div>
        </div>
    </div>";