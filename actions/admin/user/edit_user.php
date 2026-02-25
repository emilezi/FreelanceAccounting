<?php

$Form = new Form();
$User = new User();

if(isset($_POST['submit_edit'])){

    if($Form->editUser() == 0){

        if($User->checkEmailPhoneUsers() == 0){

            $User->editUsers();

        }else{

            include("public/pages/error/user_already_email_phone_exists.php");

        }

    }elseif($Form->editUser() == 1){

        include("public/pages/error/invalid_special_character.php");

    }else{

        include("public/pages/error/field_not_entered.php");

    }
    
}