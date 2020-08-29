<?php
include '../layouts/docmenu.php';
include_once '../../models/DatabaseConnection/Database.php';
include '../home/cache.php';
  if (!(isset($_SESSION))){
  session_start();
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="../../../js/jQuery-2.2.4.min.js"></script>
    <script src="../../../bootstrap/js/bootstrap.min.js"></script>
    <link rel = "stylesheet" href = "../../../bootstrap/css/bootstrap.min.css" integrity="" crossorigin="anonymous">
    <link rel = "stylesheet" href = "../../../style.css">
    <link rel = "stylesheet" href = "../../../css/styles.css">
    
    <title></title>
  </head>
  <body class ="mainbody">
  <div class = container " style ="padding:10px;">
  <table class="table table-bordered" >
    <br>
    <thead>
      <tr>
          <th  style="text-align:center" scope="col" class="textStyle"><b>Patient ID</b> </th>
          <th style="text-align:center" scope="col" class="textStyle"> <b>Patient File</b> </th>
      </tr>
    </thead>
    <tbody>
  <?php
        $medical = Database::getInstance();
        $results =  $medical->retrieveAllData("dischargedPatients");
          while($row = mysqli_fetch_array($results)){
            $regNo = $row['RegNo'];
            echo
            "
            <form method=\"post\" action=\"AlreadyDischargedPatient.php\">
              <tr>
              <td style=\"text-align:center\">  <input type=\"text\" style=\"text-align:center\" class=\"form-control w-50\" name=\"regNo\" value=$regNo readonly>  </td>
              <td style=\"text-align:center\">  <input type=\"submit\" name=\"action\" value=\"View Patient File\" class='btn btn-outline-success'/>  </td>
              </tr>

            </form>
            
            "
        ;
          }
          ?>
          </tbody>
  </div>
  </body>


</html>
