<?php
session_start();
?>

   <?php
     require_once 'connect.php';
         $paymentid=$paymentamount=$rating=$eventid=0;
		 $eventid=$_SESSION['id'];
         
		 
         
         $paymentid_err=$paymentamount_err=$rating_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $paymentid=$_POST["pid"];
               
               if(empty($paymentid))
               $paymentid_err="enter the payment id<br>";
				
               
                $paymentamount=$_POST["pamount"];
				
               if(empty($paymentamount))
               $paymentamount_err="enter the payment amount<br>";
               
                              
                $rating=$_POST["stars"];
                if(empty($rating))
               $rating_err="enter the caterer rating<br>";
               
               if(empty($paymentid_err)||empty($paymentamount_err)||empty($rating_err) ){
                             
              $sql="INSERT INTO payments VALUES ('$paymentid','$paymentamount',now()); INSERT INTO event_pay values ('$paymentid','$eventid','$rating');";
              //$returnval= mysqli_query($sql,$conn);
                $retval = $conn->multi_query($sql);
   
   if($retval ==1) {
    header('location:  http://127.0.0.1/eventtransaction.php');
   }
   else 
   $error="could not insert new payment.<br>";     
   }        
          }    
              
              $conn->close();
			  session_destroy();
  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Adding a payment.</title>
    </head>
    
    <body style="text-align:center;"background="back1.jpg">
	<h1>-------MAKE PAYMENT FOR THE EVENT------</h1>
	
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Payment_ID: <input type = "number" name = "pid" value="<?php echo $paymentid?>">
         <br>
         <?php echo $paymentid_err?>
		 Amount: <input type = "number" name = "pamount" value="<?php echo $paymentamount?>">
         <br>
         <?php echo $paymentamount_err?>
		 
                     
       
        
  Rating:
  <input type="number" name="stars" value="<?php echo $rating ?>">
  <br>
  <?php echo $rating_err?>
         
                       
          <input type="submit" name="submit" value="submit"/>
 
          
      </form>
        
        
        
      </body>
  </html>
  
