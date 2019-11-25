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

  <?php 
include('../conn.php');
if (isset($_GET['rev'])){
    $id = $_GET['rev'];
$rev = "SELECT revert_deleted_employee('$id')";
$revert = $mysqli->query($rev);
if ($revert){
    ?>
    <div class="alert alert-success container" role="alert">
  Reversion has been completed successfuly.
</div>
    <?php
}else{
    ?>
   <div class="alert alert-danger container" role="alert">
  Reversion not completed successfully. <?php echo $mysqli->error; ?>
</div>
    <?php
}

} 
?>

<?php
//deleting an employee from the employee bio table
include ('../conn.php');
if (isset($_GET['del'])){
  $id = $_GET['del'];
  $query = "DELETE FROM empl_bio_changes WHERE empl_id = '$id'";

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
    <div class="jumbotron">
    <?php
$username = $_SESSION['user'];
$password = $_SESSION['pass'];
$database = "EMD";
$mysqli = new mysqli("localhost", $username, $password, $database);
 
$query = "SELECT * FROM empl_bio_changes";
?>

<h1 class="text-success"> THE EMPLOYEES BIO </h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">EMPLOYEE ID</th>
      <th scope="col">ACTIVITY</th>
      <th scope="col">EMPLOYEE TITLE</th>
      <th scope="col">EMPLOYEE NAME</th>
      <th scope="col"> DATE OF BIRTH</th>
      <th scope="col">DATE OF JOINING </th>
      <th scope="col">DONE BY </th>
      <th scope="col">DONE AT</th>
      <th scope="col"> ACTION </th>
    </tr>
  </thead>
  <tbody>
  <?php
if ($result = $mysqli->query($query)) {
 
    while ($row = $result->fetch_assoc()) {
        $id = $row["empl_id"];
        $activity = $row["Activity"];
        $title = $row["empl_title"];
        $fname = $row["empl_fname"];
        $lname = $row["empl_lname"];
        $dob = $row["empl_dob"];
        $doj = $row["empl_doj"];
        $doneby = $row["DoneBy"];
        $doneat = $row["DoneAt"];
 ?>
    
    <tr>
      <th scope="row"><?php echo $id; ?></th>
      <td><?php echo $activity; ?></td>
      <td><?php echo $title; ?></td>
      <td><?php echo $fname.' '.$lname; ?></td>
      <td><?php echo $dob; ?></td>
      <td><?php echo $doj; ?></td>
      <td><?php echo $doneby; ?></td>
      <td><?php echo $doneat; ?></td>
      <td> <a href='?rev=<?php echo $id; ?>'><button  onclick = "return confirm('are you sure you want to revert the deletion?')" type="button" class="btn btn-info">REVERT</button></a>
      <a href='?del=<?php echo $id; ?>' > <button onclick = "return confirm('Are you sure you want to delete the employee? This will remove the emoployee from the database')" type="button" class="btn btn-danger">DELETE</button> </a>
    </td>
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
      <th scope="col">ACTIVITY</th>
      <th scope="col">EMPLOYEE TITLE</th>
      <th scope="col">EMPLOYEE NAME</th>
      <th scope="col"> DATE OF BIRTH</th>
      <th scope="col">DATE OF JOINING </th>
      <th scope="col">DONE BY </th>
      <th scope="col">DONE AT</th>
      <th scope="col"> ACTION </th>
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
  