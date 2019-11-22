<?php session_start(); 
if (empty($_SESSION['user'])){
  echo '<script> window.open(\'/\',\'_self\')</script>';
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
    <!-- body -->
 
    <?php 
    include('../conn.php');
    if (isset($_GET['update_bio'])){
        $id = $_GET['update_bio'];
$select = "SELECT * FROM employee_bio WHERE emp_id = '$id'";
        $dt=$mysqli->query($select);
        $row = $dt->fetch_assoc();
            $title = $row["empl_title"];
            $fname = $row["empl_fname"];
            $lname = $row["empl_lname"];
            $dob = $row["empl_dob"];
            $doj = $row["empl_doj"];
        
        ?>
        <div class='container'>

<div class="jumbotron">
<?php
    include('../conn.php');
    if (isset($_POST['update'])){
      $id =  mysqli_real_escape_string($mysqli,$_POST['empl_id']);
      $title = mysqli_real_escape_string($mysqli, $_POST['title']);
      $fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
      $lname = mysqli_real_escape_string($mysqli, $_POST['lane']);
      $dob = mysqli_real_escape_string($mysqli, $_POST['dob']);
      $doj = mysqli_real_escape_string($mysqli, $_POST['doj']);

$update = "UPDATE employee_bio SET empl_title='$title',empl_fname='$fname',empl_dob='$dob',empl_doj='$doj' WHERE emp_id='$id'";
$up = $mysqli->query($update);

if ($up){
  ?>
  <div class="alert alert-success" role="alert">
  Update Successful.
  <script> setTimeout(function(){ window.open('../users/site.php','_self')}, 3000);</script>
</div>
<?php
}else{
  ?>
  <div class="alert alert-danger" role="alert">
  Update not completed successfully. <?php echo $mysqli->error; ?>
</div>
<?php
}

    }
    ?>
<h3 class="display-6 text-success">Update the employee Bio</h3>
<form method='POST' action=''>
<div class="row">
  <div class="col">
      <label for="empl_id">EMPLOYEE ID </label>
    <input type="text" id="empl_id" class="form-control" placeholder="" name='empl_id' value='<?php echo $id; ?>' readonly="readonly">
  </div>
  <div class="col">
  <label for="empl_title">EMPLOYEE TITLE </label>
    <input type="text" id="empl_title" class="form-control" placeholder="manager" name='title' value='<?php echo $title;?>'>
  </div>
    </div>
    <br>
    <div class="row">
  <div class="col">
  <label for="empl_fname">EMPLOYEE FIRST NAME </label>
    <input type="text" id='empl_fname' class="form-control" placeholder="Employee First Name" name='fname' value='<?php echo $fname;?>'>
  </div>
  <div class="col">
  <label for="empl_fname">EMPLOYEE LAST NAME </label>
    <input type="text" id='empl_lname' class="form-control" placeholder="Employee Last Name" name='lname' value='<?php echo $lname;?>'>
  </div>
</div>
<br>
<div class="row">
  <div class="col">
  <label for="dob">DATE OF BIRTH </label>
    <input type="date" id='dob' class="form-control" placeholder="dd-mm-yy" name='dob' value='<?php echo $dob;?>'>
  </div>
  <div class="col">
  <label for="doj">DATE OF JOINING </label>
    <input type="date" id='doj' class="form-control" placeholder="dd-mm-yy" name='doj' value='<?php echo $doj;?>'>
  </div>
    </div>
    <br>
    <div class="row">
  <div class="col">
  <button type="submit" class="btn btn-primary" name='update'>UPDATE</button>
  </div>
  <div class="col">
   <!-- <input type="text" class="form-control" placeholder="No of Employees">-->
  </div>
</div>
</form>
</div>
        <?php
    }
    ?>
<?php
    include("../includes/javascript.php");

?>
</div>
    </main>
  <div class="fixed-bottom">
<?php include('../includes/footer.php');?>

</div>
</html>
  