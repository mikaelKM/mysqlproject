<?php
session_start();
function userlogin($username, $password){

  define('DB_HOST', 'localhost');
  define('DB_USER', $username);
  define('DB_PASS', $password);
  //define('DB_NAME', 'interview');
  
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS); //or die('Connection Error => '.mysqli_connect_error());

  if ($dbc == true){
    header('Location:../users/site.php');
    echo '<script> alert(\'successful login.\')</script>';
    $_SESSION['user']= $username;
    $_SESSION['pass']= $password;
   ?>
   <?php
  }else{
    echo '<script> alert(\'login not successful\')</script>';
    echo '<script> window.open(\'/\',\'_self\')</script>';
  }
}
?>
<?php 
if (isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  userlogin($username, $password);
}
?>
