<?php
include '../layouts/docmenu.php';
include '../../models/DatabaseConnection/Database.php';

if (!(isset($_SESSION))){
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="../../../js/jQuery-2.2.4.min.js"></script>
    <script src="../../../bootstrap/js/bootstrap.min.js"></script>
    <link rel = "stylesheet" href = "../../../bootstrap/css/bootstrap.min.css" integrity="" crossorigin="anonymous">
    <link rel = "stylesheet" href = "../../../style.css">
    <link rel = "stylesheet" href = "../../../css/styles.css">
    
    <title></title>
  </head>

  <body class ="mainbody">

   <div class = 'container'>
   <form action ="../../controllers/Filter Control/Filtering.php" method = "post">
      <div class="row h-100 ">

        <div class="col-lg-5  align-self-center">
          <img src="../../../css/doctor.png" alt="" class ="bigsearch">
        </div>

        <div class="col-lg-3 align-self-center">


              <div class="form-group ">
                <h3 class ="mainText"> Search for patient </h3>
                <input type="Search" class="form-control boxstyles" name='diagnosis'
                 placeholder="Enter diagnosis" autocomplete="off" required>
              </div>

        </div>

        <div class="col-lg-4 align-self-center ">
              <button type="submit" name = 'submit' class ="roundsearchbtn">
                <img src="../../../css/search.png" alt="" class="searchicon"></button>
              </div>
      </div>
    </div>

    </form>





    <!-- <h4> Search for patient </h4>
    <br>
    <form action ="../../controllers/Filter Control/Filtering.php" method = "post">

      <div class="form-row">
          <div class="form-group col-md-3">
              <input type="Search" class="form-control" name='diagnosis' placeholder="Enter diagnosis" autocomplete="off" required>
          </div>
      </div>
      <br>
      <button type="submit" name = 'submit'>Search</button>
    </form> -->
    </div>

  </body>

</html>
