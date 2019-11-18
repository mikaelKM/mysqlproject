<?php
session_start();
function userlogin($username, $password){
  define('DB_HOST', 'localhost');
  define('DB_USER', $username);
  define('DB_PASS', $password);
  define('DB_NAME', 'EMD');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME); //or die('Connection Error => '.mysqli_connect_error());
  if ($dbc == true){
  
    header('location: ../admin/site.php');
  echo '<script> alert(\'successful login.\')</script>';
  $_SESSION['user']= $username;
  $_SESSION['pass']= $password;

}else{
  echo '<script> alert(\'login not successful\')</script>';
  echo '<script> window.open(\'/\',\'_self\')</script>';
}
}
   ?>
<?php 
//To log in the database application as admin
if (isset($_POST['login'])){
  $username = 'root';
  $password = $_POST['password'];
  
  userlogin($username, $password);
}
?>
