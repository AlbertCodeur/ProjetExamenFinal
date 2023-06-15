<?php
include "header.php";
?>

<div style="width: 50%; margin-top: 70px; margin-bottom: 5%; margin-left: 25%;">
<form action="ajout.php" method="POST" enctype="multipart/form-data">
<div class="field" style="font-size: 50px;">
Publication d'un Post
</div>

<div class="field">
    <label class="label">Media</label>
    <div class="control">
        <input type="file" name="img" class="form-control" placeholder="image">
    </div>
</div>

<div class="field">
  <label class="label">Decrivez votre Post en quelque ligne.</label>
  <div class="control">
    <textarea class="textarea" placeholder="Textarea"></textarea>
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
</form>
</div>