<?php 
include_once('C:\xampp\htdocs\ecole_2\php\model\database.php');
 
class enseignants
{
  //----------- Implémentation à terminer-------
   
        
     public function select() { 
            $co=new database();
            $conn=$co->connecttodb();
            $query="SELECT * FROM enseignant";
            $resultat=$co->selecttable("SELECT * FROM enseignant");
             return $resultat;
      }              
          
      public function insert() { 
        $co=new database();
        $conn=$co->connecttodb();
        $query="INSERT INTO  enseignant(nom) VALUES(?)";
        $data=[$nom];
        $co->insert($query,$data);
      } 
      public function getedt(){
      } 
      public function setnoteeleve(){
      }  
      public function get_ens($id){
        $co=new database();
        $conn=$co->connecttodb();
        $query="SELECT * FROM enseignant WHERE id_ens='$id'";
        $resultat=$co->selecttable($query);
         return $resultat;

      }
      public function deleteens(){
        $co=new database();
        $conn=$co->connecttodb(); 
       
          $id=$_POST['id'];
        
         $sql = "DELETE FROM utilisateur where id='$id'";     
         $co->delete($sql);
         $sql = "DELETE FROM enseignant where id_ens='$id'";     
         $co->delete($sql);
         $sql = "DELETE FROM seance where id_ens='$id'";     
         $co->delete($sql);
         $sql = "DELETE FROM ens_classe where id_ens='$id'";     
         $co->delete($sql);
         header ('location:..\util-view.php');
      }
      public function get_all_info_teachers(){
        $co=new database();
        $conn=$co->connecttodb();
        $select1="SELECT * FROM utilisateur WHERE type='3' ";
        $res=$co->selecttable($select1);
        $i=0;
        foreach($res as $re){
            $id=$re['id'];  
        
            $select2="SELECT * FROM enseignant WHERE id_ens='$id' ";
            $res2=$co->selecttable($select2);
            if($res2!=NULL){
              $re['module']= $res2[0]['module'];
             
            }else{
              $re['module']= "";
            
            }
           
                
   
           $res[$i]=$re;
           $i++;


        }
        

      //   print_r($res);
         
         return $res;

      }
    


}
    
