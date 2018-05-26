   <?php
     require_once 'connect.php';
         $catid=$empid=$salary=0;
         $name=$work=$DOJ="";
		 
         
         $catid_err=$name_err=$empid_err=$date_err=$salary_err=$work_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $catid=$_POST["cid"];
               
               if(empty($catid))
               $catid_err="enter the caterer id<br>";
				$empid=$_POST["eid"];
               
               if(empty($empid))
               $empid_err="enter the employee id<br>";
               
                $name=$_POST["ename"];
               if(empty($name))
               $name_err="enter the employee name<br>";
               
                              
                $DOJ=$_POST["edate"];
                if(empty($DOJ))
               $date_err="enter the DOJ of employee<br>";
		   
				$salary=$_POST["esal"];
                if(empty($salary))
               $salary_err="enter the salary of employee<br>";
		   $work=$_POST["ework"];
                if(empty($work))
               $work_err="enter the work of employee<br>";
               
               if(empty($catid_err)||empty($name_err)||empty($eid_err)||empty($date_err)||empty($salary_err)||empty($work_err)){
                             
              $sql="INSERT INTO employee VALUES ($empid,'$name',$DOJ,$salary,'$work');INSERT INTO cat_emp values ($empid,$catid);";
              //$returnval= mysqli_query($sql,$conn);
                $retval = $conn->multi_query($sql);
   
   if($retval ==1) {
    header('location: http://127.0.0.1/cattransaction.php');
   }
   else 
   $error="could not insert new employee.<br>";     
   }        
          }    
              
              $conn->close();
  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Adding an employee.</title>
    </head>
    
    <body style="text-align:center;"background="back1.jpg">
	<h1>------ADDING AN EMPLOYEE-----</h1>
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Caterer_ID: <input type = "number" name = "cid" value="<?php echo $catid?>">
         <br>
         <?php echo $catid_err?>
		Employee_ID: <input type = "number" name = "eid" value="<?php echo $empid?>">
         <br>
         <?php echo $empid_err?>
     Employee_name: <input type = "text" name = "ename" value="<?php echo $name?>">
        <br>
        <?php echo $name_err?>
		DOJ: <input type = "date" name = "edate" value="<?php echo $DOJ?>">
         <br>
         <?php echo $date_err?>
	
             
       
         Salary:
  <input type="number" name="esalary" value="<?php echo $salary ?>">
  <br>
  <?php echo $salary_err?>
		Work: <input type = "text" name = "ework" value="<?php echo $work?>">
         <br>
         <?php echo $work_err?>
         
                       
          <input type="submit" name="submit" value="submit"/>
 
          
      </form>
      
             
 <br><br><br>
 <a href = "../cattransaction.php" target = "_self"> <- GO BACK TO CATERER PAGE <br></a>
          <a href = "../index.php" target = "_self"> <- GO BACK TO HOME<br></a> 
          
        
        
        
        
      </body>
  </html>
  
