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
