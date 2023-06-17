<?php
include "tete.php";
if(isset($_POST['soumettre']))
{
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$mail=$_POST['mail'];
$date_naiss=$_POST['date_naiss'];
$pays=$_POST['pays'];
$mdp=$_POST['mdp'];
$cmdp=$_POST['cmdp'];
$motivation=$_POST['motivation'];
$sexe=$_POST['sexe'];
$tel=$_POST['tel'];
$fonction=$_POST['fonction'];
$profil=$_FILES['profil']['name'];
$dest="include/img/".$profil;
move_uploaded_file($_FILES['profil']['tmp_name'],$dest);
if($mdp=$cmdp)
{
$mdp_secure=hash_hmac("sha256",$mdp,"cle");
$req= "INSERT INTO user(nom,prenom,mail,date_naiss,pays,mdp,motivation,sexe,profil,tel,fonction) VALUES('$nom','$prenom','$mail','$date_naiss','$pays','$mdp_secure','$motivation','$sexe','$profil','$tel','$fonction')";
try {
    $resultat=mysqli_query($conn,$req);
if($resultat)
{  
  $req="SELECT * FROM user";
  $result=mysqli_query($conn,$req);
  if($result)
  {
  while($rows=mysqli_fetch_assoc($result))
 {
  $nom=$rows['nom'];
  $prenom=$rows['prenom'];
  $email=$rows['mail'];
  $fonction=$rows['fonction'];
  $file="creationuser.txt";
  $line="l'utilisateur $nom vient d'etre creer \n
  nom=$nom\n
  prenom=$prenom\n
  email=$email\n
  Profession=$fonction\n
  ";
  if(!file_put_contents($file,$line, FILE_APPEND)!==false)
  {
      echo"erreur creation fichier";
  }else
  {
    header("location:index.php");
  }
 }
}
}
   

} catch (Exception $e) {
    $error=$e->getMessage();
    echo "Erreur d'issertion!\n".$error;
}

}
}
?>

<div style="width: 50%; margin-top: 70px; margin-bottom: 5%; margin-left: 25%;">
<form action="add.php" method="POST" enctype="multipart/form-data">
<div class="field" style="font-size: 50px;">
Ajout d'un utilisateur
</div>
<div class="field">
  <label class="label">Nom</label>
  <div class="control">
    <input class="input" name="nom" type="text" placeholder="Text input">
  </div>
</div>

<div class="field">
  <label class="label">Prenom</label>
  <div class="control">
    <input class="input" name="prenom" type="text" placeholder="Text input">
  </div>
</div>

<div class="field">
  <label class="label">Telephone</label>
  <div class="control">
    <input class="input" name="tel" type="number" placeholder="Text input">
  </div>
</div>

<div class="field">
  <label class="label">Profession</label>
  <div class="control">
    <input class="input" name="fonction" type="text" placeholder="Text input">
  </div>
</div>

<div class="field">
  <label class="label">Date de naissance</label>
  <div class="control">
    <input class="input" name="date_naiss" type="date" placeholder="Text input">
  </div>
</div>

<div class="field">
  <label class="label">pays</label>
  <div class="control">
    <div class="select">
      <select name="pays">
        <option></option>
        <option>Centrafrique</option>
        <option>Senegal</option>
        <option>France</option>
        <option>Etats Unis</option>
        <option>Angleterre</option>
        <option>Gabon</option>
      </select>
    </div>
  </div>
</div>
<!-- <div class="field">
  <label class="label">Username</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input is-success" type="text" placeholder="Text input" value="bulma">
    <span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </div>
  <p class="help is-success">This username is available</p>
</div> -->

<div class="field">
  <label class="label">Email</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input is-primary"  name="mail" type="email" placeholder="Email input" >
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
</div>

<div class="field">
  <label class="label">Password</label>
  <div class="control">
    <input class="input" name="mdp" type="password" placeholder="Text input">
  </div>
</div>

<div class="field">
  <label class="label">Conformation Password</label>
  <div class="control">
    <input class="input" name="cmdp" type="password" placeholder="Text input">
  </div>
</div>

<div class="field">
    <label class="label">Profil</label>
    <div class="control">
        <input type="file" name="profil" class="form-control" placeholder="photo de profil">
    </div>
</div>

<div class="field">
  <label class="label">Pourquoi voulez vous vous inscrire?</label>
  <div class="control">
    <textarea name="motivation" class="textarea" placeholder="Textarea"></textarea>
  </div>
</div>


<div class="field">
  <div class="control">
    <label class="radio">
      <input type="radio" value="H" name="sexe">
      H
    </label>
    <label class="radio">
      <input type="radio" value="F" name="sexe">
      F
    </label>
  </div>
</div>

<div class="field">
  <div class="control">
    <label class="checkbox">
      <input type="checkbox">
      I agree to the <a href="#">terms and conditions</a>
    </label>
  </div>
</div>

<div class="field is-grouped">
  <div class="control">
    <button type="submit" name="soumettre" class="button is-primary">Submit</button>
  </div>
  <div class="control">
    <button type="reset" class="button is-link is-light">Cancel</button>
  </div>
</div>
</form>
</div>