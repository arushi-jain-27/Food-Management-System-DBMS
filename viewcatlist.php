<?php
require_once 'connect.php';

	echo"
   <body  background=\"back1.jpg\" style=\"text-align:center;\">
   <h1>-------CATERER LIST---------</h1>";

	$sql="select caterer.*,cat_payment_rec(caterer.cat_id,'2017-01-01','2018-01-01') as a,no_of_students(caterer.cat_id) as b,eventcat_rating(caterer.cat_id)as c,guestcat_rating(caterer.cat_id) as d,stucat_rating(caterer.cat_id) as e from caterer";
	 $result = $conn->query($sql);
	 
	 
	
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
							<th>ID</th>
							<th>Name</th> 
							<th>D.O.J.</th>
							<th>Tenure</th>
							<th>Payments received</th> 
							<th>No. of students</th>
							<th>Event rating</th>
							<th>Guest rating</th> 
							<th>Student rating</th>
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
 <a href = \"cattransaction.php\" target = \"_self\"> <- GO BACK TO CATERER PAGE <br></a>
          <a href = \"stutransaction.php\" target = \"_self\"> <- GO BACK TO STUDENT PAGE <br></a> 
          <a href = \"guesttransaction.php\" target = \"_self\"> <- GO BACK TO GUEST PAGE <br></a>
		  <a href = \"../index.php\" target = \"_self\"> <- GO BACK TO HOME<br></a>
           ";

          


/*
if($result)
echo "---success=----";*/







?>

<!--
<!DOCTYPE html> 

<html>
   
   <head>
      <title>-------CATERER LIST---------</title>
	  
   </head>
	
   <body  background="back1.jpg" style="text-align:center;">
   <h1>-------CATERER LIST---------</h1>
   
   			
         
               
               
     </body>
	
</html>
-->