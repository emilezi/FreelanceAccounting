<?php

require 'class/Form.php';
require 'class/User.php';

$Form = new Form();
$User = new User();

if(isset($_POST['submit'])){

    if($Form->Authentication() == 0){

        if($User -> UserLogin() == 0){

            header("Location: index.php");

        }elseif($User -> UserLogin() == 1){

            include("public/pages/error/incorrect_password.php");

        }else{

            include("public/pages/error/user_not_found.php");

        }

    }elseif($Form->Authentication() == 1){

        include("public/pages/error/invalid_special_character.php");

    }else{

        include("public/pages/error/field_not_entered.php");

    }
    
}