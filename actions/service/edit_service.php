<?php

$Form = new Form();

if(isset($_POST['submit_edit'])){

    if($Form->checkService() == 0){

        $Service->editService();

    }elseif($Form->checkService() == 1){

        include("public/pages/error/invalid_special_character.php");

    }else{

        include("public/pages/error/field_not_entered.php");

    }
    
}