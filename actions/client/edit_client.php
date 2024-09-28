<?php

$Form = new Form();

if(isset($_POST['submit_edit'])){

    if($Form->checkClient() == 0){

        $Client->editClient();

    }elseif($Form->checkClient() == 1){

        include("public/pages/error/invalid_special_character.php");

    }else{

        include("public/pages/error/field_not_entered.php");

    }
    
}