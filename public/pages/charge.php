<?php
require("class/Charge.php");
require("class/Bank.php");

$Charge = new Charge();
$Bank = new Bank();

require("actions/charge/add_charge.php");
require("actions/charge/cancel_charge.php");
require("actions/charge/edit_charge.php");
require("actions/charge/validate_charge.php");

echo "<table>
    <thead><tr>
        <th>Nom</th>
        <th>Catégorie</th>
        <th>Prix en €</th>
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
        <td>";
        if($charge['category'] === 'invoice'){
            echo "Facture";
        }elseif($charge['category'] === 'taxation'){
            echo "Imposition";
        }elseif($charge['category'] === 'paybic1'){
            echo "Versement liberatoire BIC-1";
        }elseif($charge['category'] === 'paybic2'){
            echo "Versement liberatoire BIC-2";
        }elseif($charge['category'] === 'paybnc'){
            echo "Versement liberatoire BNC";
        }elseif($charge['category'] === 'training'){
            echo "Formation prof.liberale";
        }
        echo "</td>
        <td>".$charge['price']."€</td>
        <td>".$charge['date']."</td>";
        if($charge['state'] === 'active'){
            echo "<td><a class='waves-effect waves-light btn red modal-trigger' data-target='modal_cancel_".$i."'>Annuler la charge</a><a class='waves-effect waves-light btn modal-trigger' data-target='modal_edit_".$i."'>Modifier</a><a class='waves-effect waves-light btn modal-trigger' data-target='modal_description_".$i."'>Information</a><a class='waves-effect waves-light btn modal-trigger' data-target='modal_validate_".$i."'>Valider la charge</a></td>";
        }else{
            echo "<td><a class='waves-effect waves-light btn modal-trigger' data-target='modal_description_".$i."'>Information</a></td>";
        }
        echo "</tr>";
    
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
    
        echo "<div id='modal_cancel_".$i."' class='modal modal-fixed-footer'>
        <form class='col s6' method='post'>
        <div class='modal-content'>
        <h4>Annuler de la charge</h4>
        <p>Êtes-vous sûr de vouloir annuler la charge sélectionnée ?</p>
        </div>
        <div class='modal-footer'>
            <input class='waves-effect waves-green btn' id='submit_cancel' type='submit' name='submit_cancel' value='Oui' class='validate'>
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
            <input name='price' id='price' type='number' value='".$charge['price']."' class='validate'>
            <label for='price'>Prix</label>
          </div>
        </div>
        <div class='row'>
            <div class='input-field col s12'>
            <textarea name='description' id='description' class='materialize-textarea'>".$charge['description']."</textarea>
            <label for='description'>Description de la charge</label>
            </div>
        </div>
        </div>AND state=:state
        <div class='modal-footer'>
            <input class='waves-effect waves-green btn' id='submit_edit' type='submit' name='submit_edit' value='Modifier la charge' class='validate'>
        </div>
        <input id='value' type='hidden' name='value' value=".$charge['id'].">
        </form>
        </div>";

        echo "<div id='modal_description_".$i."' class='modal modal-fixed-footer'>
        <div class='modal-content'>
            <h4>Informations sur la charge</h4>
            <br/>
            <h6><b>Nom de la charge : </b>".$charge['name']."</h6>
            <br/>
            <h6><b>Catégorie : </b>";
            if($charge['category'] === 'invoice'){
                echo "Facture";
            }elseif($charge['category'] === 'taxation'){
                echo "Imposition";
            }elseif($charge['category'] === 'paybic1'){
                echo "Versement liberatoire BIC-1";
            }elseif($charge['category'] === 'paybic2'){
                echo "Versement liberatoire BIC-2";
            }elseif($charge['category'] === 'paybnc'){
                echo "Versement liberatoire BNC";
            }elseif($charge['category'] === 'training'){
            echo "Formation prof.liberale";
            }
            echo "</h6>
            <br/>
            <h6><b>Prix en € : </b>".$charge['price']."€</h6>
            <br/>
            <h6><b>Statut : </b>";
            if($charge['state'] === 'active'){
            echo "Non validé";
            }elseif($charge['state'] === 'validated'){
            echo "Validé";
            }elseif($charge['state'] === 'cancel'){
            echo "Annulé";
            }
            echo "</h6>
            <br/>
            <h6><b>Description :</b></h6>
            <p>".$charge['description']."</p>
        </div>
        </div>";

        echo "<div id='modal_validate_".$i."' class='modal modal-fixed-footer'>
            <form class='col s6' method='post'>
            <div class='modal-content'>
            <h4>Validation de la charge sélectionnée</h4>
            <p>Êtes-vous sûr de vouloir valider la charge sélectionnée ?</p>
            </div>
            <div class='modal-footer'>
                <input class='waves-effect waves-green btn' id='submit_validate' type='submit' name='submit_validate' value='Oui' class='validate'>
                <input class='modal-close waves-effect waves-green btn red' id='cancel' type='submit' name='cancel' value='Non' class='validate'>
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
          <option value='training' selected>Formation prof.liberale</option>
          <option value='paybic1'>Versement liberatoire BIC-1</option>
          <option value='paybic2'>Versement liberatoire BIC-2</option>
          <option value='paybnc'>Versement liberatoire BNC</option>
          <option value='taxation'>Imposition</option>
          <option value='invoice'>Facture</option>
        </select>
        <label>Catégorie</label>
        </div>
      </div>
    <div class='row'>
        <div class='input-field col s12'>
        <input name='price' id='price' type='number' class='validate'>
        <label for='price'>Prix</label>
        </div>
    </div>
    <div class='row'>
            <div class='input-field col s12'>
            <textarea name='description' id='description' class='materialize-textarea'></textarea>
            <label for='description'>Description de la charge</label>
            </div>
        </div>
    </div>
    <div class='modal-footer'>
        <input class='waves-effect waves-green btn' id='submit' type='submit' name='submit' value='Effectuer la charge' class='validate'>
    </div>
    </form>
    </div>";