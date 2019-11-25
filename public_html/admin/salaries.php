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
  <main style="padding-top:70px;">
  <div class="container">
    <!-- body -->
    
    <!--grade details-->
    <div class="jumbotron">
      <?php 
      include("../conn.php");
      if ($_GET['del']){
        $id = $_GET['del'];
        $delete = "DELETE FROM grade_details WHERE grade_id = $id";
        $del = $mysqli->query($delete);
        if($del){
          ?>
          <div class="alert alert-success container" role="alert">
  Deletion been completed successfuly.
  </div>
          <?php
        }else{
          ?>
          <div class="alert alert-danger container" role="alert">
  An error has been encountered. <?php echo $mysqli->error; ?>
  </div>
          <?php
        }

      }
      ?>
    <?php
include("../conn.php");
 
$query = "SELECT * FROM grade_details";
?>

<h1 class="text-success"> THE GRADE DETAILS</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">GRADE ID</th>
      <th scope="col">GRADE NAME</th>
      <th scope="col">GRADE BASIC</th>
      <th scope="col"> HOUSE ALLOWANCE</th>
      <th scope="col"> TRANSPORT ALLOWANCE </th>
      <th scope="col">MEDICAL ALLOWANCE </th>
      <th scope="col">BONUS </th>
      <th scope="col"> TAX BAND </th>
      <th scope="col"> DELETE </th>
      <th scope ="col"> UPDATE </th>

    </tr>
  </thead>

  <tbody>
  <?php
if ($result = $mysqli->query($query)) {
 
    while ($row = $result->fetch_assoc()) {
        $id = $row["grade_id"];
        $name = $row["grade_name"];
        $basic = $row["grade_basic"];
        $HA = $row["grade_HA"];
        $TA = $row["grade_TA"];
        $MA = $row["grade_MA"];
        $bonus = $row["grade_bonus"];
        $tax = $row["grade_tas"];
 ?>
    
    <tr>
      <th scope="row"><?php echo $id; ?></th>
      <td><?php echo $name; ?></td>
      <td><?php echo $basic; ?></td>
      <td><?php echo $HA; ?></td>
      <td><?php echo $TA; ?></td>
      <td><?php echo $MA; ?></td>
      <td><?php echo $bonus; ?></td>
      <td><?php echo $tax; ?></td>
      <td> <a href='?del=<?php echo $id; ?>'> <button type="button" onclick = "return confirm('You are about to delete a grade from the database?')" class="btn btn-danger">DELETE</button> </a></td>
      <td> <a href='../admin/update_grade.php?update=<?php echo$id; ?>'> <button type="button" class="btn btn-primary">UPDATE</button></a></td>
      
    </tr>

              <?php
    }
 
/*freeresultset*/
$result->free();
}
?>
</tbody>
</table>
<p> <a href="../admin/add_grade.php">TO ADD ANOTHER GRADE CLICK HERE</a> </p>
</div>
<br>

<!--employee salary details -->
<div class="jumbotron">
<?php
$username = $_SESSION['user'];
$password = $_SESSION['pass'];
$database = "EMD";
$mysqli = new mysqli("localhost", $username, $password, $database);
 
$query = "SELECT * FROM empl_salary_view;";
?>

<h1 class="text-success"> THE EMPLOYEE SALARY RECORD</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">EMPLOYEE ID</th>
      <th scope="col">MONTH SALARY</th>
      <th scope="col"> YEAR SALARY</th>
      <th scope="col"> GRADE ID </th>
      <th scope="col">BASIC PAY </th>
      <th scope="col">ALLOWANCE </th>
      <th scope="col"> DEDUCTIONS </th>
      <th scope="col"> DELETE </th>
      

    </tr>
  </thead>

  <tbody>
  <?php
if ($result = $mysqli->query($query)) {
 
    while ($row = $result->fetch_assoc()) {
        $id = $row["empl_id"];
        $name = $row["empl_month_salary"];
        $basic = $row["empl_year_pay"];
        $HA = $row["empl_grade_id"];
        $TA = $row["empl_basic"];
        $MA = $row["empl_AL"];
        $bonus = $row["empl_deductions"];
        
    ?>
    <tr>
      <th scope="row"><?php echo $id; ?></th>
      <td><?php echo $name; ?></td>
      <td><?php echo $basic; ?></td>
      <td><?php echo $HA; ?></td>
      <td><?php echo $TA; ?></td>
      <td><?php echo $MA; ?></td>
      <td><?php echo $bonus; ?></td>
      <td> <a href=''?del=<?php $id ?> > <button type="button" class="btn btn-danger">DELETE</button> </a></td>
      
      
    </tr>

              <?php
    }
 
/*freeresultset*/
$result->free();
}
?>
</tbody>
</table>
<p> <a href="../admin/empl_grade_update.php"> CLICK HERE TO UPDATE THE EMPLOYEE GRADE DETAILS </a></p>
</div>


<?php
    include("../includes/javascript.php");

?>

</div>
    </main>
  <div class="fixed-bottom">
<?php include('../includes/footer.php');?>

</div>
</html>
  