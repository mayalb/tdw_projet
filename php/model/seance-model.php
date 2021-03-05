<?php 
include_once('C:\xampp\htdocs\ecole_2\php\model\database.php');
 
class seance
{
    public $conn;
    public function ajouter()
    {
      $co=new database();
      $conn=$co->connecttodb();

            $heuredebut=$_POST['heuredebut'];
            $jour=$_POST['jour'];
            $getclasses =$_POST['getclasse'];
            $heurefin = $_POST['heurefin'];
            $getens = $_POST['getens'];
            if(isset($_POST['submit3']) and isset($getclasses) and isset($heuredebut) and isset($heurefin) and isset($getens) and isset($jour)){  

               $select="SELECT id_ens FROM enseignant WHERE nom='$getens'"; 
               $ensei=$co->selecttable($select);
               $id_ens = $ensei[0]['id_ens'];

               $sql="INSERT INTO  seance(jour,heure_debut,heure_fin,id_ens,id_classe) VALUES (?,?,?,?,?)";
               $co->insert($sql,[$jour,$heuredebut,$heurefin,$id_ens,$getclasses]);
               $last_id=$conn->lastInsertId();
               $sql2="INSERT INTO  edt(id_classe,id_seance) VALUES (?,?)";
               $co->insert($sql2,[$getclasses,$last_id]);
             
               //--------la table ens_classe-------------
               $select1="SELECT * FROM ens_classe WHERE id_ens='$id_ens' and id_classe='$getclasses' ";
               $res=$co->selecttable($select1);
               if($res==NULL){
                  $sql1="INSERT INTO  ens_classe(id_ens,id_classe) VALUES (?,?)";
                  $co->insert($sql1,[$id_ens,$getclasses]);

               }
              

              header ('location:..\edt-view.php');
          }
         
     }
       
      public function modifier() { 
   
      } 
    
      public function supprimer(){
         $co=new database();
         $conn=$co->connecttodb(); 
         if ( isset($_POST["supprimer"]) )
         {
           $id=$_POST['id'];
           echo $id;
   
           $sql = "DELETE FROM seance where id='$id'";     
          $co->delete($sql);
          
         }                
                
        header ('location:..\edt-view.php');
       }

      public function getseance(){
         $co=new database();
         $conn=$co->connecttodb();
         $select="SELECT * FROM seance ";
         $res=$co->selecttable($select);
         return $res;
      }
      public function get_seance_by_class_id($id){
         $co=new database();
         $conn=$co->connecttodb();
         $select="SELECT * FROM seance where id_classe='$id' ORDER BY heure_debut";
         $res=$co->selecttable($select);
   
         return $res;
      }
      public function get_seance_by_class_id_day($id,$day){
         $co=new database();
         $conn=$co->connecttodb();
         $select="SELECT * FROM seance where id_classe='$id' and jour='$day'";
         $res=$co->selecttable($select);
         return $res;

      }

      public function get_seance_by_ens_id($id){
         $co=new database();
         $conn=$co->connecttodb();
         $select="SELECT * FROM seance where id_ens='$id' ORDER BY heure_debut";
         $res=$co->selecttable($select);
   
         return $res;
      }
      public function get_seance_by_ens_id_day($id,$day){
         $co=new database();
         $conn=$co->connecttodb();
         $select="SELECT * FROM seance where id_ens='$id' and jour='$day'";
         $res=$co->selecttable($select);
        
         return $res;

      }
    




}
 









