
<!DOCTYPE html>
<html lang="en">
<head>
   <script type = "text/javascript" src = "../javascript/file.js"></script>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/connexion.css">
</head>

<body>
<h2 id='spn'><?php echo "Connectez-vous au compte ".$_COOKIE['type'];?></h2>
<form method="POST" form enctype="multipart/form-data"  action="./controller/connexion.php">


  <h4 >Nom utilisateur</h4>

    <input id="user" type="text"  name="email" placeholder="Nom utilisateur" required="">
  
  <br>
    <h4 class="lab">Mot de passe</h4>
    <input id="pass" type="text"  name="password" placeholder="Mot de passe" required="">
  
  <br>
  <button type="submit" name="submit" id="submit" >Se connecter</button>
  </form>

<br>
<!-- <a href='' onclick='printtypes(this);' >Parent</a>&nbsp;&nbsp;
<a href='' onclick='printtypes(this);' >élève</a>
 -->
</body>


</html>
