
 <?php
     require_once 'connect.php';
         $catid=0;
		 $start=$end="";
        
         $catid_err=$start_err=$end_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $catid=$_POST["cid"];
               
               if(empty($catid))
               $catid_err="enter the caterer id<br>";
				$start=$_POST["sid"];
				$end=$_POST["eid"];
               
               
               
              
          
               if(empty($catid_err)){
               
	$sql="call purchase_log($catid,'$start','$end')";
        
                  //$returnval= mysqli_query($sql,$conn);
                       // $retval = $conn->query($sql);
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
							<th>Purchase_ID</th>
							<th>Purchase_Rate</th> 
							
							<th>quantity Purchase</th>
							<th>Food Item ID</th> 
							<th>Food Item Name</th>
							<th>Food Item Type</th>
							<th>Date</th>
							
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






<!DOCTYPE html>
<html>
    <head>
        <title>Display caterer make meal log.</title>
    </head>
    
    <body style="text-align:center;"background="back1.jpg">
   <h1> -----VIEW PURCHASE LOG------ </h1>
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Caterer_ID: <input type = "number" name = "cid" value="  <?php echo $catid?>">
         <br>
      <?php echo $catid_err?>
	  Start_Date: <input type = "date" name = "sid" value="  <?php echo $start?>">
         <br>
      <?php echo $start_err?>
	  End_ID: <input type = "date" name = "eid" value="  <?php echo $end?>">
         <br>
      <?php echo $end_err?>
  


          
          
                       
          <input type="submit" name="submit" value="submit"/>
 
          
      </form>
        
        
       <a href = "purchaselog.php" target = "_self"> VIEW ANOTHER LOG <br></a>
	  
        
       <a href = "../cattransaction.php" target = "_self"> <-GO BACK TO CATERER PAGE <br></a>
	   
       <a href = "../index.php" target = "_self"> <-GO BACK TO HOME <br></a>
        
        
      </body>
  </html>
