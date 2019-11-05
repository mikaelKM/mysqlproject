<?php
session_start();
function userlogin($username, $password){

  define('DB_HOST', 'localhost');
  define('DB_USER', $username);
  define('DB_PASS', $password);
  //define('DB_NAME', 'interview');
  
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS); //or die('Connection Error => '.mysqli_connect_error());

  if ($dbc == true){
    echo '<script> alert(\'successful login.\')</script>';

$_SESSION['user']= $username;
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
<div class='container'>

  <div class="jumbotron">
  <h1 class="display-4">ADD Department</h1>
  <form>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Department Name">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Department Id">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="No of Employees">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <!--<input type="text" class="form-control" placeholder="Department Name">-->
    </div>
    <div class="col">
    <button type="submit" class="btn btn-primary">ADD DEPARTMENT</button>
    </div>
    <div class="col">
     <!-- <input type="text" class="form-control" placeholder="No of Employees">-->
    </div>
  </div>
</form>
</div>
<br>
<div class="jumbotron">
  <h1 class="display-4">ADD Employee</h1>
  <form>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Employee ID">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Eployee Title">
    </div>
    </div>
    <br>
    <div class ='row'>
    <div class="col">
      <input type="text" class="form-control" placeholder="Employee First Name">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Employee Last Name">
    </div>
    </div>
  <br>
  <div class="row">
    <div class="col">
      <input type="date" class="form-control" placeholder="Date of Birth">
    </div>
    <div class="col">
    <input type="date" class="form-control" placeholder="Date of Joing">
    </div>
  </div>
  <br>
  <div class='row'>
  <div class='col'>
  <button type="submit" class="btn btn-primary">ADD employee</button>
  </div>
  </div>
</form>
</div>
</div>

    <!-- body -->
<?php
    include("../includes/javascript.php");

?>
    </main>
  <div class="fixed-bottom">
<?php include('../includes/footer.php');?>

</div>
</html>
  
   <?php
  }else{
    echo '<script> alert(\'login not successful\')</script>';
  }
}
?>

<?php 
if (isset($_POST['login'])){
  $username = 'root';
  $password = $_POST['password'];
  
  userlogin($username, $password);
}
?>
