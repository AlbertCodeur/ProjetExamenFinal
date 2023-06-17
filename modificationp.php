<?php
include "tete.php"; 
  if(isset($_GET['id']) AND !empty($_GET['id']) )
  {
    $code=$_GET['id'];
    $req="SELECT * FROM posts where code=$code";
    $result=mysqli_query($conn,$req);
    if($result)
    {
      if($row=mysqli_fetch_assoc($result))
      {
// $idu=$_SESSION['idu'];
// $description=$_POST['description'];
// $media=$_FILES['media']['name'];
// $dest="include/img/".$media;
// move_uploaded_file($_FILES['media']['tmp_name'],$dest);
// $req="INSERT INTO posts(idu,media,descript) VALUES('$idu','$media','$description')";
// try {
//     $resultat=mysqli_query($conn,$req);
//     header("location:index.php");
// } catch (Exception $e) {
//     $error=$e->getMessage();
//     echo "Erreur d'issertion!\n".$error;
// }
?>
<div style="width: 50%; margin-top: 70px; margin-bottom: 5%; margin-left: 25%;">
<form action="modificationp.php?id=<?= $row['code'] ?>" method="POST" enctype="multipart/form-data">
<div class="field" style="font-size: 50px;">
Publication d'un Post
</div>

<div class="field">
    <label class="label">Media</label>
    <div class="control">
        <input type="file" name="media" value="<?= $row['media'] ?>" class="form-control" placeholder="Media">
    </div>
</div>

<div class="field">
  <label class="label">Decrivez votre Post en quelque ligne.</label>
  <div class="control">
    <textarea class="textarea"  name="description" placeholder="Textarea"><?= $row['descript'] ?></textarea>
  </div>
</div>


<div class="field is-grouped">
  <div class="control">
    <button name="publier" type="submit" class="button is-primary">Modifier</button>
  </div>
  <div class="control">
    <button type="reset" class="button is-link is-light">Cancel</button>
  </div>
</div>
</form>
</div>
<?php 
}

}   
      
if(isset($_POST['publier']) AND isset($_GET['id']))
{
$code=$_GET['id'];
$idu=$_SESSION['idu'];
$description=$_POST['description'];
$media=$_FILES['media']['name'];
$dest="include/img/".$media;
move_uploaded_file($_FILES['media']['tmp_name'],$dest);
$req=" UPDATE posts SET media='$media',descript='$description' where code='$code'";
try {
    $resultat=mysqli_query($conn,$req);
    header("location:index.php");
} catch (Exception $e) {
    $error=$e->getMessage();
    echo "Erreur d'issertion!\n".$error;
}
}
}
?>