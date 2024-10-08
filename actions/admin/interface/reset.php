<?php

if(isset($_POST['submit_reset'])){

    $Database -> deleteDatabase();

    header('Location: index.php');
    
}