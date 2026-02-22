<?php
/**
    *
    * This file contains all the function calls concerning the verification of the database, the verification of the active user and contains all the redirections of the application
    *
    */

session_start();

include 'public/site/high_page.php';

$Database = new Database();

if($Database->setConnection() == 0) {

    if($Database->setDatabase() == 0) {

        if($Database->setTables() == 0) {

			$Session = new Session();

			if($Session->UserSession() == 0) {

				if(!isset($_GET['link'])){
					$_GET['link'] = 'site';
				}

				$link = $_GET['link'];

				include("public/site/nav_bar.php");

				if($_SESSION['type'] == 'admin'){

				switch($link){
					case 'mail_verification':{
						include("public/pages/mail_verification.php");
						break;
					}
					case 'admin':{
						include("public/pages/admin.php");
						break;
					}
					case 'bank':{
						include("public/pages/bank.php");
						break;
					}
					case 'charge':{
						include("public/pages/charge.php");
						break;
					}
					case 'client':{
						include("public/pages/client.php");
						break;
					}
					case 'currency':{
						include("public/pages/currency.php");
						break;
					}
					case 'business':{
						include("public/pages/business.php");
						break;
					}
					case 'service':{
						include("public/pages/service.php");
						break;
					}
					case 'user':{
						include("public/pages/user.php");
						break;
					}
					default :{
						include("public/pages/site.php");
						break;
					}
				}

				}else{

					switch($link){
					case 'mail_verification':{
						include("public/pages/mail_verification.php");
						break;
					}
					case 'bank':{
						include("public/pages/bank.php");
						break;
					}
					case 'charge':{
						include("public/pages/charge.php");
						break;
					}
					case 'client':{
						include("public/pages/client.php");
						break;
					}
					case 'currency':{
						include("public/pages/currency.php");
						break;
					}
					case 'business':{
						include("public/pages/business.php");
						break;
					}
					case 'service':{
						include("public/pages/service.php");
						break;
					}
					case 'user':{
						include("public/pages/user.php");
						break;
					}
					default :{
						include("public/pages/site.php");
						break;
					}
				}

				}

				

			}elseif($Session->UserSession() == 1){

				if(!isset($_GET['link'])){
					$_GET['link'] = 'site';
				}

				$link = $_GET['link'];

				switch($link){
					case 'account_recovery':{
						include("public/pages/account_recovery.php");
						break;
					}
					case 'password_recovery':{
						include("public/pages/password_recovery.php");
						break;
					}
					default :{
						include("public/pages/authentication.php");
						break;
					}
				}

			}elseif($Session->UserSession() == 2) {

				session_destroy();

				header('Location: index.php');

			}elseif($Session->UserSession() == 3) {

				session_destroy();

				header('Location: index.php');

			}

		}else{

			include("public/pages/startup/business.php");

		}

	}else{

		include("public/pages/startup/database.php");

	}

}else{

	include("public/pages/error/connection.php");

}

include 'public/site/down_page.php';