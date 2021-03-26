<?php 

include_once('../model/connexion-model.php');

if(isset($_POST['email']) and isset($_POST['password'])){

      $req = new connexion();
      $req->connect();
          
}
