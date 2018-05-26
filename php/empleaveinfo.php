
 <?php
     require_once 'connect.php';
         $catid=$month=0;
		 
        
         $catid_err=$month_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $catid=$_POST["cid"];
               
               if(empty($catid))
               $catid_err="enter the caterer id<br>";
				$month=$_POST["m"];
			
               
               
               
              
          
               if(empty($catid_err)){
               
	$sql="call find_emp_leaves($catid, $month)";
        
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
							<th>ID</th>
							<th>Name</th> 
							
							<th>D.O.J.</th>
							<th>Monthly Salary</th> 
							<th>Work</th> 
							
							<th>No. of leaves</th>
							<th>Final Salary</th>
							
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
        <title>Display caterer employee leaves and deducted salary.</title>
    </head>
    
    <body style="text-align:center;"background="back2.jpg">
	<h1>------FIND LEAVE RECORD FOR EMPLOYEES OF A CATERER AND DISPLAY SALARY AFTER DEDUCTION-----</h1>
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Caterer_ID: <input type = "number" name = "cid" value="  <?php echo $catid?>">
         <br>
      <?php echo $catid_err?>
	  Month: <input type = "number" name = "m" value="  <?php echo $month?>">
         <br>
      <?php echo $month_err?>
	 
  


          
          
                       
          <input type="submit" name="submit" value="submit"/>
          
                 
 <br><br><br>
 <a href = "../cattransaction.php" target = "_self"> <- GO BACK TO CATERER PAGE <br></a>
          <a href = "../index.php" target = "_self"> <- GO BACK TO HOME<br></a> 
          
        
 
          
      </form>
        
        
        
      </body>
  </html>
