<?php 

 include('C:\xampp\htdocs\ecole_2\php\model\enseignant-model.php');
 //@session_start(); 

class enseignant_cont{
    //verifier que le client est connecté pour effectué la 


    public function recup_enseignants($type){
        $req = new enseignants();
        if($type=='afficher'){
            $resultat = $req->select();  
            return $resultat; 
        }
      
            if(isset($_POST['ajouens'])){
                $resultat = $req->insert("tdw_projet");  
            }else{
                if(isset($_POST['modifierens'])){

                }else{
                    if(isset($_POST['suppens'])){

                    }
                }
            }  
    } 
    public function afficheredt(){
    } 
    public function setnote(){
    }  
    public function get_enseignant($id){
        $req = new enseignants();
        $resultat= $req->get_ens($id);
        return $resultat;

    }
    public function get_teachers(){
        $req = new enseignants();
        $resultat= $req->get_all_info_teachers();
        return $resultat;
    }
    public function supprimerens(){
        $req = new enseignants();
        $resultat= $req->deleteens();
    }
  
  
  
   
}
if(isset($_POST['supprimer'])){

    $classa = new enseignants();
    $classa->supprimerens();
  } 


