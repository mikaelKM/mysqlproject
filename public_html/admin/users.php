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

    <!-- body -->
<div class="container">

<div class="card border-primary mb-3" style="max-width: auto">
  <div class="card-header border-primary">
    CREATE USER
  </div>
  <div class="card-body">
  <?php 
//creating a new user
include('../conn.php');
if (isset($_POST['create'])){
  $user = $_POST['username'];
  $pass = $_POST['password'];

  $create = "CREATE USER $user@localhost identified by '$pass'";
  $cr=$mysqli->query($create);
  if ($cr){
?>
<div class="alert alert-success" role="alert">
  The User has been created successfully.
  </div>
<?php
  }else {
  ?>
  <div class="alert alert-danger" role="alert">
  Error encountered while creating the user. <?php echo $mysqli->error; ?>
  </div>
  <?php
  }
}
?>
    <h3 class="card-title"></h3>
    <form method="POST" action="">
    
    <div class="form-group">
    <label for="Email">Username</label>
    <input type="text" name="username" class="form-control" id="Email" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted"><!--We'll never share your email with anyone else.--></small>
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" name="password" class="form-control" id="password1" placeholder="Password" reuired>
  </div>
  <button type="submit" class="btn btn-primary" name='create'>Submit</button>
  </form>
  </div>
  <div class="card-footer text-muted border-primary">

<?php include("../conn.php");
$count = "SELECT COUNT(*) FROM mysql.user";
$con = $mysqli->query($count);
$row =$con->fetch_assoc();
?>
   This Adds a Database USER. Currently  there are only <strong> <?php echo $row['COUNT(*)']; ?></strong> Users.
  </div>
</div>
<!--grant the user previleges-->


<div class="card border-primary mb-3" style="max-width: auto">


  <div class="card-header border-primary text-success">
    GRANT THE USER PRIVILEGES ON EMPLOYEE MANAGEMENT DATABASE
  </div>
  <div class="card-body">


  <?php 
 if(isset($_POST['grant'])){
   $user = $_POST['user'];
   $table = $_POST['table'];
   $prev = $_POST['check'];

if(!empty($_POST['check'])){
   foreach($_POST['check'] as $selected){
     if ($selected =='ALL'){

      grantAll($user, $table);

      //echo $selected;
       
     }else{

      grantsome($selected,$table, $user);
      //echo ",".$selected."";
     }
   }
  }
   else{
     ?>
  <div class="alert alert-danger" role="alert">
  You did not select any privilege.
  </div>
    <?php
   }
 }
?>
<?php 
//grant all privileges
function grantAll($user, $table){
include("../conn.php");

$grantall = "GRANT ALL PRIVILEGES ON EMD.$table TO $user@localhost";
$flush = "FLUSH PRIVILEGES";

$grant= $mysqli->query($grantall);
$commit= $mysqli->query($flush);

if ($grant){
  ?>
  <div class="alert alert-success" role="alert">
  The User has been granted ALL privileges created successfully.
  </div>
  <?php
}else{
  ?>
  <div class="alert alert-danger" role="alert">
  ERROR ENCOUNTERED. <?php echo $mysqli->error; ?>
  </div>
  <?php
}


}
?>
<?php 
function grantsome($selected, $table, $user){

echo substr( $k, 0, -1);
 $grantprv = "GRANT $prev PRIVILEGES ON EMD.$table TO $user@localhost"; 
}
?>

    <h3 class="card-title"></h3>
    <form method="POST" action="">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">USER</th>
      <th scope="col">TABLE</th>
      <th scope="col">ALL PRIV</th>
      <th scope="col">USE</th>
      <th scope="col"> SELECT</th>
      <th scope="col">UPDATE</th>
      <th scope="col"> DELETE </th>
      <th scope ="col"> DROP</th>
    </tr>
  </thead>
  <tbody>
  <tr>
    <th scope="row"> 
        <div class="form-group">
    <select class="form-control" id="user" name="user">
      <?php 
include("../conn.php");
$user = "SELECT user FROM mysql.user";
$us = $mysqli->query($user);
while($row=$us->fetch_assoc()){
  ?>
   <option value='<?php echo $row['user'];?>' > <?php echo $row['user']; ?></option>
<?php
}
$us->free();
      ?>
     
    </select>
  </div>
</th>
      <td>
      <div class="form-group">
    <select class="form-control" id="user" name="table">
    <option value="*" selected>ALL TABLES</option> 
      <?php 
