
 <?php
     require_once 'connect.php';
         $stuid=0;
        
         $stuid_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $stuid=$_POST["sid"];
               
               if(empty($stuid))
               $stuid_err="enter the student id<br>";
               
              
          
               if(empty($stuid_err)){
                                 
                  $sql="SELECT * from student,stu_cat,stu_meals where student.stu_id='$stuid' and student.stu_id=stu_cat.stu_id and stu_meals.stu_id=student.stu_id";
                  //$returnval= mysqli_query($sql,$conn);
                       // $retval = $conn->query($sql);
                    $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "id: " . $row["stu_id"]. "<br>Name : " . $row["name"]."<br>Course : " . $row["course"]. "<br>Branch : " . $row["branch"]. "<br>Year : " .$row["year"] . "<br>Email id : " .$row["email"]."<br>Meal Balance : " .$row["meal_balance"]. "<br>caterer id : " .$row["cat_id"]. "<br>system id : " .$row["system_id"]   ;
    }
}     else {
    echo "0 results";
}

/*
  if($retval ==1) {
    header('location: www.google.com');
   }
   else 
   $error="could not insert new student.<br>";     */
   }
          }    
              
              $conn->close();
?>




<!DOCTYPE html>
<html>
    <head>
        <title>Display student details.</title>
    </head>
    
    <body style="text-align:center;"background="back1.jpg">
    	<h1>----DISPLAY STUDENT DETAILS----</h1>
    	   <?php if(empty($stuid)) {
    echo "
        <form action=\" ".$_SERVER['PHP_SELF']."\" method=\"POST\">
        Student_ID: <input type = \"number\" name = \"sid\" value=\"  ".$stuid."\">
         <br>
      ".$stuid_err."  
          <input type=\"submit\" name=\"submit\" value=\"submit\"/>
         <br><br><br>
         
           <a href = \"stutransaction.php\" target = \"_self\"> <- GO BACK TO STUDENT PAGE <br></a>
          <a href = \"index.php\" target = \"_self\"> <- GO BACK TO HOME<br></a>
        
  		
  		        
      </form>
        
        ";
        }
        else {
        echo "<br><br><br><a href = \"displaystu.php\" target = \"_self\"> <- DISPLAY INFO FOR ANOTHER STUDENT </a>
        <br><a href = \"stutransaction.php\" target = \"_self\"> <- GO BACK TO STUDENT PAGE <br></a>
          <a href = \"index.php\" target = \"_self\"> <- GO BACK TO HOME<br></a>";
          }
        
        ?>
        
      </body>
  </html>
