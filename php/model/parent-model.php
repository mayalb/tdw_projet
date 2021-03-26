<?php 

include_once('C:\xampp\htdocs\ecole_2\php\model\database.php');
class parents
{ 
    public function getprofil(){
    } 
    public function modifyprofil(){
    }  
    public function get_classe($id_child){
    
      $co=new database();
      $conn=$co->connecttodb();
      $select1="SELECT * FROM eleve WHERE id='$id_child'";
      $res=$co->selecttable($select1);
      $id_classe=$res[0]['classe'];
      $activite=$res[0]['activite_extrascol'];
      $select1="SELECT * FROM classe WHERE id='$id_classe'";
      $res=$co->selecttable($select1);
      $res[0]['activite']=$activite;
      $res[0]['id_classe']= $id_classe;
      return $res;
    }
    public function get_parent(){
        $co=new database();
        $conn=$co->connecttodb();
        $select1="SELECT * FROM utilisateur WHERE type='2' ";
        $res=$co->selecttable($select1);
        $i=0;
        foreach($res as $re){
            $id=$re['id'];  
            $select2="SELECT * FROM eleve WHERE id_parent='$id' ";
            $res2=$co->selecttable($select2);
            if($res2!=NULL){
               
                $id_enfant=$res2[0]['id'];
                $select2="SELECT * FROM utilisateur WHERE id='$id_enfant' ";
                $res3=$co->selecttable($select2);
            
                $re['enfant']= $res3[0]['nom']." ".$res3[0]['prenom'];
                
               
            }else{
                $re['enfant']="";
            }
          
      
               
           

           $res[$i]=$re;
           $i++;


        }
        

      //   print_r($res);
         
         return $res; 
    }
    public function supprimereparent(){
        $co=new database();
        $conn=$co->connecttodb(); 
       
          $id=$_POST['id'];
        
         $sql = "DELETE FROM utilisateur where id='$id'";     
         $co->delete($sql);
         
         header ('location:..\util-view.php');
    }
     public function get_parents_by_credentials($email,$mdp){
        $co  =new database();
        $conn=$co->connecttodb(); 
        $sql = "SELECT * FROM utilisateur WHERE email='$email' and mdp='$mdp' ";     
        $res =$co->selecttable($sql);
        return $res;
    }
    

      public function get_credentials_parent_table($email,$mdp){
        $co=new database();
        $conn=$co->connecttodb();
        $returned_data = array("parent_data"=>array(),"child_data"=>array());
        $select1="SELECT * FROM utilisateur WHERE email='$email' and mdp='$mdp'";
        $res=$co->selecttable($select1);
        $returned_data['parent_data']=$res[0];
        $id_parent = $res[0]['id'];
        $select1="SELECT id FROM eleve WHERE id_parent='$id_parent'";
        $res=$co->selecttable($select1);
        $ids=array();
        foreach ($res as $key => $value) {
          $ids[]=$value['id'];
        }
        foreach ($ids as $value) {
          $select1="SELECT * FROM utilisateur WHERE id='$value'";
          $res=$co->selecttable($select1);
          $returned_data['child_data'][]=$res;
        }
        return $returned_data;
      }
     public function getarticle($type){
       $six=6;
        $co=new database();
        $conn=$co->connecttodb();
        $query="SELECT * FROM article where aud='$type' or aud='6' ";
       $resultat= $co->selecttable($query);
      
        return $resultat;
    }
  public function  get_notes_child($id_child){
        $co=new database();
        $conn=$co->connecttodb();
      

          $query="SELECT * FROM note where id_eleve='$id_child' ";
          $resultat1= $co->selecttable($query);

          return $resultat1;
  
       }
  

  
}
    