include("../conn.php");
$table = "SHOW TABLES";
$tb = $mysqli->query($table);
while($row=$tb->fetch_assoc()){
  ?>

   <option value='<?php echo $row['Tables_in_EMD'];?>' > <?php echo $row['Tables_in_EMD']; ?></option>
<?php
}
$us->free();
      ?>
      </td>
      <td>
      <div class="form-check">
    <input type="checkbox" class="form-check-input" name="check[]" onclick="disable()" value="ALL" id="all" data-toggle="tooltip" data-placement="bottom" title="seleting all privileges makes the user a superuser on the employee DBMS">
    <label class="form-check-label" for="all">yes</label>  
  </div>    
    </td>
    </td>
      <td>
      <div class="form-check">
    <input type="checkbox" class="form-check-input" name="check[]" value="USE" id="use">
    <label class="form-check-label" for="use">yes</label>
  </div>    
    </td>
      <td>
      <div class="form-check">
    <input type="checkbox" class="form-check-input" name="check[]" value="SELECT" id="select">
    <label class="form-check-label" for="use">yes</label>
  </div>     
    </td>
      <td>
      <div class="form-check">
    <input type="checkbox" class="form-check-input" name="check[]" value="UPDATE" id="update">
    <label class="form-check-label" for="use">yes</label>
  </div>     
    </td>
      <td> 
      <div class="form-check">
    <input type="checkbox" class="form-check-input" name="check[]" value="DELETE" id="delete">
    <label class="form-check-label" for="use">yes</label>
  </div> 
      </td>
      <td> 
      <div class="form-check">
    <input type="checkbox" class="form-check-input" name="check[]" value="DROP" id="drop">
    <label class="form-check-label" for="use">yes</label>
  </div> 
    </td>

    <!--script code-->

    <td> 
      <div class="form-check">
    <button type="submit" class="btn btn-primary" name='grant'>Submit</button>
  </div> 
    </td>
</tbody>
</table>
</form>


  </div>
  <div class="card-footer text-muted border-primary">
This grants the user previlges on the EMD
  </div>
</div>



<!-- other tasks on users -->
<div class="card border-primary mb-3" style="max-width: auto">


  <div class="card-header border-primary text-success">
    OTHER TASKS ON THE USERS
  </div>
  <div class="card-body">
<?php 
if (isset($_POST['del_u'])){
  $user = $_POST['user'];
  $del_u = "DROP USER '$user'@'localhost'";
  $del = $mysqli->query($del_u);
  if ($del){
?>
<div class="alert alert-success" role="alert">
 SUCCESSFULLY DELETED THE USER
  </div>
<?php
  }else{
    ?>
<div class="alert alert-danger" role="alert">
  Error encountered while Deleting the user. <?php echo $mysqli->error; ?>
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
      <th scope="col">USER</th>
      <th scope="col">TABLE</th>
      <th scope="col">DENY PRIV</th>
      <th scope="col">DELETE USER</th>
    </tr>
  </thead>
  <tbody>
  <tr>
    <th scope="row"> 
        <div class="form-group">
    <select class="form-control" id="user" name="user">
      <?php 
include("../conn.php");
$user = "SELECT user FROM mysql.user";
$us = $mysqli->query($user);
while($row=$us->fetch_assoc()){
//$us = $row['user'];
  
  ?>
   <option value='<?php echo $row['user'];?>' > <?php echo $row['user']; ?></option>
<?php
}
$us->free();
      ?>
     
    </select>
  </div>
</th>
      <td>
      <div class="form-group">
    <select class="form-control" id="user" name="table">
    <option value="" selected>you may or not choose table</option> 
      <?php 
include("../conn.php");
$table = "SHOW TABLES";
$tb = $mysqli->query($table);
while($row=$tb->fetch_assoc()){
  ?>

   <option value='<?php echo $row['Tables_in_EMD'];?>' > <?php echo $row['Tables_in_EMD']; ?></option>
<?php
}
$us->free();
      ?>
      </td>
      
      <td> <a href='?del=<?php echo $id; ?>' > <button onclick = "return confirm('Are you sure you want to delete the employee? This will remove the emoployee from the database')" type="button" class="btn btn-danger">DENY</button> </a></td>    
   
    
     
      <td> <button onclick = "return confirm('Are you sure you want to delete the USER? This will remove the USERfrom the database')" type="submit" name="del_u" class="btn btn-danger">DELETE</button></td> 
</tbody>
</table>
</form>


  </div>
  <div class="card-footer text-muted border-primary">
Drping a database user
  </div>
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
  