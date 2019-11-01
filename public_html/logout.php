<?php 
                session_start();                
?>
<?php
                session_unset(); 
                session_destroy();
               if(session_destroy()==true){
                    header('location: ../');

                    
$Message =  "Successully logged out";

   echo "<div class='success'>$Message</div>";
            
               }
               ?>