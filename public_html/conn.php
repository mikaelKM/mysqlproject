<?php
$username = $_SESSION['user'];
$password = $_SESSION['pass'];
$database = "EMD";
$mysqli = new mysqli("localhost", $username, $password, $database) or die(mysqli_error($this->error));

if ($mysqli){

}else{
    echo 'this error occured'. $mysqli->error;
}
?>