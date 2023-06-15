<?php
include "header.php";
?>
<div style="width: 30%; margin-top: 170px; margin-bottom: 5%; margin-left: 35%;">
<form action="">

<div class="field" style="font-size: 16px;">
Connexion
<h1 style="color: red;">Erreur email ou mot de passe incorrect!</h1>
</div>

<div class="field">
  <p class="control has-icons-left has-icons-right">
    <input class="input" type="email" placeholder="Email">
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
    <input class="input" type="password" placeholder="Password">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>
<div class="field is-grouped">
  <div class="control">
    <button class="button is-primary">log in</button>
  </div>
  <div class="control">
    <button class="button is-link is-light">s'inscrire</button>
  </div>
</div>
</form>
</div>
<script>
