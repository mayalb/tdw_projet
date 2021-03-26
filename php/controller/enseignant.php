<?php 

 include('C:\xampp\htdocs\ecole_2\php\model\enseignant-model.php');
 //@session_start(); 

class enseignant_cont{
    //verifier que le client est connecté pour effectué la 

    public function recup_ens_primaire(){
        $req = new enseignants();
        $resultat = $req->select_ens_primaire();  
        return $resultat;
    }
    public function recup_ens_moyen(){
        $req = new enseignants();
        $resultat = $req->select_ens_moyen(); 
        // $resultat=array();
        return $resultat;
    }
    public function recup_ens_secondaire(){
        $req = new enseignants();
        $resultat = $req->select_ens_secondaire(); 
        return $resultat;
    }
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
    public function recup_heure(){
        $req = new enseignants();
        $datas =  $req->recup_h();
        $i=0;
        foreach ($datas as $e):        
           if(!empty($e['value'])):
              if((string)$e['type']=='1'):
                 $datas[$i]['heurerecep']=$e['value'];
                 $datas[$i]['heuretravail']="";
              endif;
              if((string)$e['type']=='0'):
                 $datas[$i]['heuretravail']=$e['value'];
                 $datas[$i]['heurerecep']="";
              endif;
              $i++;
            endif;
        endforeach;
        
        return $datas;
   }
  public function recup_heure_by_id($id){
    $req = new enseignants();
    $datas =  $req->recup_h_by_id($id);
    $i=0;
    foreach ($datas as $e):        
       if(!empty($e['value'])):
          if((string)$e['type']=='1'):
             $datas[$i]['heurerecep']=$e['value'];
             $datas[$i]['heuretravail']="";
          endif;
          if((string)$e['type']=='0'):
             $datas[$i]['heuretravail']=$e['value'];
             $datas[$i]['heurerecep']="";
          endif;
          $i++;
        endif;
    endforeach;
    
    return $datas;

   }
   public function recup_ens__id($id){
    $req = new enseignants();
    $datas =  $req->recup_ens_by_id($id);
    return $datas;
}
public function select_ens(){
    $req = new enseignants();
    $resultat= $req->sele_en();
    return $resultat;
}
public function ens_name($id){
    $req = new enseignants();
    $resultat= $req->ens_n($id);
    return $resultat[0];
}
public function insertens($geten){
    $req = new enseignants();
    $req->insertto($geten);

 }
  
  
  
   
}
if(isset($_POST['supprimer'])){

    $classa = new enseignants();
    $classa->supprimerens();
  } 
  $d = new enseignants();
if(isset($_POST['submitens'])):
 
 $d->insertto([$_POST['getens'],$_POST['getclasse']]);
 header("Location: ../enseignant-view.php");
endif;

if(isset($_POST['submithh'])){
  $day = $_POST['jour'];
  $heure="";

  $getens = $_POST['getens'];
  $type=0;
 
  if(isset($_POST['heuretravail']) && strlen($_POST['heurereception'])==0):
    $type=0;
    $heure = $_POST['heuretravail'];
  endif;
  if(isset($_POST['heurereception']) && strlen($_POST['heuretravail'])==0):
    $type=1;
    $heure = $_POST['heurereception'];
  
  endif;

  $d->insertto2([$type,$getens,$heure,$day]);
 header("Location: ../enseignant-view.php");
}

if(isset($_POST['supprimerheure'])){
    $d = new enseignants();
    $d->delete_heur($_POST['id']);
    header("Location: ../enseignant-view.php");
}
if(isset($_POST['supp'])){
    $d = new enseignants();
    $d->delete_class($_POST['ids']);
    header("Location: ../enseignant-view.php");
}