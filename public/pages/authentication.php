<?php
require("actions/auth/authentication.php");
?>

<div class='row'>
    <form class='col s12' method='post'>
      <div class='row'>
        <div class='input-field col s3'>
          <input name='email' id='email' type='email' class='validate'>
          <label for='email'>Email</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s3'>
          <input name='password' id='password' type='password' class='validate'>
          <label for='password'>Mot de passe</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s6'>
          <input class='waves-effect waves-light btn' name='submit' id='submit' type='submit'>
        </div>
      </div>
    </form>
  </div>