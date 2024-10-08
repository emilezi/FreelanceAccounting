<?php

if(isset($_POST['submit_logout'])){

    session_destroy();

    header('Location: index.php');

}