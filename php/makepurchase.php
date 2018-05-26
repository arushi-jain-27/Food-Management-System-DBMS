
   <?php
     require_once 'connect.php';
         $purchaseid=$stockid=$rate=$qty=0;
		 
		 
         
		 
         
         $purchaseid_err=$stockid_err=$rate_err=$qty_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
				$purchaseid=$_POST["pid"];
               
               if(empty($purchaseid))
               $purchaseid_err="enter the purchase id<br>";
               $stockid=$_POST["stid"];
               
               if(empty($stockid))
               $stockid_err="enter the stock id<br>";
				
               
                $rate=$_POST["r"];
               if(empty($rate))
               $rate_err="enter the rate per unit<br>";
		   $qty=$_POST["q"];
               if(empty($qty))
               $qty_err="enter the quantity purchased<br>";
               
                              
             
               
               if(empty($purchaseid_err)||empty($stockid_err)||empty($rate_err)||empty($qty_err) ){
                             
              $sql="INSERT INTO purchase VALUES ('$purchaseid','$rate', '$qty'); INSERT INTO stock_purchase values ('$stockid','$purchaseid',now());";
              //$returnval= mysqli_query($sql,$conn);
                $retval = $conn->multi_query($sql);
   
   if($retval ==1) {
    header('location: http://127.0.0.1/php/makepurchase.php');
   }
   else 
   $error="could not insert new purchase.<br>";     
   }        
          }    
              
              $conn->close();
  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Purchasing Stock</title>
    </head>
    
    <body style="text-align:center;"background="back1.jpg">
   <h1> -----PURCHASE STOCK------ </h1>
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Purchase_ID: <input type = "number" name = "pid" value="<?php echo $purchaseid?>">
         <br>
         <?php echo $purchaseid_err?>
		  Stock_ID: <input type = "number" name = "stid" value="<?php echo $stockid?>">
         <br>
         <?php echo $stockid_err?>
		 Rate per Unit: <input type = "number" name = "r" value="<?php echo $rate?>">
         <br>
         <?php echo $rate_err?>
		 Quantity: <input type = "number" name = "q" value="<?php echo $qty?>">
         <br>
         <?php echo $qty_err?>
		 
                     
       
         
		 
		 
  
         
                       
          <input type="submit" name="submit" value="submit"/>
 
          
      </form>
        
       <a href = "../cattransaction.php" target = "_self"> <-GO BACK TO CATERER PAGE <br></a>
	   
       <a href = "../index.php" target = "_self"> <-GO BACK TO HOME <br></a>
        
      </body>
  </html>
  
