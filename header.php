<?php
session_start();
$_SESSION['id']=1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6c773daca8.js" crossorigin="anonymous"></script>
    <script defer src="include/fontawesome/js/all.min.js"></script>
    <link href="include/fontawesome/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="include/bulma/css/bulma.min.css">
    <link rel="stylesheet" href="style.css">
    <title>ChatRooster</title>
</head>
<body>
<nav class="navbar is-light is-fixed-top" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="">
      <img src="include/img/poulet1.png" alt="logo" width="30" height="50" style="border-radius: 50%; margin: 2px; border: solid red 1px;"> ChatRooster
    </a>

    <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
  <span aria-hidden="true"></span>
  <span aria-hidden="true"></span>
  <span aria-hidden="true"></span>
</a>


  </div>

  <div class="navbar-menu" id="navMenu">
    <div class="navbar-start">
      <a class="navbar-item">
        Home
      </a>

      <a class="navbar-item">
        Documentation
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Mon Compte
        </a>

        <div class="navbar-dropdown">
          <h3 style="color:blue ;">koissialbert_CR</h6>
          <h5 style="color:blue ;">Email:koissialbertjunior@gmail.com</h5>
          <h6 style="color:blue ;">16/08/1998</h6>
          <hr class="navbar-divider">
          <a class="navbar-item">
            Modifier
          </a>
        </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary">
            <strong>Sign up</strong>
          </a>
          <?php
          if($_SESSION['id']!=null){ ?>
          <a class="button is-light">
            Log out
          </a>
          <?php }else {  ?>
          <a class="button is-light">
            Log in
          </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</nav>
<script>
  document.addEventListener('DOMContentLoaded', () => {

// Get all "navbar-burger" elements
const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

// Add a click event on each of them
$navbarBurgers.forEach( el => {
  el.addEventListener('click', () => {

    // Get the target from the "data-target" attribute
    const target = el.dataset.target;
    const $target = document.getElementById(target);

    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
    el.classList.toggle('is-active');
    $target.classList.toggle('is-active');

  });
});

});
</script>
<?php
include "footer.php";
?>