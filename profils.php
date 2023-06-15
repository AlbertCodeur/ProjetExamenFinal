<?php
include "header.php";
$req="SELECT * FROM user";
$result=mysqli_query($conn,$req);
if($result)
{  
  while($rows=mysqli_fetch_assoc($result))
 {
?>

<div class="container" style=" font-size: 60px; margin: 5%; color: blue ; padding: 0px;">
    Profils des Utilisateurs
</div>

<div align="center" class="container" style="margin: 5%; padding: 0px;">
<div class="column is-half">
<div class="card shadow-lg is-cursor-pointer">
  <div class="card-image cover-image is-overflow-hidden">
    <figure class="image is-4by3">
      <img src="<?= "include/img/".$rows['profil']?>" alt="Placeholder image">
    </figure>
  </div>
  <div class="card-content">
    <div class="media">
      <div class="media-left">
        <figure class="image is-48x48">
          <img  src="<?= "include/img/".$rows['profil']?>" alt="Placeholder image">
        </figure>
      </div>
      <div class="media-content">
        <p class="title is-4"><?= $rows['nom'] ?> <?= $rows['prenom'] ?></p>
        <p class="subtitle is-6"><?= $rows['mail'] ?></p>
      </div>
    </div>

    <div class="content">
      <pre>Fonction: Etudiant</pre>
      <pre href="#">pays: Centrafique</pre>
      <pre> tel: (+221) 770949054</pre>
    </div>
    <?php
    if($rows['idu']==$_SESSION['idu']){
    ?>
    <div>
    <a href="" id="trash" style="color: red;margin: 10px;"><i class="fa fa-trash" aria-hidden="true"></i></a>
    <a href="" id="pencil" style="color: orange;margin: 10px;"><i class="fa fa-pencil" aria-hidden="true"></i></a>
    </div>
  </div>
  <?php } ?>
</div>
</div>

</div>
<?php }} ?>