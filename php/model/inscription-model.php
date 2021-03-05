<?php 
include_once('C:\xampp\htdocs\ecole_2\php\model\database.php');
class Inscription
{
    public function inscrire()
    {

    }
    public function register_eleve(){
        $co=new database();
        $conn=$co->connecttodb();
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $datenaissance=$_POST['datenaissance'];
        $adresse=$_POST['adresse'];
        $tel1=$_POST['tel1'];
        $tel2=$_POST['tel2'];
        $tel3=$_POST['tel3'];
        $tel1=$_POST['tel1'];
        $classe=$_POST['getclasse'];
        $email=$_POST['email'];
        $mdp=$_POST['mdp'];
        $idparent=$_POST['idparent'];
        $type=1;
        if ($_POST["id"] ==NULL)
        {
        
          
          $sql = "INSERT INTO  utilisateur(nom,prenom,adresse,tel1,tel2,tel3,email,type,mdp) VALUES (?,?,?,?,?,?,?,?,?)";
         $data=[$nom,$prenom,$adresse,$tel1,$tel2,$tel3,$email,$type,$mdp];
         $co->insert($sql,$data);
         $last_id=$conn->lastInsertId();
       
         $sql = "INSERT INTO  eleve(id,date_naissance,classe) VALUES (?,?,?)";
         $data=[$last_id,$datenaissance,$classe];
         $co->insert($sql,$data);
         if($_POST["idparent"] !=NULL){
             $sql="UPDATE eleve SET id_parent='$idparent' where id='$last_id'";
             $co->update($sql);

         }


      
        }else{
            $id=$_POST['id'];
            if($_POST["nom"] !=NULL){
                echo $nom;
                $sql="UPDATE utilisateur SET nom='$nom' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["prenom"] !=NULL){
                $sql="UPDATE utilisateur SET prenom='$prenom' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["adresse"] !=NULL){
                $sql="UPDATE utilisateur SET adresse='$adresse' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["tel1"] !=NULL){
                $sql="UPDATE utilisateur SET tel1='$tel1' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["tel2"] !=NULL){
                $sql="UPDATE utilisateur SET tel2='$tel2' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["tel3"] !=NULL){
                $sql="UPDATE utilisateur SET tel3='$tel3' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["email"] !=NULL){
                $sql="UPDATE utilisateur SET email='$email' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["mdp"] !=NULL){
                $sql="UPDATE utilisateur SET mdp='$mdp' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["getclasse"] !=NULL){
                $sql="UPDATE eleve SET classe='$classe' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["datenaissance"] !=NULL){
                $sql="UPDATE eleve SET date_naissance='$datenaissance' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["idparent"] !=NULL){
                $sql="UPDATE eleve SET id_parent='$idparent' where id='$id'";
                $co->update($sql);
   
            }
            //update
        }              
               
        header ('location:..\register-eleve-view.php');
            
     
      }
      public function register_parent(){
        $co=new database();
        $conn=$co->connecttodb();
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $adresse=$_POST['adresse'];
        $tel1=$_POST['tel1'];
        $tel2=$_POST['tel2'];
        $tel3=$_POST['tel3'];
        $tel1=$_POST['tel1'];
        $email=$_POST['email'];
        $mdp=$_POST['mdp'];
        $idenfant=$_POST['idenfant'];
        $type=2;
        if ($_POST["id"] ==NULL)
        {
        
          
          $sql = "INSERT INTO  utilisateur(nom,prenom,adresse,tel1,tel2,tel3,email,type,mdp) VALUES (?,?,?,?,?,?,?,?,?)";
         $data=[$nom,$prenom,$adresse,$tel1,$tel2,$tel3,$email,$type,$mdp];
         $co->insert($sql,$data);
         $last_id=$conn->lastInsertId();
         if($_POST["idenfant"] !=NULL){
             $sql="UPDATE eleve SET id_parent='$last_id' where id='$idenfant'";
             $co->update($sql);

         }


      
        }else{
            echo "update";
            $id=$_POST['id'];
            echo $id;
            if($_POST["nom"] !=NULL){
                echo $nom;
                $sql="UPDATE utilisateur SET nom='$nom' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["prenom"] !=NULL){
                $sql="UPDATE utilisateur SET prenom='$prenom' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["adresse"] !=NULL){
                $sql="UPDATE utilisateur SET adresse='$adresse' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["tel1"] !=NULL){
                $sql="UPDATE utilisateur SET tel1='$tel1' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["tel2"] !=NULL){
                $sql="UPDATE utilisateur SET tel2='$tel2' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["tel3"] !=NULL){
                $sql="UPDATE utilisateur SET tel3='$tel3' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["email"] !=NULL){
                $sql="UPDATE utilisateur SET email='$email' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["mdp"] !=NULL){
                $sql="UPDATE utilisateur SET mdp='$mdp' where id='$id'";
                $co->update($sql);
                echo "mdddddddddddddddp";
   
            }
        
            if($_POST["idenfant"] !=NULL){
                echo "modi enf";
                $sql="UPDATE eleve SET id_parent='$id' where id='$idenfant'";
                $co->update($sql);
   
            }
            //update
        }              
               
        header ('location:..\register-parent-view.php');
            
     
      }
      public function register_ens(){
        $co=new database();
        $conn=$co->connecttodb();
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $adresse=$_POST['adresse'];
        $tel1=$_POST['tel1'];
        $tel2=$_POST['tel2'];
        $tel3=$_POST['tel3'];
        $tel1=$_POST['tel1'];
        $email=$_POST['email'];
        $mdp=$_POST['mdp'];
        $module=$_POST['module'];
        $type=3;
        if ($_POST["id"] ==NULL)
        {
        
          
          $sql = "INSERT INTO  utilisateur(nom,prenom,adresse,tel1,tel2,tel3,email,type,mdp) VALUES (?,?,?,?,?,?,?,?,?)";
         $data=[$nom,$prenom,$adresse,$tel1,$tel2,$tel3,$email,$type,$mdp];
         $co->insert($sql,$data);
         $last_id=$conn->lastInsertId();
         $sql = "INSERT INTO  enseignant(id_ens,nom,module) VALUES (?,?,?)";
         $data=[ $last_id,$nom,$module];
         $co->insert($sql,$data);
        


      
        }else{
            echo "update";
            $id=$_POST['id'];
            echo $id;
            if($_POST["nom"] !=NULL){
                echo $nom;
                $sql="UPDATE utilisateur SET nom='$nom' where id='$id'";
                $co->update($sql);
                $sql="UPDATE enseignant SET nom='$nom' where id_ens='$id'";
                $co->update($sql);
   
            }
            if($_POST["prenom"] !=NULL){
                $sql="UPDATE utilisateur SET prenom='$prenom' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["adresse"] !=NULL){
                $sql="UPDATE utilisateur SET adresse='$adresse' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["tel1"] !=NULL){
                $sql="UPDATE utilisateur SET tel1='$tel1' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["tel2"] !=NULL){
                $sql="UPDATE utilisateur SET tel2='$tel2' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["tel3"] !=NULL){
                $sql="UPDATE utilisateur SET tel3='$tel3' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["email"] !=NULL){
                $sql="UPDATE utilisateur SET email='$email' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["mdp"] !=NULL){
                $sql="UPDATE utilisateur SET mdp='$mdp' where id='$id'";
                $co->update($sql);
                echo "mdddddddddddddddp";
   
            }
        
            if($_POST["module"] !=NULL){
                echo "modi enf";
                $sql="UPDATE enseignant SET module='$module' where id_ens='$id'";
                $co->update($sql);
   
            }
            //update
        }              
               
        header ('location:..\register-ens-view.php');
            
     
      }

