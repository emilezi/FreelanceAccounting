<?php

require 'class/Form.php';

$Form = new Form();

if(isset($_POST['submit'])){

    if($Form->checkClient() == 0){

        $Client->addClient();

    }elseif($Form->checkClient() == 1){

        include("public/pages/error/invalid_special_character.php");

    }else{

        include("public/pages/error/field_not_entered.php");

    }
    
}