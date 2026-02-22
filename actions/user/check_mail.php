<?php

$Mail = new Mail();

if(isset($_POST['submit_email'])){

    $Mail->MailVerification();

}