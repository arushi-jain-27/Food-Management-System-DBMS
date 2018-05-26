
   <?php
     require_once 'connect.php';
         $mealid=0;
		 $meal="";
		 $stuid=0;
		 
         
		 
         
         $mealid_err=$meal_err=$stuid_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
				$stuid=$_POST["sid"];
               
               if(empty($stuid))
               $stuid_err="enter the student id<br>";
               $mealid=$_POST["mid"];
               
               if(empty($mealid))
               $mealid_err="enter the meal id<br>";
				
               
                $meal=$_POST["meal"];
               if(empty($meal))
               $meal_err="enter the meal<br>";
               
                              
             
               
               if(empty($mealid_err)||empty($meal_err) ){
                             
              $sql="INSERT INTO meal_taken VALUES ('$mealid',now(), '$meal'); INSERT INTO mealtaken_stu values ($mealid,$stuid);";
              //$returnval= mysqli_query($sql,$conn);
                $retval = $conn->multi_query($sql);
   
   if($retval ==1) {
    header('location: http://127.0.0.1/stutransaction.php');
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
        <title>Taking a meal for a student.</title>
    </head>
    
    <body style="text-align:center;"background="back1.jpg">
   
   			<h1>-------EATING A MEAL-------</h1>
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Meal_ID: <input type = "number" name = "mid" value="<?php echo $mealid?>">
         <br>
         <?php echo $mealid_err?>
		  Student_ID: <input type = "number" name = "sid" value="<?php echo $stuid?>">
         <br>
         <?php echo $stuid_err?>
		 
                     
       
         Meal:
		 <input type = "radio" name = "meal" value = "Breakfast"> Breakfast
         <input type = "radio" name = "meal" value = "Lunch"> Lunch
         <input type = "radio" name = "meal" value = "Snacks"> Snacks
         <input type = "radio" name = "meal" value = "Dinner"> Dinner
         
         <br>
         
         <?php echo $meal_err?>
		 
		 
  
         
                       
          <input type="submit" name="submit" value="submit"/>
 
          
      </form>
        
       <a href = "../stutransaction.php" target = "_self"> <-GO BACK TO STUDENT PAGE <br></a>
	   
       <a href = "../index.php" target = "_self"> <-GO BACK TO HOME <br></a>
        
        
        
      </body>
  </html>
  
