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
include ("../conn.php");
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
  <div class="card-header border-primary">
   UPDATE THE GRADE DETAILS
  </div>
  <div class="card-body">
      <?php 
      if (isset($_POST['update_grade'])){
          $gid = $_POST['grade_id'];
          $gname = $_POST['grade_name'];
          $gbasic = $_POST['grade_basic'];
          $gHA = $_POST['grade_HA'];
          $gTA = $_POST['grade_TA'];
          $gMA = $_POST['grade_MA'];
          $gB = $_POST['grade_bonus'];
          $gtax = $_POST['grade_tas'];

          $update = "UPDATE grade_details SET grade_name = '$gname', grade_basic = $gbasic, grade_HA = $gHA, grade_TA = $gTA, grade_MA = $gMA, grade_bonus = $gB, grade_tas = $gtax WHERE grade_id = $gid";
        $up = $mysqli->query($update);
        if ($up){
            ?>
            <div class="alert alert-success container" role="alert">
  The grade details has been upadated successfully

  <script> setTimeout(function(){ window.open('../users/site.php','_self')}, 3000);</script>
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
    <h3 class="card-title"></h3>
    <?php 
    if (isset($_GET['update'])){
        $id = $_GET['update'];
    }
    $query = "SELECT * FROM grade_details WHERE grade_id = $id";
    
    if ($result = $mysqli->query($query)) {
        $row = $result->fetch_assoc();

            $name = $row["grade_name"];
            $basic = $row["grade_basic"];
            $HA = $row["grade_HA"];
            $TA = $row["grade_TA"];
            $MA = $row["grade_MA"];
            $bonus = $row["grade_bonus"];
            $tax = $row["grade_tas"];
    }else{
        echo "error". $mysqli->error;
    }

    ?>
    <form method="POST" action="">
    
        <div class="row">
            <div class="col">
    <div class="form-group">
    <label for="grade_id">Grade Id</label>
    <input type="number" name="grade_id" class="form-control" id="grade_id"  value='<?php echo $id; ?>' readonly ="readonly">
</div>
</div>
<div class="col">
<div class="form-group">
<label for="grade_name">Grade Name</label>
<input type="text" name="grade_name" class="form-control" id="grade_name" value='<?php echo $name; ?>'>
</div>
</div>

<div class="col">
<div class="form-group">
<label for="grade_basic">Grade Basic</label>
<input type="number" name="grade_basic" class="form-control" id="grade_basic" value='<?php echo $basic; ?>'>
</div>
</div>
</div>

<div class="row">
            <div class="col">
    <div class="form-group">
    <label for="grade_HA">House Allowance</label>
    <input type="number" name="grade_HA" class="form-control" id="grade_HA" value='<?php echo $HA; ?>' >
</div>
</div>
<div class="col">
<div class="form-group">
<label for="grade_TA">Transport Allowance</label>
<input type="number" name="grade_TA" class="form-control" id="grade_TA"  value='<?php echo $TA; ?>'>
</div>
</div>

<div class="col">
<div class="form-group">
<label for="grade_MA">Medical Allowance</label>
<input type="number" name="grade_MA" class="form-control" id="grade_MA"  value='<?php echo $MA; ?>'>
</div>
</div>
</div>

<div class="row">
<div class="col">
<div class="form-group">
<label for="grade_bonus">Bonus</label>
<input type="number" name="grade_bonus" class="form-control" id="grade_bonus"  value='<?php echo $bonus; ?>'>
</div>
</div>

<div class="col">
<div class="form-group">
<label for="grade_tas">Tax Band</label>
<input type="number" name="grade_tas" class="form-control" id="grade_tas"  value='<?php echo $tax; ?>'>
</div>
</div>
<div class="col">
<label for="grade_id"> </label>
<br>
  <button type="submit" class="btn btn-primary" name='update_grade'>Update Grade Details</button>
</div>


</div>
  </form>
  </div>
  <div class="card-footer text-muted border-primary">
   welcome
  </div>
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
  