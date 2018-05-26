<?php
session_start();
?>

   <?php
     require_once 'connect.php';
         $paymentid=$rating=$guestid=0;
		 $guestid=$_SESSION["id"];
		 $meal=$_SESSION['meal'];
		 $sql="select find_meal_cost('breakfast',1) as a";
        $result = $conn->query($sql);

                if ($result->num_rows > 0) {
					$row=$result->fetch_assoc();
						$paymentamount= $row["a"];
				}
		 
         
         $paymentid_err=$rating_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $paymentid=$_POST["pid"];
               
               if(empty($paymentid))
               $paymentid_err="enter the payment id<br>";
				
               
                
               
                              
                $rating=$_POST["stars"];
                if(empty($rating))
               $rating_err="enter the caterer rating<br>";
               
               if(empty($paymentid_err)||empty($rating_err) ){
                             
              $sql="INSERT INTO payments VALUES ('$paymentid','$paymentamount',now()); INSERT INTO guest_pay values ('$paymentid','$guestid','$rating');";
              //$returnval= mysqli_query($sql,$conn);
                $retval = $conn->multi_query($sql);
   
   if($retval ==1) {
    header('location:  http://127.0.0.1/guesttransaction.php');
   }
   else 
   $error="could not insert new payment.<br>";     
   }        
          }    
              
              $conn->close();
  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Adding a payment.</title>
    </head>
    
    <body style="text-align:center;"background="back1.jpg">
	<h1>------MAKE PAYMENT------</h1>
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Payment_ID: <input type = "number" name = "pid" value="<?php echo $paymentid?>">
         <br>
         <?php echo $paymentid_err?>
		 
                     
       
        
  Rating:
  <input type="number" name="stars" value="<?php echo $rating ?>">
  <br>
  <?php echo $rating_err?>
         
                       
          <input type="submit" name="submit" value="submit"/>
 
          
      </form>
        
        
        
      </body>
  </html>
  
