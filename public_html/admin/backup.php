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
BACKUP THE DATABASE  TABLE IN A SQL OUTFILE
</div>
<div class="card-body">
<h6 class="card-title">Select the table to backup whose data from the following</h6>
<?php
if(isset($_POST['backup'])){
$tbl = $_POST['tables'];
$backup = "SELECT * INTO OUTFILE '$tbl.sql' from $tbl";
$bk = $mysqli->query($backup);
if($bk){

  ?>
   <div class="alert alert-success container" role="alert">
  The table has been backed up successfuly and the file is located at /var/lib/mysql/EMD. It is named as <?php echo $tbl.".sql"; ?>
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



<form method="POST" action="">
<table class="table table-striped">
<thead>
<tr>
<th scope="col">TABLE</th>
<th scope="col">BACKUP</th>
</tr>
</thead>

<tbody>
<tr>
<td scope="row"> 
  <div class="form-group">
<select class="form-control" id="user" name="tables">
<?php 
$table = "SHOW TABLES";
$tb = $mysqli->query($table);
while($row=$tb->fetch_assoc()){
  ?>

   <option value='<?php echo $row['Tables_in_EMD'];?>' > <?php echo $row['Tables_in_EMD']; ?></option>
<?php
}
$tb->free();

?>

</select>
</div>
</td>
<td> <button onclick = "return confirm('BACKING UP THE WHOLE TABLE DATA IN OUTFILE')" type="submit" class="btn btn-primary" name="backup"> BACKUP</button></td> 
</tr>
</tbody>
</table>
</form>

</div>
<div class="card-footer text-muted border-primary">
Backing up table on a outfile
</div>


</div>

<br>
<!--load data from a file-->
<div class="card border-primary mb-3" style="max-width: auto">


<div class="card-header border-primary text-success">
LOAD DATA INTO A TABLE.
</div>
<div class="card-body">
<h6 class="card-title">You must ensure that a table of the same structure has been created before loading the file</h6>
<?php
if(isset($_POST['load'])){
$tbl = $_POST['load_data'];
$tbln = $_POST['tables'];
$backup = "LOAD DATA INFILE '$tbl' INTO TABLE $tbln";
$bk = $mysqli->query($backup);
if($bk){

  ?>
   <div class="alert alert-success container" role="alert">
  The data in the file has been restored successfully
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



<form method="POST" action="">
<table class="table table-striped">
<thead>
<tr>
<th scope="col">FILE</th>
<th scope="col">TABLE</th>
<th scope="col">LOAD</th>
</tr>
</thead>

<tbody>
<tr>
<td>
<div class="form-group">
    <input type="file" class="form-control-file" name="load_data" id="file_input">
</div>
</td>
<td> 
<div class="form-group">
<select class="form-control" id="user" name="tables">
<?php 
$table = "SHOW TABLES";
$tb = $mysqli->query($table);
while($row=$tb->fetch_assoc()){
  ?>

   <option value='<?php echo $row['Tables_in_EMD'];?>' > <?php echo $row['Tables_in_EMD']; ?></option>
<?php
}
$tb->free();

?>

</select>
</div>
</td>
<td> <button onclick = "return confirm('YOU ARE LOADING DATA FROM AN INFILE')" type="submit" class="btn btn-primary" name="load"> Load file</button></td> 
</tr>
</tbody>
</table>
</form>

</div>
<div class="card-footer text-muted border-primary">
lOADING DATA FROM INFLINE
</div>







</div>

<?php
    include("../includes/javascript.php");

?>
    </main>
  <div class="fixed-bottom">
<?php include('../includes/footer.php');?>

</div>
</html>