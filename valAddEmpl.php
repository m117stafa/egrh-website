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

    $fname=$_GET["fname"]; $lname=$_GET["lname"]; $sexe=$_GET["sexe"]; $adresse=$_GET["adresse"]; $dateNaissance=$_GET["dateNaissance"];

    $sqlQuery="INSERT INTO employes (nom,prenom,sexe,adresse,dateNaissance) VALUES ('$fname','$lname','$sexe','$adresse','$dateNaissance')";

    mysqli_query($cont,$sqlQuery);

    header("Location: http://localhost/grh/formAddEmpl.php?done");

?>