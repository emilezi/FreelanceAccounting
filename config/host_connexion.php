<?php
/**
    *
    * HTTP_HOST host on which the application is hosted
    *
    * EMAIL_HOST host on which the mail server is hosted
    *
    * This parameter mainly allows the application to configure itself correctly with the address on which it is hosted for sending mail and etc.
    *
    */

define('HTTP_HOST', $_SERVER['HTTP_HOST']);
define('EMAIL_HOST', $_SERVER['HTTP_HOST']);