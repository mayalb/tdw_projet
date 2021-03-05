<?php 
include('C:\xampp\htdocs\ecole_2\php\model\inscription-model.php');
 @session_start(); 

class classinscription{
    public function register_eleve(){
        $req = new Inscription();
        $req->register_eleve();
    } 
    public function register_parent(){
        $req = new Inscription();
        $req->register_parent();
    } 
    public function register_ens(){
        $req = new Inscription();
        $req->register_ens();
    } 
    public function register_admin(){
        $req = new Inscription();
        $req->register_admin();
    } 
  
  
  
   
}
if(isset($_POST['submiteleve'])){
  
    $classa = new classinscription();
    $classa->register_eleve();
  }
  if(isset($_POST['submitparent'])){
  
    $classa = new classinscription();
    $classa->register_parent();
  }
  if(isset($_POST['submitens'])){
  
    $classa = new classinscription();
    $classa->register_ens();
  }
  if(isset($_POST['submitadmin'])){
  
    $classa = new classinscription();
    $classa->register_admin();
  }

