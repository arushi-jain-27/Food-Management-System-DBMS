
<?php
     require 'connect.php';
         $stuid=$bf=$bfcost=$l=$lcost=$sn=$sncost=$din=$dincost=0;
		 $start=$end="";
        
         $stuid_err=$start_err=$end_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $stuid=$_POST["stid"];
               
               if(empty($stuid))
               $stuid_err="enter the student id<br>";
				$start=$_POST["sid"];
				$end=$_POST["eid"];
               
               
               
              
          
               if(empty($stuid_err)){
					$sql="call meal_log($stuid,'$start','$end')";
        
                  
					$result=mysqli_query($conn,$sql);
					
					
					
					
					
                       
					echo "\t\t\t\t\t";
					if ($result->num_rows > 0) {
   				 // output data of each row
   				echo "
				<style>
					table, th, td {
						border: 1px solid black;
					}
					</style>
				<table align =\"center\">
						  <tr>
							<th>Meal_ID</th>
							<th>Date</th> 							
							<th>Meal</th>
							
							
						  </tr>";
						  
				
   					 while($row = $result->fetch_assoc()) {
						echo "<tr>";
						foreach($row as $key=>$value)	{
							if($value)
							 echo "<td>".$value."</td>";
							else 
							 echo "<td>0</td>"; 
       				 }
   					 
       				

					 echo "</tr>";
					 
   		 }
		 echo "</table>"."<br>";
		 
	}
					else {
					echo "0 results";
					}
				   
				}
             
              
              $conn->close();
	}
			  ?>
 
<?php
     require 'connect.php';
         $stuid=$bf=$bfcost=$l=$lcost=$sn=$sncost=$din=$dincost=0;
		 $start=$end="";
        
         $stuid_err=$start_err=$end_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $stuid=$_POST["stid"];
               
               if(empty($stuid))
               $stuid_err="enter the student id<br>";
				$start=$_POST["sid"];
				$end=$_POST["eid"];    
               if(empty($stuid_err)){
				   $sql1="SELECT COUNT(*) as bf, count(*)*find_meal_cost('Breakfast',stu_meals.system_id) FROM stu_meals, meal_taken, mealtaken_stu WHERE stu_meals.stu_id=$stuid and mealtaken_stu.stu_id=$stuid and mealtaken_stu.meal_id=meal_taken.meal_id
                        AND meal_taken.meal LIKE ('Breakfast') AND meal_taken.date >= '$start' AND meal_taken.date <= '$end'";
					
                   mysqli_query($conn,$sql1) or die("##");
                       // $retval = $conn->query($sql);
                    //$result1 = $conn->query($sql1);
					$result1=mysqli_query($conn,$sql1);					
						echo "<br> Number of Breakfasts, Total Cost=";
					if ($result1->num_rows > 0) {
						while($row = $result1->fetch_assoc()) {
							foreach($row as $key=>$value)    {
								if ($value)
								echo  $value.",";
								 else
								echo "0,";
							}
						}
                                       
					}
					else {
					echo "0 results";
					}
				   		}
             
              
              $conn->close();
	}
			  ?>
<?php
     require 'connect.php';
         $stuid=$bf=$bfcost=$l=$lcost=$sn=$sncost=$din=$dincost=0;
		 $start=$end="";
        
         $stuid_err=$start_err=$end_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $stuid=$_POST["stid"];
               
               if(empty($stuid))
               $stuid_err="enter the student id<br>";
				$start=$_POST["sid"];
				$end=$_POST["eid"];    
               if(empty($stuid_err)){
				   $sql1="SELECT COUNT(*) as bf, count(*)*find_meal_cost('Lunch',stu_meals.system_id) FROM stu_meals, meal_taken, mealtaken_stu WHERE stu_meals.stu_id=$stuid and mealtaken_stu.stu_id=$stuid and mealtaken_stu.meal_id=meal_taken.meal_id
                        AND meal_taken.meal LIKE ('Lunch') AND meal_taken.date >= '$start' AND meal_taken.date <= '$end'";
					
                   mysqli_query($conn,$sql1) or die("##");
                       // $retval = $conn->query($sql);
                    //$result1 = $conn->query($sql1);
					$result1=mysqli_query($conn,$sql1);					
						echo "<br> Number of Lunches, Total Cost=";
					if ($result1->num_rows > 0) {
						while($row = $result1->fetch_assoc()) {
							foreach($row as $key=>$value)    {
								if($value)
								echo  $value.", ";
								else 
								echo "0,"; 
							}
						}
                                       
					}
					else {
					echo "0 results";
					}
				   		}
             
              
              $conn->close();
	}
			  ?>
