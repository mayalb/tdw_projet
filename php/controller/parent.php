<?php 
 
 include(('C:\xampp\htdocs\ecole_2\php\model\parent-model.php'));
 @session_start(); 

class classparent{
    //verifier que le client est connecté pour effectué la 
    public function afficherparent(){
        $req = new parents() ;
        $res=   $req->get_parent();
           return $res;
    } 
    public function afficherprofilenfant(){
    } 
    public function afficher_edt_enfant(){
    }  
    public function afficher_note_enfant(){
    } 
    public function afficher_remarque_enfant(){
    } 
    public function afficher_activities_enfant(){
    } 
   
}
