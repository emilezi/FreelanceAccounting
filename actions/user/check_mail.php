<?php

$Mail = new Mail();

if(isset($_POST['submit_email'])){

    $Mail->MailVerification();

    include("public/pages/message/check_email_sent.php");

}