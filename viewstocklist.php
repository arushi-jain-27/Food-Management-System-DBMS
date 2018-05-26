

<?php
require_once 'connect.php';

		   $catid=0;
        
         $catid_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $catid=$_POST["cid"];
               
           if(empty($catid))
           $catid_err="enter the caterer id<br>";
               
              
          
           if(empty($catid_err)){
				//echo $catid;
				//$sql="select stu_id, stu_rating from stu_cat where stu_cat.cat_id=$catid";
				$sql="select food_item.*, stock.* from stock, food_item, item_stock_cat where stock.stock_id=item_stock_cat.stock_id and item_stock_cat.cat_id=$catid and food_item.item_id=item_stock_cat.item_id";
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
							<th>Item ID</th>
							<th>Item Name</th>
							<th>Item Type</th>
							
							<th>Stock ID</th>
							<th>Current Quantity</th> 
							<th>Rate per Unit</th> 
							
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
      <title>view stock list</title>
   </head>
	
   <body style="text-align:center;"background="back2.jpg">
	<h1>------LISTING STOCK FOR A CATERER-----</h1>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
		
		Enter the Caterer_ID: <input type = "number" name = "cid" value="<?php echo $catid;?>">
       <?php echo $catid_err?>
         
           		<input type="submit" name="submit" value="submit">
           		
           		</form>
           		
		       
 <br><br><br>
 <a href = "cattransaction.php" target = "_self"> <- GO BACK TO CATERER PAGE <br></a>
          <a href = "index.php" target = "_self"> <- GO BACK TO HOME<br></a> 
          
        
		
		
  	</body>
  </html>
  