      public function register_admin(){
        $co=new database();
        $conn=$co->connecttodb();
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $adresse=$_POST['adresse'];
        $tel1=$_POST['tel1'];
        $tel2=$_POST['tel2'];
        $tel3=$_POST['tel3'];
        $tel1=$_POST['tel1'];
        $email=$_POST['email'];
        $mdp=$_POST['mdp'];
 
        $type=0;
        if ($_POST["id"] ==NULL)
        {
        
          
          $sql = "INSERT INTO  utilisateur(nom,prenom,adresse,tel1,tel2,tel3,email,type,mdp) VALUES (?,?,?,?,?,?,?,?,?)";
         $data=[$nom,$prenom,$adresse,$tel1,$tel2,$tel3,$email,$type,$mdp];
         $co->insert($sql,$data);
       

      
        }else{
  
            $id=$_POST['id'];
            echo $id;
            if($_POST["nom"] !=NULL){
                echo $nom;
                $sql="UPDATE utilisateur SET nom='$nom' where id='$id'";
                $co->update($sql);
           
   
            }
            if($_POST["prenom"] !=NULL){
                $sql="UPDATE utilisateur SET prenom='$prenom' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["adresse"] !=NULL){
                $sql="UPDATE utilisateur SET adresse='$adresse' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["tel1"] !=NULL){
                $sql="UPDATE utilisateur SET tel1='$tel1' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["tel2"] !=NULL){
                $sql="UPDATE utilisateur SET tel2='$tel2' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["tel3"] !=NULL){
                $sql="UPDATE utilisateur SET tel3='$tel3' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["email"] !=NULL){
                $sql="UPDATE utilisateur SET email='$email' where id='$id'";
                $co->update($sql);
   
            }
            if($_POST["mdp"] !=NULL){
                $sql="UPDATE utilisateur SET mdp='$mdp' where id='$id'";
                $co->update($sql);
                echo "mdddddddddddddddp";
   
            }
        
           
            //update
        }              
               
        header ('location:..\register-admin-view.php');
            
     
      }
    }

    



