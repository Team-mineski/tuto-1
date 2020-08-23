<?php
  include '../../models/DatabaseConnection/Database.php';
  include '../../models/Validation.php';
  include '../HeaderAndFooter/header.php';
  include '../../classes/Patient.php';
  //include '../../cache.php';
  if (!(isset($_SESSION))){
    session_start();
    }
    $patient = $_SESSION["Patient"];
    ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel = "stylesheet" href = "../../bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel = "stylesheet" href = "../../css/styles.css">
    <title></title>
  </head>
  <body class ="mainbody">
  <div class = "container">

    <form action ="../../controllers/EditConfirmation.php" method = "post">

        <div class="form-row"; style = overflow-y: scroll;> 

          <div class="col-md-3 mb-3 col-md-offset-4 mr-3">
              <label for="regNo">Registration Number</label>
              <input type="text" class="form-control" id="regNo" name="regNo" placeholder="Registration Number" value='<?php echo $patient->getRegNo();?>' readonly>          
          </div>
          
        </div>
        
        <div class="form-row">

          <div class="col-md-6 mb-3 col-md-offset-2">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value='<?php echo $patient->getName();?>' readonly>
          </div>

          <div class="ml-5">
            <div class="col-md-7 mb-3 col-md-offset-4 mr-3">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" placeholder="Age" value='<?php echo $patient->getAge();?>' readonly>          
            </div>
          </div>
          
        </div>

        <div class="form-row">

          <div class="col-md-6 mb-3 col-md-offset-4">
              <label for="diagnosis">Diagnosis</label>
              <input type="text" class="form-control" id="diagnosis" name="diagnosis" placeholder="Diagnosis" value='<?php echo $patient->getDiagnosis();?>' >          
          </div>
          
        </div>

        <div class="form-row">

          <div class="col-md-6 mb-3 col-md-offset-4">
              <label for="address">Full Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Full Address" value='<?php echo $patient->getAddress();?>' >          
          </div>

          <div class="ml-5">
          <div class="col-md-10 mb-3 col-md-offset-4">
              <label for="address">Contact No.</label>
              <input type="tel" class="form-control" id="contact" name="contact" placeholder="Contact Number"  value='<?php echo  $patient->getContact();?>' autocomplete="off" required minlength="10" maxlength="12">                  
          </div>
          </div>
          
        </div>

        <div class="form-row">
          <div class="col-md-2 mb-3 col-md-offset-4">
              <label for="dob">Date of Birth</label>
              <input type="text" class="form-control" id="dob" name="dob" value='<?php echo  $patient->getDOB();?>' readonly>          
          </div>
          <div class="col-md-2 mb-3 col-md-offset-4">
              <label for="gender">Gender</label>
              <input type="text" class="form-control" id="gender" name="gender" value='<?php echo  $patient->getGender();?>' readonly>          
          
          </div>

          <div class="col-sm-12">
            <legend class="col-form-label col-sm-2 pt-0">Admitted </legend> 
            <?php if ($patient->getAdmissionStatus()=="Not admitted"){
            echo" <input type=\"radio\" onclick=\"javascript:yesnoCheck();\" name=\"admitted\" id=\"yesCheck\" value = 'true'>  Yes<br>
                  <input type=\"radio\" onclick=\"javascript:yesnoCheck();\" name=\"admitted\" id=\"noCheck\" value='false' checked> No<br>";
            }
            else{
              echo" <input type=\"radio\" onclick=\"javascript:yesnoCheck();\" name=\"admitted\" id=\"yesCheck\" value = 'true' checked>  Yes<br>
                  <input type=\"radio\" onclick=\"javascript:yesnoCheck();\" name=\"admitted\" id=\"noCheck\" value='false' > No<br>";
            }
            ?>
            <div class="col-md-2 mb-3 col-md-offset-4">
                  <div id="ifYes" style="visibility:hidden">
                    Bed Number: <input type="text" class="form-control" id="bed" name="bed"  autocomplete="off" >
                  </div>
            </div>
        </div>

        <div class="form-row">
              <button type = "submit" name = "test" class ="btn btn-outline-success"> Confirm </button>
        </div>
        
    </form>
  </div>
  </body>
</html>

<script>
    function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.visibility = 'visible';
    }
    else document.getElementById('ifYes').style.visibility = 'hidden';
    }

  </script>