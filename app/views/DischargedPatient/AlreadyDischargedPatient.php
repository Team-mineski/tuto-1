<?php
include '../layouts/docmenu.php';
include '../../classes/Patient.php';
include '../HeaderAndFooter/Discharged.php';
include '../../models/DatabaseConnection/Database.php';

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
  <body >
  <?php

    $medical = Database::getInstance();
    if(isset($_POST["regNo"])){
        $regNo = $_POST["regNo"];
    }
    $columns = array('RegNo', 'FullName', 'Age', 'Gender', 'FullAddress',
    'DateOfBirth', 'Diagnosis','ContactNo', 'BedNo');
    $results =  $medical->retrieveData("dischargedPatients", $columns, $regNo);
    if (mysqli_num_rows($results)!=0)
    {
        while($row = mysqli_fetch_array($results)){
          $regNo = $row['RegNo'];
          $diagnosis =  $row['Diagnosis'];
          $name = $row['FullName'];
          $age =  $row['Age'];
          $gender =  $row['Gender'];
          $address =  $row['FullAddress'];
          $dob =  $row['DateOfBirth'];
          $contact = $row['ContactNo'];
          $bedNo = $row['BedNo'];
          if ($bedNo=='')
          {
              $admission="Not admitted";
          }
          else{
                  $admission = "Admitted";
              }
          }
    }
    $patient = new Patient($regNo, $name, $age, $address,$diagnosis,$dob,$gender,$admission, $bedNo, $contact,"Discharged");
    //include 'FormDischargedPatient.php';
    $patient->displayUI();
    
    
  ?>