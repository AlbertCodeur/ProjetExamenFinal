<?php
$host="localhost";
$user="root";
$password="";
$db="GesRsocial";
try {
    $conn=mysqli_connect($host,$user,$password,$db);
    $file="config.ini";
    $line="Configuration fichier de base de donnees\n
    host=$host\n
    user=$user\n
    password=$password\n
    db=$db\n
    ";
    if(!file_put_contents($file,$line)!=false)
    {
        echo"erreur creation fichier";
    }
} catch (Exception $e) {
    $error=$e->getMessage();
    echo $error;
}

?>