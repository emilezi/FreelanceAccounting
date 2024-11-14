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
        <td><a class='waves-effect waves-light btn red modal-trigger' data-target='modal_delete_".$i."'>Supprimer</a><a class='waves-effect waves-light btn modal-trigger' data-target='modal_edit_".$i."'>Modifier</a><a class='waves-effect waves-light btn modal-trigger' data-target='modal_description_".$i."'>Information</a></td>
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
          <input name='phone' id='phone' type='tel' value='".$client['phone']."' class='validate'>
          <label for='phone'>Numéro de téléphone</label>
        </div>
      </div>
      <input type='hidden' name='category' value=".$client['category'].">
      <input type='hidden' name='langue' value=".$client['langue'].">
      <input type='hidden' name='country' value=".$client['country'].">
      <div class='row'>
        <div class='input-field col s12'>
          <input name='address' id='address' type='text' value='".$client['address']."' class='validate'>
          <label for='address'>Adresse du client</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='address_supplement' id='address_supplement' type='text' value='".$client['address_supplement']."' class='validate'>
          <label for='address_supplement'>Supplément d'adresse</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='postal_code' id='postal_code' type='text' value='".$client['postal_code']."' class='validate'>
          <label for='postal_code'>Code postal</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='city' id='city' type='text' value='".$client['city']."' class='validate'>
          <label for='city'>Ville</label>
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

    echo "<div id='modal_description_".$i."' class='modal modal-fixed-footer'>
    <div class='modal-content'>
      <h4>Informations sur le client</h4>
      <br/>
      <h6><b>Nom du client : </b>".$client['name']."</h6>
      <br/>
      <h6><b>Adresse email : </b>".$client['email']."</h6>
      <br/>
      <h6><b>Numéro de téléphone : </b>".$client['phone']."</h6>
      <br/>
      <h6><b>Catégorie associée : </b>".$client['category']."</h6>
      <br/>
      <h6><b>Langue : </b>".$client['langue']."</h6>
      <br/>
      <h6><b>Pays : </b>".$client['country']."</h6>
      <br/>
      <h6><b>Adresse du client : </b>".$client['address']."</h6>
      <br/>
      <h6><b>Supplément d'adresse : </b>".$client['address_supplement']."</h6>
      <br/>
      <h6><b>Code postal : </b>".$client['postal_code']."</h6>
      <br/>
      <h6><b>Ville : </b>".$client['city']."</h6>
      <br/>
      <h6><b>Description du client : </b></h6>
      <p>".$client['description']."</p>
    </div>
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
          <input name='phone' id='phone' type='tel' class='validate'>
          <label for='phone'>Numéro de téléphone</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
        <select name='category'>
          <option value='individual' selected>Particulier (client individuel)</option>
        </select>
        <label>Catégorie associée</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
        <select name='langue'>
          <option value='english' selected>Anglais</option>
          <option value='french'>Français</option>
        </select>
        <label>Langue</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
        <select name='country'>
          <option value='germany' selected>Allemagne</option>
          <option value='belgium'>Belgique</option>
          <option value='canada'>Canada</option>
          <option value='espagne'>Espagne</option>
          <option value='united_states'>États-Unis</option>
          <option value='france'>France</option>
          <option value='italy'>Italie</option>
          <option value='luxembourg'>Luxembourg</option>
          <option value='malta'>Malte</option>
          <option value='netherlands'>Pays-Bas</option>
          <option value='portugal'>Portugal</option>
          <option value='united_kingdom'>Royaume-Uni</option>
        </select>
        <label>Pays</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='address' id='address' type='text' class='validate'>
          <label for='address'>Adresse du client</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='address_supplement' id='address_supplement' type='text' class='validate' value='(aucun)'>
          <label for='address_supplement'>Supplément d'adresse</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='postal_code' id='postal_code' type='text' class='validate'>
          <label for='postal_code'>Code postal</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='city' id='city' type='text' class='validate'>
          <label for='city'>Ville</label>
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