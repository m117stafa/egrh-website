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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS only    ilyamodeni@gmail.com -->
    <link rel="stylesheet" href="styles/addForm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>GRH - Ajout d'un employee</title>
</head>

<body>
    <div class="form_section">
        
    <form method="GET" autocomplete="off">
        <div class="mb-3">
            <label for="fname" class="form-label">Nom :</label>
            <input type="text" name="fname" class="form-control">
        </div>

        <div class="mb-3">
            <label for="lname" class="form-label">Prenom :</label>
            <input type="text" name="lname" class="form-control">
        </div>

        <div class="mb-3 ">
         Sexe : 
        <label class="radio-inline"><input class="form-check-input" type="radio" name="sexe" value="M" checked> M</label>
        <label class="radio-inline"><input class="form-check-input" type="radio" name="sexe" value="F"> F</label>
        </div>
        
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse :</label>
            <input type="text" name="adresse" class="form-control" id="">
        </div>

        <div class="mb-3">
            <label for="dateNaissance" class="form-label">Date de Naissance :</label>
            <input type="date" name="dateNaissance" class="form-control" id="">
        </div>

        <div class="mb-3">
            <label for="service" class="form-label">Service :</label>
            
        </div>


        <button type="submit" class="btn btn-primary">Ajouter</button>
        <button type="reset" class="btn btn-secondary">Annuler</button>
        </form>
        <?php
            
            if(isset($_GET["done"])){
                echo '
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                </svg>      
                <div class="mt-3 mb-0 alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                  Ajouté avec succées
                </div>
              </div>';

            }

        ?>

        <?php
            
            $sett=isset($_GET["fname"])&&isset($_GET["lname"])&&isset($_GET["sexe"])&&isset($_GET["adresse"])&&isset($_GET["dateNaissance"]);
            if($sett){

                $emp=empty($_GET["fname"])||empty($_GET["lname"])||empty($_GET["sexe"])||empty($_GET["adresse"])||empty($_GET["dateNaissance"]);

                if($emp){
                    echo '<div class="mt-3 mb-0 alert alert-danger d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <div>
                      Remplie tous les information !!
                    </div>
                  </div>';
                }

                if(!$emp){
                    $fname=$_GET["fname"]; $lname=$_GET["lname"]; $sexe=$_GET["sexe"]; $adresse=$_GET["adresse"]; $dateNaissance=$_GET["dateNaissance"];
                    
                    $tst=preg_match("/[^a-zA-Z]/m",$fname)+preg_match("/[^a-zA-Z]/m",$lname)+preg_match("/[^a-zA-Z]/m",$adresse);
                    $emp=empty($fname)||empty($lname)||empty($adresse)||empty($dateNaissance);
                    if($tst==0 && !$emp){
                        header("Location: http://localhost/grh/valAddEmpl.php?fname=$fname&lname=$lname&sexe=$sexe&adresse=$adresse&dateNaissance=$dateNaissance");
                    }

                    else{
                        echo '<div class="mt-3 mb-0 alert alert-danger d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <div>
                      Juste les lettres sont acceptées
                    </div>
                  </div>';
                    }

                   //http://localhost/grh/valAddEmpl.php?fname=$fname&lname=$lname&sexe=$sexe&adresse=$adresse&dateNaissance=$date

                }
    
            }


        ?>
        
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


