<?php 
 
 include(('C:\xampp\htdocs\ecole_2\php\model\admin-model.php'));
 @session_start(); 

class classadmin{
    //verifier que le client est connecté pour effectué la 
    public function afficheradmins(){
        $req = new admin() ;
        $res=   $req->get_admins();
           return $res;
    } 
 
    public function supprimeradmins(){
        $req = new admin() ;
        $req->supprimeradmin();
    }
   
}
if(isset($_POST['supprimer'])){

    $classa = new classadmin();
    $classa->supprimerparent();
  }
