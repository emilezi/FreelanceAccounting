<?php
require("class/Charge.php");

$Charge = new Charge();

require("actions/charge/add_charge.php");
require("actions/charge/edit_charge.php");
require("actions/charge/remove_charge.php");

echo "<table>
    <thead><tr>
        <th>Nom</th>
        <th>Prix</th>
        <th>Crée le :</th>
        <th>Action :</th>
    </tr></thead>
    <tbody>";

if($Charge->getCharge() != null){

    $i = 0;
        
    foreach($Charge->getCharge() as $charge) {
    
        $i = $i + 1;

        echo "<tr>
        <td>".$charge['name']."</td>
        <td>".$charge['price']."</td>
        <td>".$charge['date']."</td>
        <td><a class='waves-effect waves-light btn red modal-trigger' data-target='modal_delete_".$i."'>Supprimer</a><a class='waves-effect waves-light btn modal-trigger' data-target='modal_edit_".$i."'>Modifier</a></td>
        </tr>";
    
    }
        
}else{

    echo "<tr>
        <td>Pas de charge pour le moment</td>
        </tr>";

}

echo "</tbody>
    </table>";

if($Charge->getCharge() != null){

    $i = 0;
        
    foreach($Charge->getCharge() as $charge) {
    
        $i = $i + 1;
    
        echo "<div id='modal_delete_".$i."' class='modal modal-fixed-footer'>
        <form class='col s6' method='post'>
        <div class='modal-content'>
        <h4>Suppression de la charge</h4>
        <p>Êtes-vous sûr de vouloir supprimer la charge sélectionnée ?</p>
        </div>
        <div class='modal-footer'>
            <input class='waves-effect waves-green btn' id='submit_delete' type='submit' name='submit_delete' value='Oui' class='validate'>
            <input class='modal-close waves-effect waves-green btn red' id='cancel' type='submit' name='cancel' value='Non' class='validate'>
        </div>
        <input id='value' type='hidden' name='value' value=".$charge['id'].">
        </form>
        </div>";
    
        echo "<div id='modal_edit_".$i."' class='modal modal-fixed-footer'>
        <form class='col s6' method='post'>
        <div class='modal-content'>
        <h4>Modifier la charge</h4>
        <div class='row'>
            <div class='input-field col s12'>
            <input name='name' id='name' type='text' value='".$charge['name']."' class='validate'>
            <label for='name'>Nom de la charge</label>
            </div>
        </div>
        <input type='hidden' name='category' value=".$charge['category'].">
        <div class='row'>
          <div class='input-field col s12'>
            <input name='price' id='price' type='text' value='".$charge['price']."' class='validate'>
            <label for='price'>Prix</label>
          </div>
        </div>
        </div>
        <div class='modal-footer'>
            <input class='waves-effect waves-green btn' id='submit_edit' type='submit' name='submit_edit' value='Modifier la charge' class='validate'>
        </div>
        <input id='value' type='hidden' name='value' value=".$charge['id'].">
        </form>
        </div>";
    
    }
        
}
    
echo "<a class='btn btn-floating btn-large waves-effect waves-light red'><i data-target='modal_new' class='material-icons modal-trigger'>add</i></a>";
    
echo "<div id='modal_new' class='modal modal-fixed-footer'>
    <form class='col s6' method='post'>
    <div class='modal-content'>
    <h4>Nouvelle charge</h4>
    <div class='row'>
        <div class='input-field col s12'>
        <input name='name' id='name' type='text' class='validate'>
        <label for='name'>Nom de la charge</label>
        </div>
    </div>
    <div class='row'>
        <div class='input-field col s12'>
        <select name='category'>
          <option value='pay' selected>Versement liberatoire</option>
          <option value='invoice'>Facture</option>
        </select>
        <label>Catégorie</label>
        </div>
      </div>
    <div class='row'>
        <div class='input-field col s12'>
        <input name='price' id='price' type='text' class='validate'>
        <label for='price'>Prix</label>
        </div>
    </div>
    </div>
    <div class='modal-footer'>
        <input class='waves-effect waves-green btn' id='submit' type='submit' name='submit' value='Effectuer la charge' class='validate'>
    </div>
    </form>
    </div>";