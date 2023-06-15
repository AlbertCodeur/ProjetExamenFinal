<?php
include "header.php";
?>

<div style="width: 50%; margin-top: 70px; margin-bottom: 5%; margin-left: 25%;">
<div class="field" style="font-size: 50px;">
Ajout d'un utilisateur
</div>
<div class="field">
  <label class="label">Nom</label>
  <div class="control">
    <input class="input" type="text" placeholder="Text input">
  </div>
</div>

<div class="field">
  <label class="label">Prenom</label>
  <div class="control">
    <input class="input" type="text" placeholder="Text input">
  </div>
</div>

<div class="field">
  <label class="label">Date de naissance</label>
  <div class="control">
    <input class="input" type="date" placeholder="Text input">
  </div>
</div>

<div class="field">
  <label class="label">pays</label>
  <div class="control">
    <div class="select">
      <select>
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
    <input class="input is-primary" type="email" placeholder="Email input" >
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
</div>

<div class="field">
  <label class="label">Password</label>
  <div class="control">
    <input class="input" type="text" placeholder="Text input">
  </div>
</div>



<div class="field">
  <label class="label">Pourquoi voulez vous vous inscrire?</label>
  <div class="control">
    <textarea class="textarea" placeholder="Textarea"></textarea>
  </div>
</div>


<div class="field">
  <div class="control">
    <label class="radio">
      <input type="radio" value="H" name="question">
      H
    </label>
    <label class="radio">
      <input type="radio" value="F" name="question">
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
    <button class="button is-primary">Submit</button>
  </div>
  <div class="control">
    <button class="button is-link is-light">Cancel</button>
  </div>
</div>
</div>