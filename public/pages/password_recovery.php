<?php

require 'class/User.php';
require 'class/Form.php';

require 'actions/start/user_password_recovery.php';

$User = new User();


if(isset($_GET['get1']) && !empty($_GET['get1']) && isset($_GET['get2']) && !empty($_GET['get2'])){

        if($User->checkRecoveryKey() == 0){

            echo "<div class='container'>
            <div class='section'>
                
            <div class='row'>

            <div class='col s12 m12'>
            <div class='icon-block'>

            <div class='offset-m2 l6 offset-l3'>
                <div class='card-panel grey lighten-5 z-depth-1'>
                    <div class='row valign-wrapper'>
                    <div class='col s12'>
                        <span class='black-text'>
                            <h3 class='center'>Freelance Accounting</h3>
                        </span>
                    </div>
                    </div>
                </div>
            </div>

            <div class='offset-m2 l6 offset-l3'>
                <div class='card-panel grey lighten-5 z-depth-1'>
                <div class='row valign-wrapper'>
                    <div class='col s12'>
                    <span class='black-text'>
                    <h4>Modification du mot de passe</h4>
                    <form class='col s12' method='post'>
                        <div class='row'>
                            <div class='input-field col s12'>
                            <input name='password' id='password' type='password' class='validate'>
                            <label for='password'>Mot de passe</label>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='input-field col s12'>
                            <input name='repassword' id='repassword' type='password' class='validate'>
                            <label for='repassword'>Retaper le mot de passe</label>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='input-field col s6'>
                            <input class='waves-effect waves-light btn' id='submit' type='submit' name='submit' value='Modifier' class='validate'>
                            </div>
                        </div>
                        </form>
                    </span>
                    </div>
                </div>
                </div>
            </div>

            </div>
            </div>
    
            </div>

            </div>
            </div>
            ";

        }else{

            header('Location: index.php');

        }
    
    }else{
    
        header('Location: index.php');
    
    }