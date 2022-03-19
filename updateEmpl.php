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

?>


<?php

    require 'connection.php';

    $fname=$_POST["fname"]; $lname=$_POST["lname"]; $sexe=$_POST["sexe"]; $adresse=$_POST["adresse"]; $dateNaissance=$_POST["dateNaissance"]; $num=$_GET["num"];

    $sqlQuery="UPDATE employes SET nom='$fname', prenom='$lname', sexe='$sexe', adresse='$adresse', dateNaissance='$dateNaissance' WHERE code='$num'";

    $result=mysqli_query($cont,$sqlQuery);

    if($result){
        header("Location: http://localhost/grh/allEmpls.php");
    }
    
?>