<?php
require_once 'connect.php';


	$sql="select * from books
	";
	 $result = $conn->query($sql);
	 
	 
	
	if ($result->num_rows > 0) {
   				 
						  
				
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
		
		 
	}	
 else {
    echo "0 results";
}

echo "</body>";









?>
