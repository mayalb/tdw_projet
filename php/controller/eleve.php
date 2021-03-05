<?php 
 
 include(('C:\xampp\htdocs\ecole_2\php\model\eleve-model.php'));
 @session_start(); 

class classeleve{
    //verifier que le client est connecté pour effectué la 
    public function afficheredt(){
    } 
    public function affichernote(){
    }  
    public function afficheractivite(){
    } 
    public function modifieractivite(){
    }
    public function get_students(){
                $req = new eleve() ;
             $res=   $req->get_student();
                return $res;

    } 
    public function supprimereleve()
    {
         $req = new eleve() ;
         $req->supprimereleve();   
    
    }
}
if(isset($_POST['supprimer'])){

    $classa = new classeleve();
    $classa->supprimereleve();
  } 
