<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<?php 
include("../includes/bootstrap.php");
  ?>
    <title>MYSQL Project</title>
    </head>
    <header>
    <?php 
    include("../includes/nav.php");
    ?>
  </header>
  <main style="padding-top:70px;">
  <!-- body -->
<div class='container'>

  <div class="jumbotron">
  <h1 class="display-4">ADD Department</h1>
  <form method='POST' action='/admin/admin_main.php'>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Department Name" name='dpt_name' required>
    </div>
    <div class="col">
      <input type="number" class="form-control" placeholder="Department Id" name='dpt_id' required>
    </div>
    <div class="col">
      <input type="number" class="form-control" placeholder="No of Employees" name='no_empl' required>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <!--<input type="text" class="form-control" placeholder="Department Name">-->
    </div>
    <div class="col">
    <button type="submit" class="btn btn-primary" name='add_dpt'>ADD DEPARTMENT</button>
    </div>
    <div class="col">
     <!-- <input type="text" class="form-control" placeholder="No of Employees">-->
    </div>
  </div>
</form>
</div>
<br>
<!--adding employee to the database-->
<div class="jumbotron">
  <h1 class="display-4">ADD EMPLOYEE</h1>
  <form method='POST' action='/admin/admin_main.php'>
  <div class="row">
    <div class="col">
      <input type="number" class="form-control" placeholder="Employee ID" name='empl_id' required>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Eployee Title" name='empl_ttl' required>
    </div>
    </div>
    <br>
    <div class ='row'>
    <div class="col">
      <input type="text" class="form-control" placeholder="Employee First Name" name='empl_fname' required>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Employee Last Name" name='empl_lname' required>
    </div>
    </div>
  <br>
  <div class="row">
    <div class="col">
    <label for='dob'>Date Of Birth</label>
      <input type="date" id='dob' class="form-control" placeholder="Date of Birth" name='empl_dob' required>
    </div>
    <div class="col">
    <label for='doj'>Date Of Joining</label>
    <input type="date" id='doj' class="form-control" placeholder="Date of Joing" name='empl_doj' required>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
    <label for='phone'>PHONE</label>
      <input type="number" id='phone' class="form-control" placeholder="0797753625" name='phone' required>
    </div>
    <div class="col">
    <label for='email'>Email</label>
    <input type="email" id='email' class="form-control" placeholder="example@email.com" name='email' required>
    </div>
    <div class="col">
    <label for='adr'>Adress</label>
    <input type="text" id='adr' class="form-control" placeholder="P.O BOX 0000 Nairobi" name='adress' >
    </div>
  </div>
  <br>
  <div class='row'>
  <div class='col'>
  <button type="submit" class="btn btn-primary" name='add_empl'>ADD employee</button>
  </div>
  </div>
</form>
</div>
<br>


<!--adding the employee work details to the database -->
<div class="jumbotron">
  <h1 class="display-4">ADD EMPLOYEE  WORK DETAILS</h1>
  <form method='POST' action='/admin/admin_main.php'>
  <div class="row">
    <div class="col">
      <input type="number" class="form-control" placeholder="Employee ID" name='empl_id' required>
    </div>
    <div class="col">
      <input type="number" class="form-control" placeholder="Epartment ID" name='dpt_id' required>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Employee Title" name='empl_title' required>
    </div>
    </div>
    <br>
    <div class ='row'>
    <div class="col">
    <label for='e_g'>Employee grade</label>
      <input type="number" id='e_g' class="form-control" placeholder="Employee Grade" name='empl_grade' required>
    </div>
    <div class="col">
    <label for='d_from'>From Date</label>
      <input type="date" id='d_from' class="form-control" placeholder="Employee from date" name='empl_from' required>
    </div> 
    <div class="col">
    <label for='d_to'>To Date</label>
      <input type="date" id='d_to' class="form-control" placeholder="Employee to Date" name='empl_to' required>
    </div>
    </div>
  <br>
  
  <div class='row'>
  <div class='col'>
  <button type="submit" class="btn btn-primary" name='add_work_details'>ADD employee Work Details</button>
  </div>
  </div>
</form>
</div>


</div>



    
<?php
    include("../includes/javascript.php");

?>
    </main>
  <div class="fixed-bottom">
<?php include('../includes/footer.php');?>

</div>
</html>
  
