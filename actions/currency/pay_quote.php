<?php

if(isset($_POST['submit_pay'])){

    $Bank->addBank();

    $Bank->addTurnover();

    $Currency->payCurrency();
    
}