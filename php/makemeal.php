
   <?php
     require_once 'connect.php';
         $stockid=$qty=0;
		 $meal="";
		 
		 
         
		 
         
         $stockid_err=$meal_err=$qty_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
				
               $stockid=$_POST["stid"];
               
               if(empty($stockid))
               $stockid_err="enter the stock id<br>";
				
               
                $meal=$_POST["mmeal"];
               if(empty($meal))
               $rate_err="enter the meal<br>";
		   $qty=$_POST["q"];
               if(empty($qty))
               $qty_err="enter the quantity of the stock to be used<br>";
               
                              
             
               
               if(empty($stockid_err)||empty($meal_err)||empty($qty_err) ){
                             
              $sql="INSERT INTO make_meals VALUES ($stockid,now(),'$meal', $qty)";
              //$returnval= mysqli_query($sql,$conn);
                $retval = $conn->query($sql);
   
   if($retval ==1) {
    header('location:http://127.0.0.1/cattransaction.php');
   }
   else 
   $error="could not make new meal.<br>";     
   }        
          }    
              
              $conn->close();
  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Making a meal</title>
    </head>
    
    <body style="text-align:center;"background="back1.jpg">
	<h1>------ADD INFO ABOUT MAKING MEALS-----</h1>
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        
		  Stock_ID: <input type = "number" name = "stid" value="<?php echo $stockid?>">
         <br>
         <?php echo $stockid_err?>
		 Meal:
		 <input type = "radio" name = "mmeal" value = "Breakfast"> Breakfast
         <input type = "radio" name = "mmeal" value = "Lunch"> Lunch
         <input type = "radio" name = "mmeal" value = "Snacks"> Snacks
         <input type = "radio" name = "mmeal" value = "Dinner"> Dinner
         
         <br>
         
         <?php echo $meal_err?>
		 Quantity: <input type = "number" name = "q" value="<?php echo $qty?>">
         <br>
         <?php echo $qty_err?>
		 
                     
       
         
		 
		 
  
         
                       
          <input type="submit" name="submit" value="submit"/>
          
                 
 <br><br><br>
 <a href = "../cattransaction.php" target = "_self"> <- GO BACK TO CATERER PAGE <br></a>
          <a href = "../index.php" target = "_self"> <- GO BACK TO HOME<br></a> 
          
        
 
          
      </form>
        
        
        
      </body>
  </html>
  
