<?php
require_once 'connect.php';

    $sql="select meal_system.*,per_day_cost(meal_system.system_id) as a,no_of_users(meal_system.system_id) as b,discount(meal_system.system_id)as d from meal_system";
     $result = $conn->query($sql);
    
if ($result->num_rows > 0) {
				echo "<body style=\"text-align:center;\">
   <h1> -----MEAL SYSTEMS------ </h1>";
   				 // output data of each row
   				echo "
				<style>
					table, th, td {
						border: 1px solid black;
					}
					</style>
				<table align =\"center\" >
						  <tr>
							<th>System_ID</th>
							<th>Name </th> 
							
							<th>Breakfast Cost </th>
							<th>Lunch Cost</th> 
							<th>Snacks Cost </th>
							<th>Dinner Cost</th>
							<th>Cost per day</th>
							<th>Number of Users</th>
							<th>Discount</th>
							
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

echo "</body>";
echo "
 <br><br><br>
 <a href = \"../stutransaction.php\" target = \"_self\"> <- GO BACK TO STUDENT PAGE <br></a>
		  <a href = \"../index.php\" target = \"_self\"> <- GO BACK TO HOME<br></a>
           ";



?>





<!--


<!DOCTYPE html>
<html>
     <head>
      <title>view mealing systems list</title>
   </head>
    
   <body>
        
        
        
        
      </body>
  </html>
  