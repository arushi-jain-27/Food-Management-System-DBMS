
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
					$sql="call payment_log($stuid,'$start','$end')";      
                  
					$result=mysqli_query($conn,$sql);								
					
				
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
							<th>Payment_ID</th>
							<th>Amount </th> 
							
							<th>Current Meal Balance </th>
							
							
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
					$sql="SELECT SUM(amount) AS sumpayment FROM payments, stu_pay WHERE $stuid = stu_pay.stu_id AND stu_pay.payment_id = payments.payment_id
                  AND payments.date >= '$start' AND payments.date <= '$end'";  
					echo "<br>Total payment made=";
                  
					$result=mysqli_query($conn,$sql);								
					
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							
							foreach($row as $key=>$value)    {
								if($value)
								echo  $value ;
								else 
								echo "0--------"; 
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
					$sql="SELECT meal_balance as bal FROM student WHERE $stuid = stu_id";  
					echo "<br>Current Meal Balance=";
                  
					$result=mysqli_query($conn,$sql);								
					
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							
							foreach($row as $key=>$value)    {
								if($value)
								echo  $value ;
								else 
								echo "0--------"; 
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
    
    <body style="text-align:center;"background="back2.jpg">
    
    <h1>-----VIEW PAYMENTS LOG-----</h1>
        
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
