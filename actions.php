<?php
session_start();
include "connexiondb.php";
if(isset($_GET['t'],$_GET['id'],$_SESSION['idu']) AND !empty($_GET['t']) AND !empty($_GET['id']))
{
    $idu=$_SESSION['idu'];
    $code= $_GET['id'];
    $t= $_GET['t'];
    $req="SELECT * FROM posts where code= $code";
    $resultat=mysqli_query($conn,$req);
    if($resultat)
    {
    if($row=mysqli_fetch_assoc($resultat))
{
       if($t==1)
       {
        $req="SELECT code FROM likes where idu=$idu AND code=$code";
        $result=mysqli_query($conn,$req);
        if($row=mysqli_fetch_assoc($result))
        {
          $req="DELETE FROM likes where idu=$idu AND code=$code";
          $result=mysqli_query($conn,$req);
        }else{
          $req="INSERT INTO likes (idu,code) VALUES('$idu','$code')";
          $resultat=mysqli_query($conn,$req);
        }
         

       }elseif($t==2){
        $req="SELECT code FROM partages where idu=$idu";
        $result=mysqli_query($conn,$req);
        if($row=mysqli_fetch_assoc($result))
        {
          $req="DELETE FROM partages where idu=$idu AND code=$code ";
          $result=mysqli_query($conn,$req);
        }else{
          $req="INSERT INTO partages (idu,code) VALUES('$idu','$code')";
          $resultat=mysqli_query($conn,$req);
        }
       
    }
    header("location:index.php");
}
}

}else{
  header("location:index.php");
}
if(isset($_GET['id']))
{
$code=$_GET['id'];
$req="DELETE FROM posts WHERE code='$code'";
try {
    $resultat=mysqli_query($conn,$req);
    header("location:index.php");
} catch (Exception $e) {
    $error=$e->getMessage();
    echo "Erreur d'issertion!\n".$error;
}
}
if(isset($_POST['soumettre']) AND isset($_GET['id']))
{
$idu=$_GET['id'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$date_naiss=$_POST['date_naiss'];
$pays=$_POST['pays'];
$motivation=$_POST['motivation'];
$sexe=$_POST['sexe'];
$tel=$_POST['tel'];
$fonction=$_POST['fonction'];
$profil=$_FILES['profil']['name'];
$dest="include/img/".$profil;


move_uploaded_file($_FILES['profil']['tmp_name'],$dest);
$req=" UPDATE user SET nom='$nom',prenom='$prenom',date_naiss='$date_naiss',pays='$pays',motivation='$motivation',sexe='$sexe',profil='$profil',tel='$tel',fonction='$fonction' where idu='$idu'";
try {
    $resultat=mysqli_query($conn,$req);
    if($result){
    header("location:index.php");
    }
} catch (Exception $e) {
    $error=$e->getMessage();
    echo "Erreur d'issertion!\n".$error;
}
}
?>