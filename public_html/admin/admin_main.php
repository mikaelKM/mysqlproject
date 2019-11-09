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
<?php 
include("../includes/bootstrap.php");
  ?>
<?php
//adding a department in the database

define('DB_HOST', 'localhost');
define('DB_USER', $_SESSION['user']);
define('DB_PASS', $_SESSION['pass']);
define('DB_NAME', 'EMD');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  if(isset($_POST['add_dpt'])){
    $dpt_name = $_POST['dpt_name'];
    $dpt_id = $_POST['dpt_id'];
    $no_empl = $_POST['no_empl'];

    $insert = "select insrt_into_dpt($dpt_id, '$dpt_name', $no_empl)";

    $ins= $dbc->query($insert);

    if ($ins){
      ?>
       <div class="alert alert-success" role="alert">
  Successfully Added the department!
  <script> window.open('/',_self)</script>
</div>
        <?php
    }else{
      
      
      ?>
      <div class="alert alert-danger" role="alert">
  Unexpected Error Occured . <?php $dbc->error; ?>
    </div>

<?php 

    }
  }
  ?>


<?php
//adding Employee to the database

define('DB_HOST', 'localhost');
define('DB_USER', $_SESSION['user']);
define('DB_PASS', $_SESSION['pass']);
define('DB_NAME', 'EMD');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  if(isset($_POST['add_empl'])){
    $empl_id = $_POST['empl_id'];
    $empl_title = $_POST['empl_ttl'];
    $empl_fname = $_POST['empl_fname'];
    $empl_lname = $_POST['empl_lname'];
    $empl_dob = $_POST['empl_dob'];
    $empl_do = $_POST['empl_doj'];
    $phone  = $_POST['phone'];
    $email = $_POST['email'];
    $adress = $_POST['adress'];

    $insert = "select insrt_into_emplbio($empl_id, '$empl_title', '$empl_fname', '$empl_lname', '$empl_dob', '$empl_do', $phone, '$email', '$adress')";

    $ins= $dbc->query($insert);

    if ($ins){
      ?>
       <div class="alert alert-success" role="alert">
  Successfully Added the employee!
  <script> window.open('/',_self)</script>
</div>
        <?php
    }else{
      ?>
      <div class="alert alert-danger" role="alert">
  Unexpected Error Occured . <?php $dbc->error; ?>
    </div>

<?php 

    }
  }
  ?>

<?php 
//adding work details

define('DB_HOST', 'localhost');
define('DB_USER', $_SESSION['user']);
define('DB_PASS', $_SESSION['pass']);
define('DB_NAME', 'EMD');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(isset($_POST['add_work_details'])){
$empl_id = $_POST['empl_id'];
$dpt_id = $_POST['dpt_id'];
$empl_title = $_POST['empl_title'];
$empl_grade = $_POST['empl_grade'];
$empl_from = $_POST['empl_from'];
$empl_to = $_POST['empl_to'];

$insert = "CALL insrt_empl_wrk_grade($empl_id, $dpt_id, '$empl_title', '$empl_from', '$empl_to', $empl_grade)";
$ins = $dbc->query($insert);

if ($ins){
  ?>
   <div class="alert alert-success" role="alert">
Successfully Added the employee Work details!
<script> window.open('/',_self)</script>
</div>
    <?php
}else{
  ?>
  <div class="alert alert-danger" role="alert">
Unexpected Error Occured . <?php echo $dbc->error; ?>
</div>

<?php 
  }
} 
?>