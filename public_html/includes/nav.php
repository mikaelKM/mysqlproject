<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/">EMPLOYEE DBMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
  
      <li class="nav-item active">
        <a class="nav-link" href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> HOME<span class="sr-only">(current)</span></a>
      </li>
      <?php 
      if ($_SESSION['user'] = 'root'){ 
        ?>

      <li class="nav-item active">
        <a class="nav-link" href="../admin/adduser">Add User</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../admin/grantprev">Grant User Previleges</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../admin/createtb">crete Tb</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../admin/addemployee">add EMPLOYEE</a>
      </li>
      <?php 
      }elseif($_SESSION['user']=''){

      }else {
        ?>
        <li class="nav-item active">
        <a class="nav-link" href="">ADMIN</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="">USER</a>
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
       ?>
     
            <li class="nav-item dropdown">
        <div class="dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          LOG IN
        </div>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/register">REGISTER</a>
          <a class="dropdown-item" href="/log">LOG IN</a>
        </div>
      </li>
     <?php } ?>



    <div>
</nav>
