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
?>