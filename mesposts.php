<?php
include "header.php";
$idu=$_SESSION['idu'];
$req="SELECT * FROM posts where idu=$idu";
$resultat=mysqli_query($conn,$req);
if($resultat)
{  
?>
<div style="width: 50%;margin:5%; margin-left:25% ; margin-bottom: 15px; height: auto; position: absolute;" class="column box">
<?php  
 while($row=mysqli_fetch_assoc($resultat))
 {
   $_SESSION['idu']=$row['idu'];
   $_SESSION['code']=$row['code'];
   $idu=$_SESSION['idu'];
   
?>

<h1>PUBLIER: depuis <?= $row['datepost'] ?> </h1>
<figure class="image is-16by9">
  <embed class="has-ratio" width="640" height="360" src="<?= "include/img/".$row['media']?>" frameborder="0" allowfullscreen></embed>
</figure>
<div style="margin: 10px;">
<p><?= $row['descript'] ?></p>
</div>
<div style=" padding: 10px; width: 100%; position: relative; display: inline-flex; height: 10%;">
<div class="field has-addons" style=" width: 100%; right: 50px; margin: 20px;padding-right:0px;">

<div class=" control">
<?php
$code=$_SESSION['code'];
$req="SELECT commentaire,nom,prenom FROM commenter C,user U,posts P where C.idu=U.idu AND C.code=P.code AND C.code='$code'";
$result=mysqli_query($conn,$req);
if($result)
{  
  while($rows=mysqli_fetch_assoc($result))
 {
  $comment=$rows['commentaire'];
  $nom=$rows['nom'];
  $prenom=$rows['prenom'];
?>
  <h4 style="color: blue;">Commentaire de : <?= $nom ?>  <?= $prenom?></h4>
  <p><?= $comment ?>
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, laborum cupiditate ex vero laboriosam consequatur iure eaque rem rerum! Autem reprehenderit dicta omnis dolorum architecto est praesentium natus, exercitationem in molestiae magni ipsum? Nostrum, iste. Quidem quasi quo soluta expedita odio voluptatibus quae minima in cupiditate enim, asperiores excepturi eaque.
 </p>
 <br>
 <br>
 <br>
 <br>
 <?php }} ?>
</div>
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
 }}else{
  echo "echo erreur insertion!";
 }
 ?>
</div>