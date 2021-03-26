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
    public function get_notes_child($id_child){
        $req = new parents() ;
        $res=   $req->get_notes_child($id_child);
        return $res;

    }
    public function afficher_remarque_enfant(){
    } 
    public function afficher_activities_enfant(){
    } 
    public function supprimerparent(){
        $req = new parents() ;
        $req->supprimereparent();
    }
    public function check_user(){
             if(isset($_SESSION['mail_parent']) && isset($_SESSION['mdp_parent']))
             {
                 unset($_COOKIE['type']);
             }else{
                 setcookie("type",'Parent',time()+3600*2,'/');
                header("Location: ./connexion-view.php");

             }
     }
     

     public function get_credentials_parent($email,$mdp){
           $req = new parents() ;
           return $req->get_credentials_parent_table($email,$mdp);
           
     }
     public function get_classe($id_child){
        $req = new parents() ;
        $res=   $req->get_classe($id_child);
       return $res;
}
    public function recup_article($type){
    $req = new parents();
    $resultat = array_reverse($req->getarticle($type)); 
    $datas=array();
    $i=0;
    foreach ($resultat as $key => $value) {
     
        $resultat[$key]['description']=substr($value['description'], 0,20);
        $resultat[$key]['lien_image']=substr($value['lien_image'],3);
        $datas[]=$resultat[$key];
     
    
    }
    return $datas;
   } 
  
}
if(isset($_POST['supprimer'])){

    $classa = new classparent();
    $classa->supprimerparent();
  }
if(isset($_POST['dico'])){
     unset($_SESSION['mail_parent']);
     unset($_SESSION['mdp_parent']);
     header("Location: ../connexion-view.php");
} 
