<?php

if(isset($_POST['submit_validate'])){

    $Bank->withdrawBank();

    $Charge->validateCharge();
    
}