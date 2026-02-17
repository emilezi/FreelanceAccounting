<?php

$Form = new Form();
$User = new User();

if(isset($_POST['submit_edit_password'])){

    if($Form->checkPassword() == 0){

        $User->setUsersPassword();

    }elseif($Form->checkPassword() == 1){

        include("public/pages/error/password_not_identical.php");

    }else{

        include("public/pages/error/field_not_entered.php");

    }
    
}