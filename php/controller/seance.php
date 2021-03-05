<?php 
//  include_once('./model/seance-model.php');
 include(('C:\xampp\htdocs\ecole_2\php\model\seance-model.php'));
 class gestionseance{
     public function ajou_seance(){
      
            $req = new seance();
            $req->ajouter();
     }
     public function afficherseance(){
        $req = new seance();
       $resultat= $req->getseance();
       return $resultat;

     }
     public function afficher_seance_by_class_id($id){
        $req = new seance();
       $resultat= $req->get_seance_by_class_id($id);
       return $resultat;

     }
     public function get_seance_by_ens_id_day($id,$day){
        $req = new seance();
        $resultat= $req->get_seance_by_ens_id_day($id,$day);
        return $resultat;
     }
     public function afficher_seance_by_ens_id($id){
        $req = new seance();
       $resultat= $req->get_seance_by_ens_id($id);
       return $resultat;

     }
     public function get_seance_by_class_id_day($id,$day){
        $req = new seance();
        $resultat= $req->get_seance_by_class_id_day($id,$day);
        return $resultat;
     }

     public function supprimerseance()
     {
          $req = new seance();
          $req->supprimer();   
     
     }
 }
 if (isset($_POST['submit3']) ){
    $req = new  gestionseance();
    $req->ajou_seance();

}
if(isset($_POST['supprimer'])){
    $classa = new gestionseance();
    $classa->supprimerseance();
  }

   

   
        
  
      
   





