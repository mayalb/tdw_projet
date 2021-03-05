<?php 

include_once('C:\xampp\htdocs\ecole_2\php\model\database.php');
class connexion{
	public function connect(){
    $co=new database();
    $conn=$co->connecttodb();

     $query="SELECT * FROM utilisateur WHERE email= '".$_POST['email']."' AND mdp='".$_POST['password']."' ";
	  $connexionReq=$conn->prepare($query);
	   $connexionReq->execute(array($_POST['email'],$_POST['password']));

        $resultat=$connexionReq->fetch();
        
        if ($resultat['email'] == $_POST['email'] && $resultat['mdp'] == $_POST['password']) 
        {
            if( ( $resultat['type'] ==0) )
            {  
                session_start();
                $_SESSION['mail'] = $_POST['email'];
                $_SESSION['mdp'] = $_POST['password'];
                  header ('location:..\page-view.php'); 
                       
            }
            else
            {
             
              
              
                echo "utilisateur whdokher";
            }
         }
         else 
         {
              echo '<body onLoad="alert(\'Utilisateur ou mot de passe incorrect\')">';

  
         }
   

	}
}