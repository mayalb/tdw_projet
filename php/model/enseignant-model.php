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
      public function select_ens_secondaire(){
        $co=new database();
        $conn=$co->connecttodb();
        $query="SELECT * FROM classe where cycle='secondaire'";
        $resultat=$co->selecttable($query);
        foreach($resultat as $res){
          $id_classe=$res['id'];
         
          $query="SELECT * FROM ens_classe where id_classe='$id_classe'";
          $res_classe_ens=$co->selecttable($query);
           $i=0;
           $final=array();
          foreach( $res_classe_ens as  $res_classe_en){
            $id_ens= $res_classe_en['id_ens'];
         
            $query="SELECT * FROM utilisateur where id='$id_ens'";
            $res_ens_names=$co->selecttable($query);
            if((in_array($res_ens_names,$final))==FALSE){
             
              $final[$i]=$res_ens_names;
              
            }
            $i++;
          }
        }
        return $final;
      }   
      public function select_ens_moyen(){
        $co=new database();
        $conn=$co->connecttodb();
        $query="SELECT * FROM classe where cycle='primaire'";
        $resultat=$co->selecttable($query);
        foreach($resultat as $res){
          $id_classe=$res['id'];
         
          $query="SELECT * FROM ens_classe where id_classe='$id_classe'";
          $res_classe_ens=$co->selecttable($query);
           $i=0;
           $final=array();
          foreach( $res_classe_ens as  $res_classe_en){
            $id_ens= $res_classe_en['id_ens'];
         
            $query="SELECT * FROM utilisateur where id='$id_ens'";
            $res_ens_names=$co->selecttable($query);
            if((in_array($res_ens_names,$final))==FALSE){
             
              $final[$i]=$res_ens_names;
              
            }
            $i++;
          }
        }
        return $final;
      }          
    public function select_ens_primaire(){
           $co=new database();
            $conn=$co->connecttodb();
            $query="SELECT * FROM classe where cycle='primaire'";
            $resultat=$co->selecttable($query);
            foreach($resultat as $res){
              $id_classe=$res['id'];
             
              $query="SELECT * FROM ens_classe where id_classe='$id_classe'";
              $res_classe_ens=$co->selecttable($query);
               $i=0;
               $final=array();
              foreach( $res_classe_ens as  $res_classe_en){
                $id_ens= $res_classe_en['id_ens'];
             
                $query="SELECT * FROM utilisateur where id='$id_ens'";
                $res_ens_names=$co->selecttable($query);
                if((in_array($res_ens_names,$final))==FALSE){
                 
                  $final[$i]=$res_ens_names;
                  
                }
                $i++;
              }
            }
            return $final;
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
      public function recup_h_by_id($id){
        $co=new database();
        $conn=$co->connecttodb();
        $query="SELECT * FROM heure where id_ens='$id'";
        $resultat=$co->selecttable($query);

         return $resultat;
      }
      public function recup_h(){
        $co=new database();
        $conn=$co->connecttodb();
        $query="SELECT * FROM heure";
        $resultat=$co->selecttable($query);

         return $resultat;
      }
      public function recup_ens_by_id($id){
        $co=new database();
        $conn=$co->connecttodb();
        $query="SELECT * FROM enseignant where id_ens='$id'";
        $resultat=$co->selecttable($query);

         return $resultat;
      }
      public function insertto($data){
        $sql = "INSERT INTO  ens_classe(id_ens,id_classe) VALUES (?,?)";
         $co=new database();
         $conn=$co->connecttodb();
         $co->insert($sql,$data);
    }
    public function insertto2($data){
        $sql = "INSERT INTO  heure(type,id_ens,value,jour) VALUES (?,?,?,?)";
         $co=new database();
         $conn=$co->connecttodb();
         $co->insert($sql,$data);
    }
    
    public function delete_heur($id){
        $sql = "DELETE FROM heure WHERE id='$id'";
         $co=new database();
         $conn=$co->connecttodb();
         $co->delete($sql);
    }
    public function sele_en(){
        $co=new database();
        $conn=$co->connecttodb();
        $query="SELECT * FROM ens_classe";
        $resultat=$co->selecttable($query);

         return $resultat;
      }

    public function ens_n($id){
        $co=new database();
        $conn=$co->connecttodb();
        $query="SELECT * FROM enseignant WHERE id_ens='$id'";
        $resultat=$co->selecttable($query);

         return $resultat;
    }
    public function delete_class($id){
        $sql = "DELETE FROM ens_classe WHERE id='$id'";
         $co=new database();
         $conn=$co->connecttodb();
         $co->delete($sql);
    }
    


}
    
