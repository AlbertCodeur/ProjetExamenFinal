<?php
include "header.php";
$idu=$_SESSION['idu'];
$req="SELECT * FROM posts where idu=$idu";
$resultat=mysqli_query($conn,$req);
if($resultat)
{  
?>
<div style="width: 50%;margin: 5%; margin-left:25% ; margin-bottom: 2%px; height: auto; position: absolute;" class="column">
<?php  
 while($row=mysqli_fetch_assoc($resultat))
 {
   $_SESSION['idu']=$row['idu'];
   $_SESSION['code']=$row['code'];
   $idu=$_SESSION['idu'];
   $req="SELECT * FROM user where idu=$idu";
$result=mysqli_query($conn,$req);
if($result)
{  
  if($rows=mysqli_fetch_assoc($result))
 {
?>

<h1>PUBLIER: depuis <?= $row['datepost'] ?> </h1>
<?php }} ?>
<figure class="image is-16by9">
  <embed class="has-ratio" width="640" height="360" src="<?= "include/img/".$row['media']?>" frameborder="0" allowfullscreen></embed>
</figure>
<div style="margin: 10px;">
<p><?= $row['descript'] ?></p>
</div>
<div style=" padding-bottom: 50px; margin:10px ; width: 100%; position: relative; display: inline-flex; height: 10%;">
<div style=" margin-top: 5px; ; margin-right: 10px; font-size: 20px; width: 50px; height: 20px; color: lightgray;">
<a class="button  is-danger" type="button" href="actions.php?id=<?= $row['code'] ?>">supprimer</a>
</div>
</div>
<?php
 }}else{
  echo "echo erreur insertion!";
 }


 ?>
</div>