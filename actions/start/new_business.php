<?php

require 'class/Form.php';
require 'class/User.php';

$Form = new Form();
$User = new User();

if(isset($_POST['submit'])){

    if($Form->newUser() == 0){

        if($Form->checkPassword() == 0){

            $Database -> newTables();

            $User -> firstUser();

        }else{

            include("public/pages/error/password_not_identical.php");

        }

    }elseif($Form->newUser() == 1){

        include("public/pages/error/invalid_special_character.php");

    }else{

        include("public/pages/error/field_not_entered.php");

    }
    
}