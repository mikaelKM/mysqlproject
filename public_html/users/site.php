<?php session_start();

if (empty($_SESSION['user'])){
  echo '<script> window.open(\'/\',\'_self\')</script>';
}

?>
<?php
//deleting an employee from the employee bio table
include ('../conn.php');
if (isset($_GET['del'])){
  $id = $_GET['del'];
  $query = "DELETE FROM employee_bio WHERE emp_id = '$id'";

  $del = $mysqli->query($query);
  if ($del){
    echo 'deletion went on successfully';
  }else{
    echo 'ecncountered an error'. $mysqli->error;
  }
}
?>


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

  <?php
//deleting an employee from the employee bio table
include ('../conn.php');
if (isset($_GET['del'])){
  $id = $_GET['del'];
  $query = "DELETE FROM employee_bio WHERE emp_id = '$id'";

  $del = $mysqli->query($query);
  if ($del){
    ?>
    <div class="alert alert-success container" role="alert">
  Deletion been completed successfuly.
  </div>
    <?php
  }else{
    ?>
    <div class="alert alert-danger container" role="alert">
  Deletion not completed successfully. <?php echo $mysqli->error; ?>
</div>
    <?php
  }
}
?>

    <!-- body -->
    <!-- employee bio -->
    <?php
$username = $_SESSION['user'];
$password = $_SESSION['pass'];
$database = "EMD";
$mysqli = new mysqli("localhost", $username, $password, $database);
 
$query = "SELECT * FROM all_empl_bio";
?>

<h1 class="text-success"> THE EMPLOYEES BIO </h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">EMPLOYEE ID</th>
      <th scope="col">EMPLOYEE TITLE</th>
      <th scope="col">EMPLOYEE NAME</th>
      <th scope="col"> DATE OF BIRTH</th>
      <th scope="col">DATE OF JOINING </th>
      <th scope="col"> DELETE </th>
      <th scope ="col"> UPDATE </th>
    </tr>
  </thead>
  <tbody>
  <?php
  
if ($result = $mysqli->query($query)) {
 
    while ($row = $result->fetch_assoc()) {
        $id = $row["emp_id"];
        $title = $row["empl_title"];
        $fname = $row["empl_fname"];
        $lname = $row["empl_lname"];
        $dob = $row["empl_dob"];
        $doj = $row["empl_doj"];
 ?>
    
    <tr>
      <th scope="row"><?php echo $id; ?></th>
      <td><?php echo $title; ?></td>
      <td><?php echo $fname.' '.$lname; ?></td>
      <td><?php echo $dob; ?></td>
      <td><?php echo $doj; ?></td>
      <td> <a href='?del=<?php echo $id; ?>' > <button onclick = "return confirm('Are you sure you want to delete the employee? This will remove the emoployee from the database')" type="button" class="btn btn-danger">DETELE</button> </a></td>
      <td> <a href='../users/update.php?update_bio=<?php echo $id; ?>'><button onclick = "return confirm('Are you sure you want to update the employee bio?')" type="button" class="btn btn-primary">UPDATE</button></td></a>
    </tr>

              <?php
    }
 
/*freeresultset*/
$result->free();
}else {
echo "ERROR";
}
?>
</tbody>
<tfoot>
    <tr>
      <th scope="col">EMPLOYEE ID</th>
      <th scope="col">EMPLOYEE TITLE</th>
      <th scope="col">EMPLOYEE NAME</th>
      <th scope="col"> DATE OF BIRTH</th>
      <th scope="col">DATE OF JOINING </th>
      <th scope="col"> DELETE </th>
      <th scope ="col"> UPDATE </th>
    </tr>
  </tfoot>
</table>
<br>
<!---The grade details -->

<?php
$username = $_SESSION['user'];
$password = $_SESSION['pass'];
$database = "EMD";
$mysqli = new mysqli("localhost", $username, $password, $database);
 
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
      <td> <a href=''?del=<?php $id ?> > <button type="button" class="btn btn-danger">DETELE</button> </a></td>
      <td> <button type="button" class="btn btn-primary">UPDATE</button></td>
      
    </tr>

              <?php
    }
 
/*freeresultset*/
$result->free();
}
?>
</tbody>
</table>

<!-- employee work details -->

<?php
$username = $_SESSION['user'];
$password = $_SESSION['pass'];
$database = "EMD";
$mysqli = new mysqli("localhost", $username, $password, $database);
 
$query = "SELECT * FROM empl_work_details";
?>

<h1 class="text-success"> EMPLOYEE WORK DETAILS</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">EMPLOYEE ID</th>
      <th scope="col">EMPLOYEE TITLE</th>
      <th scope="col"> FROM DATE</th>
      <th scope="col"> TO DATE </th>
      <th scope="col">GRADE name</th>
      <th scope="col">DEPARTMENT NAME</th>
      <th scope="col"> DELETE </th>
      <th scope ="col"> UPDATE </th>

    </tr>
  </thead>

  <tbody>
  <?php
if ($result = $mysqli->query($query)) {
 
    while ($row = $result->fetch_assoc()) {
        $empl_id = $row["empl_id"];
        $empl_title = $row["emp_title"];
        $f_date = $row["empl_from_date"];
        $t_date = $row["empl_to_date"];
        $grade = $row["grade_name"];
        $dpr = $row['dpt_name'];
        
 ?>
    
    <tr>
      <th><?php echo $empl_id; ?></td>
      <td><?php echo $empl_title; ?></td>
      <td><?php echo $f_date; ?></td>
      <td><?php echo $t_date; ?></td>
      <td><?php echo $grade; ?></td>
      <td><?php echo $dpr; ?></td>
      <td> <button type="button" class="btn btn-danger">DETELE</button></td>
      <td> <button type="button" class="btn btn-primary">UPDATE</button></td>
      
    </tr>

              <?php
    }
 
/*freeresultset*/
$result->free();
}
?>
</tbody>
<tfoot>
    <tr>
      <th scope="col">EMPLOYEE ID</th>
      <th scope="col">EMPLOYEE TITLE</th>
      <th scope="col"> FROM DATE</th>
      <th scope="col"> TO DATE </th>
      <th scope="col">GRADE NAME</th>
      <th scope="col">DEPARTMENT NAME</th>
      <th scope="col"> DELETE </th>
      <th scope ="col"> UPDATE </th>

    </tr>
  </tfoot>
</table>





</div>
<?php
    include("../includes/javascript.php");

?>
    </main>
  <div class="fixed-bottom">
<?php include('../includes/footer.php');?>

</div>
</html>