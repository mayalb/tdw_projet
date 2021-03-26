<?php 

include_once('C:\xampp\htdocs\ecole_2\php\model\database.php');
class eleve
{
    public function getedt(){
    } 
    public function getnote(){
    }  
    public function getactivite(){
    } 
    public function setactivite(){
    } 
    public function get_student(){
        $co=new database();
        $conn=$co->connecttodb();
        $select1="SELECT * FROM utilisateur WHERE type='1' ";
        $res=$co->selecttable($select1);
        $i=0;
        foreach($res as $re){
            $id=$re['id'];  
            $select2="SELECT * FROM eleve WHERE id='$id' ";
            $res2=$co->selecttable($select2);
            if($res2[0]['id_parent']!=0){
                $id_parent=$res2[0]['id_parent'];
                $select2="SELECT * FROM utilisateur WHERE id='$id_parent' ";
                $res3=$co->selecttable($select2);
                $re['parent']= $res3[0]['nom']." ".$res3[0]['prenom'];
               
            }else{
                $re['parent']="";
            }
          
            $id_classe =$res2[0]['classe'];
                $select4="SELECT * FROM classe WHERE id='$id_classe' ";
                $res4=$co->selecttable($select4);
                $re['classe']= $res4[0]['nom'];
                $re['cycle']= $res4[0]['cycle'];
                $re['annee']= $res4[0]['annee'];
               
           

           $re['datenaissance'] =$res2[0]['date_naissance'];
          
           $re['activite_extrascol'] =$res2[0]['activite_extrascol'];
           $res[$i]=$re;
           $i++;


        }
        

      //   print_r($res);
         
         return $res; 
       
    
}
      public function supprimereleve(){
          $co=new database();
            $conn=$co->connecttodb(); 
           
              $id=$_POST['id'];
              $sql = "DELETE FROM eleve where id='$id'";     
             $co->delete($sql);
             $sql = "DELETE FROM utilisateur where id='$id'";     
             $co->delete($sql);
             header ('location:..\util-view.php');

      }
      public function get_credentials_eleve($email,$mdp){
        $co=new database();
        $conn=$co->connecttodb();
        $select1="SELECT * FROM utilisateur WHERE email='$email' and mdp='$mdp' ";
        $res=$co->selecttable($select1);
        return $res;
      }
      public function get_credentials_eleve_table($id){
        $co=new database();
        $conn=$co->connecttodb();
        $select1="SELECT * FROM eleve WHERE id='$id'";
        $res=$co->selecttable($select1);
        $id_classe=$res[0]['classe'];
        $select1="SELECT * FROM classe WHERE id='$id_classe'";
        $res1=$co->selecttable($select1);
        $res[0]['classe']=$res1[0]['nom'];
        $res[0]['id_classe']=$id_classe;
        $res[0]['cycle']=$res1[0]['cycle'];
        $res[0]['annee']=$res1[0]['annee'];
        return $res;
      }
      public function getarticle($type){
        $co=new database();
        $conn=$co->connecttodb();
        $query="SELECT * FROM article where aud='$type'";
       $resultat= $co->selecttable($query);
     
        return $resultat;
    }
     public function get_notes_eleve($id){
      $co=new database();
      $conn=$co->connecttodb();
      $select1="SELECT * FROM note WHERE id_eleve='$id'";
      $res=$co->selecttable($select1);
      return $res;
     }
    
    public function print_tb($class_id){
         $co=new database();
         $conn=$co->connecttodb();
         $query="SELECT * FROM seance where id_classe='$class_id'";
         $resultat= $co->selecttable($query);
         
         foreach ($resultat as $key => $value) {
           $id = $value['id_ens'];
           $query2="SELECT * from enseignant where id_ens='$id'";
           $resultat2= $co->selecttable($query2);
           if(!empty($resultat2)):
               foreach ($resultat2 as $keys => $value) {
                  $resultat[$key][]=$resultat2[$keys]['module'];
               }
           else:
               $resultat[$key][]=0;
           endif;
          
         }
         return $resultat;
         //return $resultat;
    }

}