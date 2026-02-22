<?php

require 'class/User.php';

$User = new User();


if(isset($_GET['get1']) && !empty($_GET['get1']) && isset($_GET['get2']) && !empty($_GET['get2'])){

        if($User->checkEmailKey() == 0){

            

        }else{

            

        }
    
    }else{
    
        
    
    }