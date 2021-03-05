<?php 

include_once('C:\xampp\htdocs\ecole_2\php\model\database.php');
class article
{
    public function ajouter($directionid)
    {
      $co=new database();
     $conn=$co->connecttodb();
   
      //   try {
               
      //           $conn = new PDO('mysql:host=localhost;dbname='.$DB,'root','');
    
      //  } 
      //  catch (Exception $e) 
      //  { 
      //           die('Erreur: connexion au serveur échouée');
      //  }
      
        if (isset($_SESSION['mail']) ) 
        {
         
          if(isset($_POST["modifier"])){
            $id=$_POST['getarticle'];
            $sql = "DELETE FROM article where id='$id'";     
            $co->delete($sql); 
          }
          if ( isset($_POST["submit"]) or isset($_POST["modifier"]))
          {
            $titre=$_POST['titr'];
            $disc=$_POST['desc'];
            $type=$_POST['type'];
              
            $sql = "INSERT INTO  article(titre,description,lien_image,aud) VALUES (?,?,?,?)";
           $data=[$titre, $disc,$directionid, $type];
           $co->insert($sql,$data);
  

             
          }                
                 
          header ('location:..\article-view.php');
              
       
        }
        else
        {
                
                  echo "<script type='text/javascript'>alert('Vous devez etre connecté pour pouvoir effectuer cette opération ');
                 window.location='../connexion-view.php';
                  </script>"; 
                 
         }
   

    }
   public function getarticle(){
    $co=new database();
    $conn=$co->connecttodb();
    $query="SELECT * FROM article";
   $resultat= $co->selecttable($query);
 
    return $resultat;
   }

    // public function modifier(){
    //   $co=new database();
    //   $conn=$co->connecttodb();
    //   if ( isset($_POST["modifier"]))
    //   {
    //         $id=$_POST['id'];
    //         $sql = "DELETE FROM article where id='$id'";     
    //       $co->delete($sql); 

        
    //   }  
    //   header ('location:..\article-view.php');
    // }

    public function supprimer(){
      $co=new database();
      $conn=$co->connecttodb(); 
      if ( isset($_POST["supprimer"]) or isset($_POST["modifier"]))
      {
        $id=$_POST['id'];
        $sql = "DELETE FROM article where id='$id'";     
       $co->delete($sql);
       
       $titre=$_POST['titr'];
       $disc=$_POST['desc'];
       $type=$_POST['type'];
         
       $sql = "INSERT INTO  article(titre,description,lien_image,aud) VALUES (?,?,?,?)";
      $data=[$titre, $disc,$directionid, $type];
      $co->insert($sql,$data);


         
      }                
             
      header ('location:..\article-view.php');
    }
}
    



