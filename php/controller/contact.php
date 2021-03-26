<?php 

 include_once('C:\xampp\htdocs\ecole_2\php\model\contact-model.php');
 @session_start(); 

class classcontact{
    //verifier que le client est connecté pour effectué la 
    public function affichercontact(){
        $req = new contact();
        $resultat = $req->getcontact();   
        return $resultat;
    } 
    public function modifiercontact(){
        $req = new contact();
        $req->setcontact();
    }  
   
}
if(isset($_POST['submit'])){

    $classa = new classcontact();
    $classa->modifiercontact();
  }
