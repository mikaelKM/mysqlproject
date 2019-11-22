<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" <?php if ($_SESSION['user']=='root'){ ?>  href="../admin/site.php" <?php 
  }elseif($_SESSION['user']){
    ?> href="../users/site.php"
  <?php } ?>>EMPLOYEE DBMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
  
      <li class="nav-item active">
       <!-- <a class="nav-link" href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> HOME<span class="sr-only">(current)</span></a>-->
      </li>

      <?php 
      if ($_SESSION['user']=='root'){ 
        ?>

      <li class="nav-item active">
        <a class="nav-link" href="../admin/backup.php">BACKUP</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../admin/changes.php">CHANGES</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../admin/salaries.php">SALARIES</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../admin/users.php">USERS</a>
      </li>
      <?php 
      }elseif($_SESSION['user']){
        ?>
        <li class="nav-item active">
        <a class="nav-link" href="/users/manage.php">MANAGEMENT</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="">TRANSACTIONS</a>
      </li>      
    <?php } ?>
    </ul>




    <div class="col-lg-2"
    <?php 
     if ($_SESSION['user']){
       ?>
     <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     <?php echo $_SESSION['user'];?>
        </div>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/profile"></a>
          <a class="dropdown-item" href="/logout.php">LOG OUT</a>
        </div>
      </li>
     <?php }else{
      
     } ?>



    <div>
</nav>
