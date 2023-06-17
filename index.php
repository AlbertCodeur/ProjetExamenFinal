<?php
include "header.php";
$_SESSION['idu'];
$req="SELECT * FROM posts";
$resultat=mysqli_query($conn,$req);
if($resultat)
{  
  if(isset($_SESSION['idu']))
  {
?>
<div class="columns is-variable is-1-mobile is-0-tablet is-3-desktop is-8-widescreen is-2-fullhd" style="width:auto; height: 100% ; margin-top: 5%;">
<div style="width: 30%;position: fixed;" class="box column  ">
<aside class="menu">
  <p class="menu-label">
    General
  </p>
  <ul class="menu-list">
    <li><a href="mesposts.php">Tous mes Posts</a></li>
    <li><a href="profils.php" >Les profils</a></li>
  </ul>
  <p class="menu-label">
    Administration
  </p>
  <ul class="menu-list">
    <li><a>Parametres Gestion des Posts</a></li>
    <li>
      <a class="is-active">Gerer vos Posts</a>
      <ul>
        <li><a href="addp.php">Ajouter un nouveau Posts</a></li>
        <li><a href="editp.php">Modifier un post</a></li>
        <li><a href="deletep.php">Supprimer un Post</a></li>
      </ul>
    </li>
    <li><a>Invitations</a></li>
    <li><a>Cloud Storage Environment Settings</a></li>
    <li><a>Authentication</a></li>
  </ul>
  <p class="menu-label">
    Transactions
  </p>
  <ul class="menu-list">
    <li><a>Payments</a></li>
    <li><a>Transfers</a></li>
    <li><a>Balance</a></li>
  </ul>
</aside>
</div>
<?php }else{ ?>
<div class="columns  is-variable is-1-mobile is-0-tablet is-3-desktop is-8-widescreen is-2-fullhd" style="width:auto; height: 100% ; margin-top: 5%;">
<div style="width: 30%;position: fixed;" class="column has-background-warning-light box ">
<aside class="menu">
  <p class="menu-label">
    General
  </p>
  <ul class="menu-list">
    <li><a href="connexion.php">Tous mes Posts</a></li>
    <li><a href="connexion.php" >Les profils</a></li>
  </ul>
  <p class="menu-label">
    Administration
  </p>
  <ul class="menu-list">
    <li><a>Parametres Gestion des Posts</a></li>
    <li>
      <a class="is-active">Gerer vos Posts</a>
      <ul>
        <li><a href="connexion.php">Ajouter un nouveau Posts</a></li>
        <li><a href="connexion.php">Modifier un post</a></li>
        <li><a href="connexion.php">Supprimer un Post</a></li>
      </ul>
    </li>
    <li><a>Invitations</a></li>
    <li><a>Cloud Storage Environment Settings</a></li>
    <li><a>Authentication</a></li>
  </ul>
  <p class="menu-label">
    Transactions
  </p>
  <ul class="menu-list">
    <li><a>Payments</a></li>
    <li><a>Transfers</a></li>
    <li><a>Balance</a></li>
  </ul>
</aside>
</div>

<?php } ?>
<div style="width: 50%;margin: 20px; margin-left:40% ; margin-bottom: 15px; height: auto; position: absolute;" class="column">
<?php  
 while($row=mysqli_fetch_assoc($resultat))
 {
  
   $idu=$row['idu'];
   $req="SELECT * FROM user where idu=$idu";
$result=mysqli_query($conn,$req);
if($result)
{  
  if($rows=mysqli_fetch_assoc($result))
 {
?>

<h1>PUBLIER PAR : <?= $rows['nom'] ?>  <?= $rows['prenom'] ?> depuis <?= $row['datepost'] ?> </h1>
<?php }} ?>
<figure class="image is-16by9">
  <embed class="has-ratio" width="640" height="360" src="<?= "include/img/".$row['media']?>" frameborder="0" allowfullscreen></embed>
</figure>
<div style="margin: 10px;">
<p><?= $row['descript'] ?></p>
</div>
<div style=" padding: 10px; width: 100%; position: relative; display: inline-flex; height: 10%;">
<div class="field has-addons" style=" width: 100%; right: 50px; margin: 20px;padding-right:0px;">
<form action="index.php" method="POST">
<div>
<input class=" control input is-primary" type="text" name="commentaire" placeholder="commentaires">
</div>
<div class=" control">
<button class="button is-primary" name="envoyer" type="submit">envoyer</button>
</div>
</form>
</div>
<div style=" margin-top: 5px; ; margin-right: 10px; font-size: 20px; width: 50px; height: 20px; color: lightgray;">
<?php
$code=$row['code'];
$req="SELECT code FROM likes where code=$code";
$result=mysqli_query($conn,$req);
$likes=mysqli_num_rows($result);


$req="SELECT code FROM partages where code=$code";
$result=mysqli_query($conn,$req);
$partages=mysqli_num_rows($result)
?>
<a href="actions.php?t=1&id=<?= $code ?>"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>(<?= $likes ?>)
</div>
<div  style=" margin-top: 5px; ; font-size: 20px; color: lightgray ; width: 50px; height: 20px;">

<a href="actions.php?t=2&id=<?= $code ?>"><i class="fa fa-share" aria-hidden="true"></i></a>(<?= $partages ?>)
</div>
</div>
<?php
if(isset($_POST['envoyer']))
{
    $commentaire=$_POST['commentaire'];
    $req="INSERT INTO commenter(commentaire,idu,code) VALUES('$commentaire','$idu','$code')";
    try {
        $result=mysqli_query($conn,$req);
    } catch (Exception $e) {
        $erreur=$e->getMessage();
    }
}
 }}else{
  echo "echo erreur insertion!";
 }

 
 ?>
</div>
</div>