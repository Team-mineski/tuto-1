
<?php
include '../../views/layouts/docmenu.php';
  include '../../models/DatabaseConnection/Database.php';
  include '../../models/Validation.php';
  include '../../classes/Patient.php';

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
    
  </head>
  <body class="mainbody">
  <div class = "container">

  <?php
  if(isset($_POST["diagnosis"])){
    $diagnosis = $_POST["diagnosis"];
    $_SESSION["diagnosis"] = $diagnosis;
  }
  else{
    if(isset($_SESSION["diagnosis"])){
      $diagnosis = $_SESSION["diagnosis"];
    }
  }
    // echo "Diagnosis selected : $diagnosis";
     echo"<br>";
     echo "<h5 class =\"textStyle\">Diagnosis selected : $diagnosis</h5> ";
    $medical = Database::getInstance();
    $columns = array('RegNo', 'FullName', 'Age', 'Gender', 'FullAddress', 'DateOfBirth', 'Diagnosis',  'BedNo','ContactNo');
    $results =  $medical->filterDataByDiagnosis( "patients", $columns, $diagnosis);

    if (mysqli_num_rows($results)!=0) { 
      echo "<table class=\"table table-bordered\" >
      <thead>
        <tr>
            <th style=\"text-align:center\" scope=\"col\"class='textStyle' > <b>Registration No.</b> </th>
            <th style=\"text-align:center\" scope=\"col\" class='textStyle' ><b>Patient Name</b> </th>
            <th style=\"text-align:center\" scope=\"col\" class='textStyle' ><b>Age</b> </th>
            <th style=\"text-align:center\" scope=\"col\" class='textStyle' ><b>Gender</b> </th>
            <th style=\"text-align:center\" scope=\"col\" class='textStyle' ><b>History</b> </th>
        </tr>
      </thead>
      <tbody>";
      while($row = mysqli_fetch_array($results)){
        $regNo = $row['RegNo'];
        $name = $row['FullName'];
        $age =  $row['Age'];
        $gender =  $row['Gender'];
        echo 
            "
            <form method=\"post\" action=\"../PatientForms/ExistingTreatmentsFiltered.php\">
            <tr>
              <td > <input type=\"text\" style=\"text-align:center\" class=\"form-control boxstyles\" name=\"regNo\" value=$regNo readonly/> </td>
              <td > <input type=\"text\" style=\"text-align:center\" class=\"form-control boxstyles\" value=$name readonly/> </td>
              <td > <input type=\"text\" style=\"text-align:center\" class=\"form-control boxstyles\" value=$age readonly/> </td>
              <td > <input type=\"text\" style=\"text-align:center\" class=\"form-control boxstyles\" value=$gender readonly/> </td>
              <td style=\"text-align:center\">  <input type=\"submit\" name=\"action\" value=\"View Patient History\" class='btn btn-outline-success'/>  </td>
            </form>
            
            ";
    }
  }
    else{
      echo "<br>";
      echo "<h4 align = 'center' class =\"textStyle\">Selected diagnosis not available in any patients in the database</h4> ";
    
  }


  ?>
</div>
  <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }

</script>
      
  </body>
</html>

