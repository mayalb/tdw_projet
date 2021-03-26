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
    public function TD_counter($day,$seance,$nom){
           $data ="<tr><td>".$seance."</td>";
           for($i=0;$i<7;$i++){
             if($i==$this->days($day)):
              $data.="<td>".$nom."</td>";
             else:
              $data.="<td></td>";
             endif;
           }
           return $data;
        }
    
    public function print_table($day_ens,$seance="",$nom=""){

          switch ($day_ens){
            case 'samedi':
              echo $this->TD_counter($day_ens,$seance,$nom);
            break;
            case 'dimanche':
              echo $this->TD_counter($day_ens,$seance,$nom);
            break;
            case 'lundi':
              echo $this->TD_counter($day_ens,$seance,$nom);
            break;
            case 'mardi':
              echo $this->TD_counter($day_ens,$seance,$nom);
            break;
            case 'mercredi':
              echo $this->TD_counter($day_ens,$seance,$nom);
            break;
            case 'jeudi':
              echo $this->TD_counter($day_ens,$seance,$nom);
            break;
            case 'vendredi':
              echo $this->TD_counter($day_ens,$seance,$nom);
            break;

         }
          
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
      public function days_in($day_ens){
           switch ($day_ens){
             case 0:
               return 'samedi';
             break;
             case 1:
               return 'dimanche';
             break;
             case 2:
              return 'lundi';
             break;
             case 3:
              return 'mardi';
             break;
             case 4:
             return 'mercredi';
             break;
             case 5: 
              return 'jeudi';
             break;
             case 6:
              return 'vendredi';
             break;    

           } }
     public function print_all($id,$day){//$enseignant['id_ens']  'samedi'
            
            $seances = $this->get_seance_by_ens_id_day($id,$day);
             $data_ens = array(
                'nom'=>'',
                'day'=>'',
                'seance'=>''
              );
             foreach ($seances as $seance): 
               $clas = new classcont();
               $classe= $clas->get_classe($seance['id_classe']);
               $nom=$classe[0]['nom'];
               $data_ens['nom']=$nom;
               $data_ens['day'] = $seance['jour'];
               $data_ens['seance'] = $seance['heure_debut']."_".$seance['heure_fin'];
             endforeach;
             
             return $data_ens;
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

   

   
        
  
      
   





