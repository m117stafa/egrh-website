<?php
session_start();

if(!isset($_SESSION["permission"])){
    header("Location: http://localhost/grh/");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/allEmpl.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Liste des employees</title>
</head>


<body>

<div class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
    <a  class="navbar-brand px-4 py-2" href="#">GRH</a>

    <div>
      <?php if($_SESSION["permission"]=="AD"){echo '<a class="btn btn-success me-2" href="formAddEmpl.php"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
      </svg> Ajoute</a>';}?>

      <a href="deconnexion.php" class="btn btn-danger me-4"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
  <path d="M7.5 1v7h1V1h-1z"/>
  <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
</svg>Deconnecter</a>
    </div>
    
</div>
<table class="table table-hover w-auto mx-auto mw-100 mt-2">
  <thead class="table-dark">
    <tr>
        <th scope="col">Num</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Sexe</th>
        <th scope="col">Adresse</th>
        <th scope="col">Date de naissance</th>
        <th scope="col">Service</th>
        <?php if($_SESSION["permission"]=="AD"){ echo '<th scope="col">Operations</th>';} ?>
    </tr>
  </thead>
  <tbody>

    <?php
        if($_SESSION["permission"]=="AD"){
          $isAdmin=true;

        }

        else {
          $isAdmin=false;
        }

        function addRow($num,$fname,$lname,$sexe,$adresse,$dateNaissance,$numServ,$isAdmin){

          if($isAdmin){
            echo '<tr>
            <th scope="row">'.$num.'</th> <!-- id -->
            <td>'.$fname.'</td>
            <td>'.$lname.'</td>
            <td>'.$sexe.'</td>
            <td>'.$adresse.'</td>
            <td>'.$dateNaissance.'</td>
            <td>'.$numServ.'</td>
            <td>
                <a href="editEmpl.php?num='.$num.'" class="btn btn-primary btn-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                  </svg>
                  Modifier
              </a>
              
              <a onclick="return dell()" href="delEmpl.php?num='.$num.'" class="btn btn-danger btn-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                  </svg>  
                  Supprimer
              </a>
            </td>
          </tr>';
          }
          
          if(!$isAdmin){
            echo '<tr>
            <th scope="row">'.$num.'</th> <!-- id -->
            <td>'.$fname.'</td>
            <td>'.$lname.'</td>
            <td>'.$sexe.'</td>
            <td>'.$adresse.'</td>
            <td>'.$dateNaissance.'</td>
            <td>'.$numServ.'</td>
          </tr>';
          }
         

        }

        require 'connection.php';

        $sqlQuery="SELECT * FROM employes";

        $sqlResult=mysqli_query($cont,$sqlQuery);
        
        while ($row = mysqli_fetch_row($sqlResult)) {
            addRow($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$isAdmin);
          }

    ?>
  </tbody>
</table>

<script>
        function dell(){
          var res=confirm('Vous êtes sure ?');
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