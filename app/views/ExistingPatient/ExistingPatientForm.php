<?php
if (!(isset($_SESSION))){
  session_start();
}
$patient = $_SESSION["Patient"];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="../../../js/jQuery-2.2.4.min.js"></script>
    <script src="../../../bootstrap/js/bootstrap.min.js"></script>
    <link rel = "stylesheet" href = "../../bootstrap/css/bootstrap.min.css" integrity="" crossorigin="anonymous">
    <link rel = "stylesheet" href = "../../style.css">
    <link rel = "stylesheet" href = "../../css/styles.css">
    <title></title>
  </head>
  <body >
  <br>
  <div class = containor  style="margin-left:20px; margin-right:20px;">

    <form action ="" method = "post">

        <div class="form-row">
         

          <div class="col-md-3 mb-3 col-md-offset-4 mr-3">
              <label for="regNo" class ="textStyle">Registration Number</label>
              <input type="text" class="form-control boxstyles" id="regNo" name="regNo" placeholder="Registration Number" value='<?php echo $patient->getRegNo();?>' readonly>          
          </div>
          
        </div>
        
        <div class="form-row">

          <div class="col-md-6 mb-3 col-md-offset-2">
            <label for="name" class ="textStyle">Full Name</label>
            <input type="text" class="form-control boxstyles" id="name" name="name" placeholder="Full Name" value='<?php echo  $patient->getName();?>' readonly>
          </div>

          <div class="ml-5">
            <div class="col-md-7 mb-3 col-md-offset-4 mr-3">
                <label for="age" class ="textStyle">Age</label>
                <input type="text" class="form-control boxstyles" id="age" name="age" placeholder="Age" value='<?php echo  $patient->getAge();?>' readonly>          
            </div>
          </div>
          
        </div>

        <div class="form-row">

          <div class="col-md-6 mb-3 col-md-offset-4">
              <label for="diagnosis" class ="textStyle">Diagnosis</label>
              <input type="text" class="form-control boxstyles " id="diagnosis" name="diagnosis" placeholder="Diagnosis" value='<?php echo $patient->getDiagnosis();?>' readonly>          
          </div>
          
        </div>

        <div class="form-row">

          <div class="col-md-6 mb-3 col-md-offset-4">
              <label for="address" class ="textStyle">Full Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Full Address" value='<?php echo$patient->getAddress();?>' readonly>          
          </div>

          <div class="ml-5">
          <div class="col-md-10 mb-3 col-md-offset-4">
              <label for="address" class ="textStyle">Contact No.</label>
              <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact Number"  value='<?php echo $patient->getContact();?>' readonly>          
          </div>
          </div>
          
        </div>

        <div class="form-row">
          <div class="col-md-2 mb-3 col-md-offset-4">
              <label for="dob" class ="textStyle">Date of Birth</label>
              <input type="date" class="form-control" id="dob" name="dob" value='<?php echo $patient->getDOB();?>' readonly>          
          </div>
          <div class="col-md-2 mb-3 col-md-offset-4">
              <label for="gender" class ="textStyle">Gender</label>
              <input type="text" class="form-control" id="gender" name="gender" value='<?php echo $patient->getGender();?>' readonly>          
        </div>

          <div class="col-md-2 mb-3 col-md-offset-4">
              <label for="gender" class ="textStyle">Admission Status</label>
              <input type="text" class="form-control" id="admission" name="admission" value='<?php echo $patient->getAdmissionStatus();?>' readonly>          
          
          </div>
          <?php 
          $bedNo=$patient->getBedNo();
          if ($bedNo!=''){
            echo "<div class=\"col-md-2 mb-3 col-md-offset-4\">
            <label for=\"gender\">Bed Number</label>
            <input type=\"text\" class=\"form-control\" id=\"bedNo\" name=\"bedNo\" value='$bedNo' readonly>          
        
        </div>";
          }
          //../../view/DischargedPatient/ConfirmDischarge.php
          //<button class="btn btn-outline-primary mr-4" type = "submit" name = "test"> Discharge Patient </button>
          ?>
        </div>
        
        
    </form>
    <div class="form-row">
              <form action = "ExistingTreatments.php" method = post>
              
                <button class="btn btn-outline-success mr-4" type = "submit" name = "treatment"> History </button>
              </form>
              <br>

              <form action = "../../views/ExistingPatient/TestResults.php" method = post>
                  <button class="btn btn-outline-success mr-4" type = "submit" name = "test"> Test Results </button>
              </form>
              <br>

              <form action = "../../views/ExistingPatient/EditableForm.php" method = post>
                  <button class="btn btn-outline-success mr-4" type = "submit" name = "test"> Edit Form </button>
              </form>

              <br>

              <form action = "../../views/ExistingPatient/NewTests.php" method = post>
                  <button class="btn btn-outline-success mr-4" type = "submit" name = "test"> Order New Tests </button>
              </form>

              <br>

              <form action = "../../views/DischargedPatient/NewlyDischargedPatient.php" method = post>
                  <button class="btn btn-outline-success mr-4" type = "submit"  onclick="return  confirm('Are you sure you want to discharge this patient?')">Discharge Patient </>
              </form>

              <br>

              <form action = "../../../" method = post>
                  <button class="btn btn-outline-success mr-4" " name = "test"> Return to Main Menu </button>
            </form>

            </div>
            <br>
            <br>
  </body>
</html>