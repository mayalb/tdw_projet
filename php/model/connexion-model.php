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
            if(!empty($resultat)):
                if ($resultat['email'] == $_POST['email'] && $resultat['mdp'] == $_POST['password']) 
                {
                    if( ( $resultat['type'] ==0))
                    {  
                        session_start();
                        $_SESSION['mail'] = $_POST['email'];
                        $_SESSION['mdp'] = $_POST['password'];
                        
                        header ('location:../page-view.php');
                            
                    }
                    elseif(( $resultat['type'] ==1) )
                    {
                        session_start();
                        $_SESSION['mail_eleve'] = $_POST['email'];
                        $_SESSION['mdp_eleve'] = $_POST['password'];
                        header("Location:../profil-eleve-view.php"); 
                        
                    }
                    elseif(( $resultat['type'] ==2))
                    {
                        session_start();
                        $_SESSION['mail_parent'] = $_POST['email'];
                        $_SESSION['mdp_parent'] = $_POST['password'];
                        header("Location:../profil-parent-view.php"); 
   
                    }else{
                      echo " <script type=\"text/javascript\">alert('Le mot de passe est incorrect pour le compte ".$_COOKIE['type']." !');window.location='../connexion-view.php';</script> ";
                    
                    }
                 }
                 else 
                 {
                      echo " <script type=\"text/javascript\">alert('Le mot de passe est incorrect pour le compte ".$_COOKIE['type']." !');window.location='../connexion-view.php';</script> ";
                     
                 }
              else:
                  echo " <script type=\"text/javascript\">alert('Le mot de passe est incorrect pour le compte ".$_COOKIE['type']." !');window.location='../connexion-view.php';</script> ";
                  
                  
              endif;
	   }
}