   <?php
     require_once 'connect.php';
         $empid=0;
         
		 
         
         $empid_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
              
				$empid=$_POST["eid"];
               
               if(empty($empid))
               $empid_err="enter the employee id<br>";
               
                
               
               if(empty($eid_err)){
                             
              $sql="INSERT INTO leave_record VALUES ($empid,now())";
              //$returnval= mysqli_query($sql,$conn);
                $retval = $conn->query($sql);
   
   if($retval ==1) {
    header('location:http://127.0.0.1/cattransaction.php');
   }
   else 
   $error="could not insert new employee.<br>";     
   }        
          }    
              
              $conn->close();
  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Adding a leave for an employee.</title>
    </head>
    
    <body style="text-align:center;"background="back1.jpg">
	<h1>------ADD LEAVE FOR AN EMPLOYEE-----</h1>
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
       
		Employee_ID: <input type = "number" name = "eid" value="<?php echo $empid?>">
         <br>
         <?php echo $empid_err?>
     
         
                       
          <input type="submit" name="submit" value="submit"/>
 
          
      </form>
        
        
        
      </body>
  </html>
  
