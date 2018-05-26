<?php
require_once 'connect.php';


	echo"
   <body  background=\"back1.jpg\" style=\"text-align:center;\">
   <h1>-------EVENT LIST---------</h1>";

	$sql="select event.*,amount(event.event_id) as a,cost_per_head(event.event_id) as b, amount from event, payments, event_pay where event.event_id=event_pay.event_id and event_pay.payment_id=payments.payment_id";
	//$sql="select event.*,amount(event.event_id) as a,cost_per_head(event.event_id) as b from event";
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
							<th>Event_ID</th>
							<th>Name </th> 
							
							<th>Date </th>
							<th>Venue</th> 
							<th>Number of People </th>
							<th>Caterer ID</th>
							<th>Cost incurred by the caterer</th>
							<th>Cost per head incurred</th>
							<th>Amount Received from event</th>
							
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

echo "        
 <br><br><br>
 <a href = \"../eventtransaction.php\" target = \"_self\"> <- GO BACK TO EVENT PAGE <br></a>
          <a href = \"../index.php\" target = \"_self\"> <- GO BACK TO HOME<br></a> ";
          
		  
echo "</body>";
          
        
/*
if($result)
echo "---success=----";*/







?>
