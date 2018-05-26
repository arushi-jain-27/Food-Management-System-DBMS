<?php
session_start();
?>

   <?php
     require_once 'connect.php';
         $mealid=0;
		 $meal="";
		 $guestid="";
		 $guestid=$_SESSION["id"];
         
		 
         
         $mealid_err=$meal_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $mealid=$_POST["mid"];
               
               if(empty($mealid))
               $mealid_err="enter the meal id<br>";
				
               
                $meal=$_POST["mmeal"];
				$_SESSION['meal'] = '$meal';
               if(empty($meal))
               $meal_err="enter the meal<br>";
               
                              
             
               
               if(empty($mealid_err)||empty($meal_err) ){
                             
              $sql="INSERT INTO meal_taken VALUES ($mealid,now(), '$meal'); INSERT INTO mealtaken_guest values ($mealid,$guestid);";
              //$returnval= mysqli_query($sql,$conn);
                $retval = $conn->multi_query($sql);
   
   if($retval ==1) {
    header('location:http://127.0.0.1/addpaymentsguest2.php');
   }
   else 
   $error="could not insert new meal.<br>";     
   }        
          }    
              
              $conn->close();
  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Taking a meal.</title>
    </head>
    
    <body style="text-align:center;"background="back1.jpg">
	<h1>------SELECT A MEAL------</h1>
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Meal_ID: <input type = "number" name = "mid" value="<?php echo $mealid?>">
         <br>
         <?php echo $mealid_err?>
		 
                     
       
         Meal:
		 <input type = "radio" name = "mmeal" value = "Breakfast"> Breakfast
         <input type = "radio" name = "mmeal" value = "Lunch"> Lunch
         <input type = "radio" name = "mmeal" value = "Snacks"> Snacks
         <input type = "radio" name = "mmeal" value = "Dinner"> Dinner
         
         <br>
         
         <?php echo $meal_err?>
		 
		 
  
         
                       
          <input type="submit" name="submit" value="submit"/>
 
          
      </form>
      <!--
		<a href = "guesttransaction.php" target = "_self"> <- GO BACK TO GUEST PAGE<br></a>
		<a href = "index.php" target = "_self"> <- GO BACK TO HOME<br></a>
        
        -->
      </body>
  </html>
  
