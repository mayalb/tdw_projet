<?php 

include_once('C:\xampp\htdocs\ecole_2\php\model\database.php');
class parents
{ 
    public function getprofil(){
    } 
    public function modifyprofil(){
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
}
    



