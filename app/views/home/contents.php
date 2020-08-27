<?php

include './app/models/DatabaseConnection/Database.php';
include 'SetUp.php';
//include './app/views/HeaderAndFooter/header.php';

  if (!(isset($_SESSION))){
  session_start();
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel = "stylesheet" href = "./bootstrap/css/bootstrap.min.css" integrity="" crossorigin="anonymous">
    <link rel = "stylesheet" href = "./css/styles.css">
    <title></title>
  </head>
  <body  class ="mainbody ">
    <div class="container ">
    <?php
        setup();
        if (isset($_SESSION["Patient"])){
          unset($_SESSION["Patient"]);
          unset($_SESSION["regNo"]);
        }
        if (isset($_SESSION["regNo"])){
          unset($_SESSION["regNo"]);
        }
    ?>


      <div class="row justify-content-center  ">
        <div class="  col-lg-2 col-md-6">
          <form >


          <button type="button" class=" roundbtn" onclick="window.location.href = './app/views/NewPatient/NewPatientForm.php';">
          <img src="./css/add-user.png" alt="" class="iconsize"></button>
          <div><label class='optionText'  >Create New Patient </label></div>

          <!-- <div class = "optionText">Create New Patient</div> -->
          <!-- Create New Patient -->
          </form>
        </div>
        <div class="col-lg-2 col-md-6">
          <form >
          <button type="button" class=" roundbtn" onclick="window.location.href = './app/views/Searching.php';">
          <img src="./css/refresh.png" alt="" class="iconsize"></button>
          <div> <label class='optionText'>Update Existing Patient </label></div>

          </form>
        </div>
        <div class="col-lg-2 col-md-6">
          <form>
          <button type="button" class=" roundbtn" onclick="window.location.href = './app/views/Filtering/FilterBar.php';">
          <img src="./css/filter copy.png" alt="" class="iconsize"></button>
          <div><label class='optionText'>Filter Patients</label></div>


          </form>
        </div>
        <div class="col-lg-2 col-md-6">
          <form>
          <button type="button" class=" roundbtn" onclick="window.location.href = './app/views/DischargedPatient/Intermediate.php';">
          <img src="./css/bed.png" alt="" class="iconsize" ></button>
          <div><label class='optionText'>View Discharged Patients</label></div>


          </form>
        </div>
    </div>
  </div>

  </body>


</html>
