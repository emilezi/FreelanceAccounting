<?php

$User = new User();

if(isset($_POST['submit_delete'])){

    if($User->checkUserType() == 0){

        $User->deleteUser();

        session_destroy();

        header('Location: index.php');

    }else{
        
        include("public/pages/error/user_delete.php");
    
    }

}