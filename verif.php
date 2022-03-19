<?php

    require 'connection.php';
    session_start();

    if(!isset($_SESSION["permission"])){
        header("Location: http://localhost/grh/");
    }

    if(!empty($_SESSION["permission"])) {
        header("Location: http://localhost/grh/allEmpls.php");
    }
    
    $login=$_POST["login"]; $password=$_POST["password"];



    $password=hash("md5",$password);

    $sqlQuery="SELECT * FROM users WHERE login='$login'";

    $res=mysqli_query($cont,$sqlQuery);


    if($row = mysqli_fetch_row($res)){
        if($row[2]==$password){
            $_SESSION["permission"]=$row[3];
            header("Location: http://localhost/grh/allEmpls.php");  
        }
    }
    echo print_r($row);
    echo "\n".$password;
    //header("Location: http://localhost/grh/");
    




?>