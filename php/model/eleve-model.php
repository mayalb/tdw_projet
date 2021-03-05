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
}