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
     public function get_notes_eleve($id){
      $req = new eleve() ;
      $res=   $req->get_notes_eleve($id);
         return $res;
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
    public function get_credentials($email,$mdp)
    {
         $req = new eleve() ;
         return $req->get_credentials_eleve($email,$mdp);   
     
    }
    public function get_credentials_eleve($id)
    {
         $req = new eleve() ;
         return $req->get_credentials_eleve_table($id);   
    }

    public function check_user(){
     if(isset($_SESSION['mail_eleve']) && isset($_SESSION['mdp_eleve'])){
         
         unset($_COOKIE['type']);
     }else{
        setcookie("type",'élève',time()+3600*2,'/');
        header("Location: ./connexion-view.php");

     }
   }
   public function recup_article($type){
    $req = new eleve();
    $resultat = array_reverse($req->getarticle($type)); 
    $datas=array();
    $i=0;
    foreach ($resultat as $key => $value) {
      if($i<4):
        $resultat[$key]['description']=substr($value['description'], 0,20);
        $resultat[$key]['lien_image']=substr($value['lien_image'],3);
        $datas[]=$resultat[$key];
      else:
        break;
      endif;
      $i++;
    }
    return $datas;
   } 
   public function print_tabled($class)
    {
         $req = new eleve() ;
         return $req->print_tb($class);   
     
    }
    public function days($day_ens){
          switch ($day_ens){
           case 'samedi':
             return 0;
           break;
           case 'dimanche':
             return 1;
           break;
           case 'lundi':
            return 2;
           break;
           case 'mardi':
            return 3;
           break;
           case 'mercredi':
           return 4;
           break;
           case 'jeudi': 
            return 5;
           break;
           case 'vendredi':
            return 6;
           break;    

           } }
    public function TD_counter($day,$seance,$nom){
           $data ="<tr style='background-color:white'><td>".$seance."</td>";
           if($nom=='0'):
            $nom='';
           endif;
           for($i=0;$i<7;$i++){
             if($i==$this->days($day)):
              $data.="<td>".$nom."</td>";
             else:
              $data.="<td></td>";
             endif;
           }
           return $data;
        }
   

}
if(isset($_POST['supprimer'])){

    $classa = new classeleve();
    $classa->supprimereleve();
  } 
if(isset($_POST['dico'])){
     unset($_SESSION['mail_eleve']);
     unset($_SESSION['mdp_eleve']);
     header("Location: ../connexion-view.php");
} 
