<?php 
session_start(); 
//session_destroy();
if(session_destroy()){
header('location: ../');
                   
$Message =  "Successully logged out";

   echo "<div class='success'>$Message</div>";
            
             }
               ?>