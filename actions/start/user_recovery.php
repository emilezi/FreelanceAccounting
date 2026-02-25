<?php

require 'class/Form.php';
require 'class/User.php';
require 'class/Mail.php';

$Form = new Form();
$Mail = new Mail();
$User = new User();

if(isset($_POST['submit'])){

    if($Form->checkEmail() == 0){

        if($User->checkUserMail() == 0){

            $Mail->MailRecovery();

            include("public/pages/message/recovery_email_sent.php");

        }else{

            include("public/pages/error/user_not_found.php");

        }

    }elseif($Form->checkEmail() == 1){

        include("public/pages/error/invalid_special_character.php");

    }else{

        include("public/pages/error/field_not_entered.php");

    }
    
}