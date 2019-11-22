<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<?php 
include("../includes/bootstrap.php");
include("../conn.php");
  ?>
    <title>MYSQL Project</title>
    </head>
    <header>
    <?php 
    include("../includes/nav.php");
    ?>
  </header>
  <main style="padding-top:200px;">
    <!-- body -->

<div class="container">


    <div class="card border-primary mb-3" style="max-width: auto">


<div class="card-header border-primary text-success">
  UPDATE THE EMPLOYEE GRADE DETAILS
</div>
<div class="card-body">
<?php 

if (isset($_POST['update'])){
$empl_id = $_POST['empl_id'];
$grade_id = $_POST['grade_id'];

$update = "UPDATE empl_grade_details SET grade_id = $grade_id WHERE empl_id = $empl_id";
$up = $mysqli->query($update);

if ($up){
    ?>
    <div class="alert alert-success container" role="alert">
  The employee grade details has been upadated successfully

  <script> setTimeout(function(){ window.open('../admin/salaries.php','_self')}, 3000);</script>
  </div>
    <?php 
    
}else{
    ?>
<div class="alert alert-danger container" role="alert">
  An error was encountered. <?php echo $mysqli->error; ?>
  </div>
    <?php
}
}
?>
  <h3 class="card-title"></h3>
  <form method="POST" action="">
  <table class="table table-striped">
<thead>
  <tr>
    <th scope="col">EMPLOYEE ID</th>
    <th scope="col">GRADE ID</th>
    <th scope="col">UPDATE</th>
  </tr>
</thead>
<tbody>
<tr>
  <th scope="row"> 
      <div class="form-group">
  <select class="form-control" id="user" name="empl_id">
    <?php 
$empl_grade = "SELECT * FROM EMD.empl_grade_details";
$us = $mysqli->query($empl_grade);
while($row=$us->fetch_assoc()){
?>
 <option value='<?php echo $row['empl_id'];?>' > <?php echo $row['empl_id']; ?></option>
<?php
}
$us->free();
    ?>
   
  </select>
</div>
</th>
    <td>
    <div class="form-group">
  <select class="form-control" id="user" name="grade_id">
    <?php 
$empl_grade = "SELECT grade_id FROM EMD.grade_details";
$tb = $mysqli->query($empl_grade);
while($row=$tb->fetch_assoc()){
?>

 <option value='<?php echo $row['grade_id'];?>' > <?php echo $row['grade_id']; ?></option>
<?php
}
$tb->free();
    ?>
    </td>
   
    <td> <button onclick = "return confirm('Are you sure you want to update the employee grade details?')" type="submit" class="btn btn-primary" name="update"> UPDATE</button></td> 
</tbody>
</table>
</form>


</div>
<div class="card-footer text-muted border-primary">
updating the grade details of the employees
</div>









<?php
    include("../includes/javascript.php");

?>
    </main>
  <div class="fixed-bottom">
<?php include('../includes/footer.php');?>

</div>
</html>
<?php session_start(); ?>
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
  <main style="padding-top:200px;">
    <!-- body -->
<?php
    include("../includes/javascript.php");

?>
    </main>
  <div class="fixed-bottom">
<?php include('../includes/footer.php');?>

</div>
</html>
  