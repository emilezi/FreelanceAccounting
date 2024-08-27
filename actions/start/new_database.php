<?php

if(isset($_POST['submit'])){

    $Database -> newDatabase();

    header('Location: index.php');
    
}