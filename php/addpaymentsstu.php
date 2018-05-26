   <?php
     require_once 'connect.php';
         $paymentid=$paymentamount=$rating=$stuid=0;
         
		 
         
         $paymentid_err=$paymentamount_err=$rating_err=$stuid_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $paymentid=$_POST["pid"];
               
               if(empty($paymentid))
               $paymentid_err="enter the payment id<br>";
				$stuid=$_POST["sid"];
               
               if(empty($stuid))
               $stuid_err="enter the student id<br>";
               
                $paymentamount=$_POST["pamount"];
               if(empty($paymentamount))
               $paymentamount_err="enter the payment amount<br>";
               
                              
                $rating=$_POST["stars"];
                if(empty($rating))
               $rating_err="enter the caterer rating<br>";
               
               if(empty($paymentid_err)||empty($paymentamount_err)||empty($rating_err) || empty($stuid_err)){
                             
              $sql="INSERT INTO payments VALUES ($paymentid,$paymentamount,now()); INSERT INTO stu_pay values ($stuid,$paymentid,$rating);";
              //$returnval= mysqli_query($sql,$conn);
                $retval = $conn->multi_query($sql);
   
   if($retval ==1) {
  echo " Payment added successfully <br><br> ";
   echo "<br><br><br><a href = \"addpaymentsstu.php\" target = \"_self\"> <- MAKE PAYMENT FOR ANOTHER STUDENT </a>
        <br><a href = \"stutransaction.php\" target = \"_self\"> <- GO BACK TO STUDENT PAGE <br></a>
          <a href = \"index.php\" target = \"_self\"> <- GO BACK TO HOME<br></a>";
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
    <h1>---ADDING A PAYMENT---</h1>
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Payment_ID: <input type = "number" name = "pid" value="<?php echo $paymentid?>">
         <br>
         <?php echo $paymentid_err?>
		 
        Student_ID: <input type = "number" name = "sid" value="<?php echo $stuid?>">
         <br>
         <?php echo $stuid_err?>
	
             
       
         Amount:
  <input type="number" name="pamount" value="<?php echo $paymentamount ?>">
  <br>
  <?php echo $paymentamount_err?>
  Rating:
  <input type="number" name="stars" value="<?php echo $rating ?>">
  <br>
  <?php echo $rating_err?>
         
                       
          <input type="submit" name="submit" value="submit"/>
          <?php echo "<br><br><br>";?>
         
           <a href = "../stutransaction.php" target = "_self"> <- GO BACK TO STUDENT PAGE <br></a>
          <a href = "../index.php" target = "_self"> <- GO BACK TO HOME<br></a>
 
          
      </form>
        
        
        
      </body>
  </html>
  