<?php
     require 'connect.php';
         $stuid=$bf=$bfcost=$l=$lcost=$sn=$sncost=$din=$dincost=0;
		 $start=$end="";
        
         $stuid_err=$start_err=$end_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $stuid=$_POST["stid"];
               
               if(empty($stuid))
               $stuid_err="enter the student id<br>";
				$start=$_POST["sid"];
				$end=$_POST["eid"];    
               if(empty($stuid_err)){
				   $sql1="SELECT COUNT(*) as bf, count(*)*find_meal_cost('Snacks',stu_meals.system_id) FROM meal_taken, mealtaken_stu,stu_meals WHERE stu_meals.stu_id=$stuid and mealtaken_stu.stu_id=$stuid and mealtaken_stu.meal_id=meal_taken.meal_id
                        AND meal_taken.meal LIKE ('Snacks') AND meal_taken.date >= '$start' AND meal_taken.date <= '$end'";
					
                   mysqli_query($conn,$sql1) or die("##");
                       // $retval = $conn->query($sql);
                    //$result1 = $conn->query($sql1);
					$result1=mysqli_query($conn,$sql1);					
						echo "<br> Number of Snacks, Total Cost=";
					if ($result1->num_rows > 0) {
						while($row = $result1->fetch_assoc()) {
							foreach($row as $key=>$value)    {
								if($value)
								echo  $value.", ";
								else 
								echo " 0, "; 
							}
						}
                                       
					}
					else {
					echo "0 results";
					}
				   		}
             
              
              $conn->close();
	}
			  ?>



<?php
     require 'connect.php';
         $stuid=$bf=$bfcost=$l=$lcost=$sn=$sncost=$din=$dincost=0;
		 $start=$end="";
        
         $stuid_err=$start_err=$end_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $stuid=$_POST["stid"];
               
               if(empty($stuid))
               $stuid_err="enter the student id<br>";
				$start=$_POST["sid"];
				$end=$_POST["eid"];    
               if(empty($stuid_err)){
				   $sql1="SELECT COUNT(*) as bf, count(*)*find_meal_cost('Dinner',stu_meals.system_id) FROM stu_meals, meal_taken, mealtaken_stu WHERE stu_meals.stu_id=$stuid and mealtaken_stu.stu_id=$stuid and mealtaken_stu.meal_id=meal_taken.meal_id
                        AND meal_taken.meal LIKE ('Dinner') AND meal_taken.date >= '$start' AND meal_taken.date <= '$end'";
					
                   mysqli_query($conn,$sql1) or die("##");
                       // $retval = $conn->query($sql);
                    //$result1 = $conn->query($sql1);
					$result1=mysqli_query($conn,$sql1);					
						echo "<br> Number of Dinners, Total cost=";
					if ($result1->num_rows > 0) {
						while($row = $result1->fetch_assoc()) {
							foreach($row as $key=>$value)    {
								if($value)
								echo  $value.", ";
								else 
								echo " 0,"; 
							}
						}
                                       
					}
					else {
					echo "0 results";
					}
				   		}
             
              
              $conn->close();
	}
			  ?>


			  

<!DOCTYPE html>
<html>
    <head>
        <title>Display student meal log.</title>
    </head>
    
    <body background="back2.jpg" style="text-align:center;">
    
    <h1>-----VIEW MEALS LOG-----</h1>
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Student_ID: <input type = "number" name = "stid" value="  <?php echo $stuid?>">
         <br>
      <?php echo $stuid_err?>
	  Start_Date: <input type = "date" name = "sid" value="  <?php echo $start?>">
         <br>
      <?php echo $start_err?>
	  End_ID: <input type = "date" name = "eid" value="  <?php echo $end?>">
         <br>
      <?php echo $end_err?>
  
          
                       
          <input type="submit" name="submit" value="submit"/>
          
          

 <br><br><br>
 <a href = "../stutransaction.php" target = "_self"> <- GO BACK TO STUDENT PAGE <br></a>
          <a href = "../index.php" target = "_self"> <- GO BACK TO HOME<br></a>

          
 
          
      </form>
        
        
        
      </body>
  </html>
