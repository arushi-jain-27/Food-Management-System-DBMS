<?php
require_once 'connect.php';

           $month=0;
        
         $month_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $month=$_POST["month"];
               
           if(empty($month))
           $month_err="Please enter the month <br>";
               
              
          
           if(empty($month_err)){
                //echo $catid;
                $sql="call calculate_transactions($month)";
             $result = $conn->query($sql);
                
                     
                
                
            /*if ($result->num_rows > 0) {
                    // output data of each row
                        echo " CAT_ID------NAME-----------------STUDENT_REC----GUEST_REC-----EVENT_REC----EMP_SAL----PURCHASES ";
                        while($row = $result->fetch_assoc()) {
                            echo "<br>";
                            foreach($row as $key=>$value)    {
                                   if($value)
                                    echo  $value ."------------- ";
                                   else 
                                   echo "0--------"; 
                            }    
                        }
                } */
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
							<th>Students Payments received</th> 
							<th>Guests Payments received</th> 
							<th>Events Payments received</th> 
							<th>Total Salary given</th>
							<th>Total purchase cost</th>
							
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
    }



?>






<!DOCTYPE html>
<html>
     <head>
      <title>view caterer transactions.</title>
   </head>
    
   <body style="text-align:center;"background="back1.jpg">
   <h1> -----VIEW CATERER TRANSACTIONS------ </h1>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        
        Enter the Month: <input type = "number" name = "month" value="<?php echo $month;?>">
       <?php echo $month_err?>
         
                   <input type="submit" name="submit" value="submit">
                   
                   </form>
               
 <br><br><br>
 <a href = "../cattransaction.php" target = "_self"> <- GO BACK TO CATERER PAGE <br></a>
          <a href = "index.php" target = "_self"> <- GO BACK TO HOME<br></a>  
           
        
        
        
      </body>
  </html>