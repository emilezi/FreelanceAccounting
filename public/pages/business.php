<?php
require("class/Business.php");

$Business = new Business();

require("actions/business/add_business.php");
require("actions/business/edit_business.php");
require("actions/business/remove_business.php");

echo "<table>
    <thead><tr>
        <th>Nom de l'entreprise</th>
        <th>Nom commercial</th>
        <th>N° SIRET</th>
        <th>Numéro de TVA</th>
        <th>Pays</th>
        <th>Ajoutée le :</th>
        <th>Action :</th>
    </tr></thead>
    <tbody>";

if($Business->getBusiness() != null){

  $i = 0;

    foreach($Business->getBusiness() as $business) {

      $i = $i + 1;
        
        echo "<tr>
        <td>".$business['company_name']."</td>
        <td>".$business['trade_name']."</td>
        <td>".$business['SIRET']."</td>
        <td>".$business['vat_number']."</td>
        <td>".$business['country']."</td>
        <td>".$business['date']."</td>
        <td><a class='waves-effect waves-light btn red modal-trigger' data-target='modal_delete_".$i."'>Supprimer</a><a class='waves-effect waves-light btn modal-trigger' data-target='modal_edit_".$i."'>Modifier</a><a class='waves-effect waves-light btn modal-trigger' data-target='modal_description_".$i."'>Information</a></td>
        </tr>";

    }

}else{

    echo "<tr>
        <td>Pas d'entreprise pour le moment</td>
        </tr>";

}

echo "</tbody>
    </table>";

if($Business->getBusiness() != null){

  $i = 0;
    
  foreach($Business->getBusiness() as $business) {

    $i = $i + 1;

    echo "<div id='modal_delete_".$i."' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
      <h4>Suppression de l'entreprise</h4>
      <p>Êtes-vous sûr de vouloir supprimer l'entreprise sélectionné ?</p>
    </div>
    <div class='modal-footer'>
        <input class='waves-effect waves-green btn' id='submit_delete' type='submit' name='submit_delete' value='Oui' class='validate'>
        <input class='modal-close waves-effect waves-green btn red' id='cancel' type='submit' name='cancel' value='Non' class='validate'>
    </div>
    <input id='value' type='hidden' name='value' value=".$business['id'].">
    </form>
    </div>";

    echo "<div id='modal_edit_".$i."' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
    <h4>Modifier l'entreprise</h4>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='company_name' id='company_name' type='text' value='".$business['company_name']."' class='validate'>
          <label for='company_name'>Nom de l'entreprise</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='trade_name' id='trade_name' type='text' value='".$business['trade_name']."' class='validate'>
          <label for='trade_name'>Nom commercial</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='SIRET' id='SIRET' type='text' value='".$business['SIRET']."' class='validate'>
          <label for='SIRET'>N° SIRET</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='vat_number' id='vat_number' type='text' value='".$business['vat_number']."' class='validate'>
          <label for='vat_number'>Numéro de TVA</label>
        </div>
      </div>
      <input type='hidden' name='langue' value=".$business['langue'].">
      <input type='hidden' name='country' value=".$business['country'].">
      <div class='row'>
        <div class='input-field col s12'>
          <input name='address' id='address' type='text' value='".$business['address']."' class='validate'>
          <label for='address'>Adresse de l'entreprise</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='address_supplement' id='address_supplement' type='text' value='".$business['address_supplement']."' class='validate'>
          <label for='address_supplement'>Supplément d'adresse</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='postal_code' id='postal_code' type='text' value='".$business['postal_code']."' class='validate'>
          <label for='postal_code'>Code postal</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='city' id='city' type='text' value='".$business['city']."' class='validate'>
          <label for='city'>Ville</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <textarea name='description' id='description' class='materialize-textarea'>".$business['description']."</textarea>
          <label for='description'>Description de l'entreprise</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
          <input class='waves-effect waves-green btn' id='submit_edit' type='submit' name='submit_edit' value='Modifier' class='validate'>
      </div>
    <input id='value' type='hidden' name='value' value=".$business['id'].">
    </form>
    </div>";

    echo "<div id='modal_description_".$i."' class='modal modal-fixed-footer'>
    <div class='modal-content'>
      <h4>Informations sur l'entreprise</h4>
      <br/>
      <h6><b>Nom de l'entreprise : </b>".$business['company_name']."</h6>
      <br/>
      <h6><b>Nom commercial : </b>".$business['trade_name']."</h6>
      <br/>
      <h6><b>SIRET : </b>".$business['SIRET']."</h6>
      <br/>
      <h6><b>Numéro de TVA : </b>".$business['vat_number']."</h6>
      <br/>
      <h6><b>Langue : </b>".$business['langue']."</h6>
      <br/>
      <h6><b>Pays : </b>".$business['country']."</h6>
      <br/>
      <h6><b>Adresse de l'entreprise : </b>".$business['address']."</h6>
      <br/>
      <h6><b>Supplément d'adresse : </b>".$business['address_supplement']."</h6>
      <br/>
      <h6><b>Code postal : </b>".$business['postal_code']."</h6>
      <br/>
      <h6><b>Ville : </b>".$business['city']."</h6>
      <br/>
      <h6><b>Description de l'entreprise : </b></h6>
      <p>".$business['description']."</p>
    </div>
    </div>";

  }
    
}

echo "<a class='btn btn-floating btn-large waves-effect waves-light red'><i data-target='modal_new' class='material-icons modal-trigger'>add</i></a>";

echo "<div id='modal_new' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
    <h4>Nouvelle entreprise</h4>
    <div class='row'>
        <div class='input-field col s12'>
          <input name='company_name' id='company_name' type='text' class='validate'>
          <label for='company_name'>Nom de l'entreprise</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='trade_name' id='trade_name' type='text' class='validate'>
          <label for='trade_name'>Nom commercial</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='SIRET' id='SIRET' type='text' class='validate'>
          <label for='SIRET'>N° SIRET</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
          <input name='vat_number' id='vat_number' type='text' class='validate'>
          <label for='vat_number'>Numéro de TVA</label>
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
          <label for='address'>Adresse de l'entreprise</label>
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
          <label for='description'>Description de l'entreprise</label>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
          <input class='waves-effect waves-green btn' id='submit' type='submit' name='submit' value='Ajouter' class='validate'>
      </div>
    </form>
    </div>";