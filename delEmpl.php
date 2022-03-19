
<?php
    session_start();

    if(!isset($_SESSION["permission"])){
        header("Location: http://localhost/grh/");
    }

    else {
        if($_SESSION["permission"]=="US"){
            header("Location: http://localhost/grh/allEmpls.php");
        }
    }
    require 'connection.php';

    if(preg_match("/[^0-9]/m",$_GET["num"])>0 || !isset($_GET["num"])){
       header("Location: http://localhost/grh/allEmpls.php");
    }

    else {
        $sqlQuery="DELETE FROM employes WHERE code=".$_GET["num"];
    
        $sqlResult=mysqli_query($cont,$sqlQuery);

        if($sqlResult){
            header("Location: http://localhost/grh/allEmpls.php");
        }

        else{
            echo "problem";
        }

    }




?>