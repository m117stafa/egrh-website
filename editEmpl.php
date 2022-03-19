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

        if(preg_match("/[^0-9]/m",$_GET["num"])>0 || !isset($_GET["num"])){
            header("Location: http://localhost/grh/allEmpls.php");
         }
    
        $sqlQuery="SELECT nom,prenom,sexe,adresse,dateNaissance FROM employes WHERE code=".$_GET["num"];
    
        $result=mysqli_query($cont,$sqlQuery);
    
        $row=mysqli_fetch_row($result);


    
        if(!$row){
            header("Location: http://localhost/grh/allEmpls.php");
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS only -->
    <link rel="stylesheet" href="styles/addForm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>GRH - Modification d'information</title>
</head>

<body>
    <div class="form_section">
        
    <form method="POST" action="updateEmpl.php?num=<?php echo $_GET["num"] ?>" autocomplete="off">
        <div class="mb-3">
            <label for="fname" class="form-label">Nom :</label>
            <input type="text" name="fname" class="form-control" value=<?php echo $row[0]; ?>>
        </div>

        <div class="mb-3">
            <label for="lname" class="form-label">Prenom :</label>
            <input type="text" name="lname" class="form-control" value=<?php echo $row[1]; ?>>
        </div>

        <div class="mb-3 ">
         Sexe : 
        <label class="radio-inline"><input class="form-check-input" type="radio" name="sexe" value="M" <?php if($row[2]=="M"){echo "checked";} ?> > M</label>
        <label class="radio-inline"><input class="form-check-input" type="radio" name="sexe" value="F" <?php if($row[2]=="F"){echo "checked";}?> > F</label>
        </div>
        
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse :</label>
            <input type="text" name="adresse" class="form-control" id="" value=<?php echo $row[3]; ?>>
        </div>

        <div class="mb-3">
            <label for="dateNaissance" class="form-label">Date de Naissance :</label>
            <input type="date" name="dateNaissance" class="form-control" value=<?php echo $row[4]; ?>>
        </div>

        <div class="mb-3">
            <label for="service" class="form-label">Service :</label>
        </div>

        <button onclick="return dell()" type="submit" class="btn btn-primary">Modifier</button>
        <button type="reset" class="btn btn-secondary">Annuler</button>
        </form>
    </div>
    <script>
        function dell(){
          var res=confirm('Confirmer la modification');
          if(!res){
            return false;
          }
          else{
            return true;
          }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


