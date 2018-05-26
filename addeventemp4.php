   <?php
session_start();
?>
   <?php
     require_once 'connect.php';
         $eventid=$empid=0;
          $eventid=$_SESSION['id']; 
         
         $eventid_err=$empid_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $empid=$_POST["eid"];
               
               if(empty($empid))
               $empid_err="enter the employee id<br>";
		   
				
               
                
               if(empty($empid_err)){
                             
              $sql="INSERT INTO event_emp VALUES ($empid,$eventid)";
              //$returnval= mysqli_query($sql,$conn);
                $retval = $conn->query($sql);
   
   if($retval ==1) {
    header('location:   http://127.0.0.1/addpaymentsevent4.php');
   }
   else 
   $error="could not insert new event.<br>";     
   }        
          }    
              
              $conn->close();
  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Adding employee required for an event.</title>
    </head>
    
    <body style="text-align:center;"background="back1.jpg">
	<h1>------ASSIGN EMPLOYEE TO EVENT-----</h1>
	
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        
		Employee_ID: <input type = "number" name = "eid" value="<?php echo $empid?>">
         <br>
         <?php echo $empid_err?>
		
      
		
         
                       
          <input type="submit" name="submit" value="submit"/>
 
          
      </form>
        <a href = "addeventemp.php" target = "_self"> ADD ANOTHER EMPLOYEE<br></a>
		<a href = "addeventstock.php" target = "_self"> GO BACK TO STOCK PAGE<br></a>
        
        
      </body>
  </html>
  
