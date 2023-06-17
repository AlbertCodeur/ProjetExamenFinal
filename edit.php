<?php
include "tete.php";
if(isset($_GET['id']))
{
    $idu=$_GET['id'];
    $req="SELECT * FROM user";
    $result=mysqli_query($conn,$req);
    if($result)
    {
        {
            if($row=mysqli_fetch_assoc($result))
            {
?>

<div style="width: 50%; margin-top: 70px; margin-bottom: 5%; margin-left: 25%;">
<form action="actions.php?&id=<?= $row['idu'] ?>" method="POST" enctype="multipart/form-data">
<div class="field" style="font-size: 50px;">
Ajout d'un utilisateur
</div>
<div class="field">
  <label class="label">Nom</label>
  <div class="control">
    <input class="input" value="<?= $row['nom'] ?>" name="nom" type="text" placeholder="Text input">
  </div>
</div>

<div class="field">
  <label class="label">Prenom</label>
  <div class="control">
    <input class="input" value="<?= $row['prenom'] ?>" name="prenom" type="text" placeholder="Text input">
  </div>
</div>

<div class="field">
  <label class="label">Telephone</label>
  <div class="control">
    <input class="input" value="<?= $row['tel'] ?>" name="tel" type="number" placeholder="Text input">
  </div>
</div>

<div class="field">
  <label class="label">Profession</label>
  <div class="control">
    <input class="input" value="<?= $row['fonction'] ?>" name="fonction" type="text" placeholder="Text input">
  </div>
</div>

<div class="field">
  <label class="label">Date de naissance</label>
  <div class="control">
    <input class="input" value="<?= $row['date_naiss'] ?>" name="date_naiss" type="date" placeholder="Text input">
  </div>
</div>

<div class="field">
  <label class="label">pays</label>
  <div class="control">
    <div class="select">
      <select name="pays"  >
        <option ><?= $row['pays'] ?></option>
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
    <label class="label">Profil</label>
    <div class="control">
        <input type="file" name="profil" value="<?= $row['profil'] ?>" class="form-control" placeholder="photo de profil">
    </div>
</div>

<div class="field">
  <label class="label">Pourquoi voulez vous vous inscrire?</label>
  <div class="control">
    <textarea name="motivation" class="textarea" placeholder="Textarea"><?= $row['motivation'] ?></textarea>
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
<?php 
   }
}
}
}

?>