<?php
session_start();
include "connexiondb.php";
if(isset($_POST['connexion']))
{
    $mail=$_POST['mail'];
    $mdp=$_POST['mdp'];   
    $mdp_secure=hash_hmac("sha256",$mdp,"cle");
    $req="SELECT * FROM user";
    $result=mysqli_query($conn,$req);

if($result)
{  

  while($rows=mysqli_fetch_assoc($result))
 {
    if($mail==$rows['mail'] and $mdp_secure==$rows['mdp'])
    {
        $_SESSION['idu']=$rows['idu'];
        header("location:index.php");
    }else{
      ?>
<div class="notification is-danger" style="width: 30%; margin-top: 170px; margin-bottom: 0%; margin-left: 35%;">
  <button class="delete"></button>
  <strong>Email</strong> ou <strong> mot de passe</strong> incorrect !
</div>

  <?php
    }
  }
}
}
    
    
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6c773daca8.js" crossorigin="anonymous"></script>
    <script defer src="include/fontawesome/js/all.min.js"></script>
    <link href="include/fontawesome/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="include/bulma/css/bulma.min.css">
    <link rel="stylesheet" href="style.css">
    <title>ChatRooster</title>
</head>
<body>
<div style="width: 30%; margin-top: 170px; margin-bottom: 5%; margin-left: 35%;">
<form action="connexion.php" method="POST">
<div class="field" style="font-size: 16px;">
Connexion
</div>

<div class="field">
  <p class="control has-icons-left has-icons-right">
    <input class="input" name="mail" type="email" placeholder="Email">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>
<div class="field">
  <p class="control has-icons-left">
    <input class="input" name="mdp" type="password" placeholder="Password">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>
<div class="field is-grouped">
  <div class="control">
    <button type="submit" name="connexion" class="button is-primary">log in</button>
  </div>
  <div class="control">
    <a href="add.php" class="button is-link is-light">s'inscrire</a>
  </div>
</div>
</form>
</div>
<?php
include "footer.php";
?>