   <?php
session_start();
?>
   <?php
     require_once 'connect.php';
         $eventid=$stockid=$amount=0;
          $eventid=$_SESSION['id'];
         
         $eventid_err=$stockid_err=$amount_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $stockid=$_POST["stid"];
               
               if(empty($stockid))
               $stockid_err="enter the stock id<br>";
		   
				$amount=$_POST["samount"];
				
               
               if(empty($amount))
               $amount_err="enter the stock amount<br>";
               
                
               if(empty($stockid_err)||empty($amount_err)){
                             
              $sql="INSERT INTO event_stock VALUES ($stockid,$eventid,$amount)";
              //$returnval= mysqli_query($sql,$conn);
                $retval = $conn->query($sql);
   
   if($retval ==1) {
    header('location:  http://127.0.0.1/addeventemp4.php');
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
        <title>Adding stock required for an event.</title>
    </head>
    
    <body style="text-align:center;"background="back1.jpg">
	<h1> -------STOCK REQUIRED FOR THE EVENT------</h1>
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        
		Stock_ID: <input type = "number" name = "stid" value="<?php echo $stockid?>">
         <br>
         <?php echo $stockid_err?>
		Amount: <input type = "number" name = "samount" value="<?php echo $amount?>">
        <br>
        <?php echo $amount_err?>
		
         
                       
          <input type="submit" name="submit" value="submit"/>
 
          
      </form>
        
        	
		<a href = "addeventstock.php" target = "_self"> ADD MORE STOCK<br></a>
        
      </body>
  </html>
  
