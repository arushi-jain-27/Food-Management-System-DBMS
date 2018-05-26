 <?php
     require_once 'connect.php';
         $stuid=$stuyear=$stucat=$stumealsys=0;
         $stuname=$stucourse=$stubranch=$stuemail="";
        
         $stuid_err=$stuname_err=$stubranch_err=$stuemail_err=$stuyear_err=$stucat_err=$stumealsys_err=$stucourse_err="";
           
           
    if($_SERVER["REQUEST_METHOD"] == "POST") {
              
               $stuid=$_POST["sid"];
               if(empty($stuid))
               $stuid_err="enter the student id<br>";
               
                $stuname=$_POST["sname"];
               if(empty($stuname))
               $stuname_err="enter the student name<br>";
               
                $stucourse=$_POST["scourse"];
               if(empty($stuname))
               $stucourse_err="select the student course<br>";
               
                $stubranch=$_POST["sbranch"];
               if(empty($stubranch))
               $stubranch_err="enter the student branch<br>";
               
                $stuemail=$_POST["semail"];
               if(empty($stuemail))
               $stuemail_err="enter the student email<br>";
               
                $stuyear=$_POST["syr"];
                if(empty($stuyear))
               $stuyear_err="enter the student year<br>";
               
               $stucat=$_POST["scat"];
               if(empty($stucat))
               $stucat_err="enter the caterer id<br>";
               
               $stumealsys=$_POST["smealsys"];
               if(empty($stumealsys))
               $stumealsys_err="enter the meal system id<br>";
               
               if(empty($stuid_err)&&empty($stuname_err)&&empty($stuname_err)&&empty($stubranch_err)&&empty($stuemail_err)&&empty($stuyear_err)&&empty($stucat_err)&&empty($stumealsys_err)){
                             
              $sql="INSERT INTO student VALUES ('$stuid','$stuname','$stucourse','$stubranch','$stuyear','$stuemail',0)";
              $sql2="INSERT INTO stu_cat values ('$stuid','$stucat',0)";
              $sql3="INSERT INTO stu_meals values ('$stuid','$stumealsys')";
              //$returnval= mysqli_query($sql,$conn);
                $retval = $conn->query($sql);
                $retval2 = $conn->query($sql2);
                $retval3= $conn->query($sql3);
  
   if($retval ==1 && $retval2==1 && $retval3==1) {
    echo "Student added successfully <br><br><br>";
    echo "<a href = \"addstudent.php\" target = \"_self\"> <- ADD ANOTHER STUDENT <br></a>
     <a href = \"../stutransaction.php\" target = \"_self\"> <- GO BACK TO STUDENT PAGE <br></a>
          <a href = \"../index.php\" target = \"_self\"> <- GO BACK TO HOME<br></a>";
           
   }
   else
   $error="could not insert new student.<br>";    
   }       
          }   
             
              $conn->close();
  ?>























<!DOCTYPE html>
<html>
    <head>
        <title>Adding a student.</title>
    </head>
   
    <body style="text-align:center;"background="back1.jpg">
    
    <h1>-------ADDING A STUDENT--------</h1>
       
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Student_ID: <input type = "number" name = "sid" value="<?php echo $stuid;?>">
         <br>
         <?php echo $stuid_err;?>
     Student_name: <input type = "text" name = "sname" value="<?php echo $stuname;?>">
        <br>
        <?php echo $stuname_err;?>
        <input type = "radio" name = "scourse" value = "B.Tech"> B.Tech
         <input type = "radio" name = "scourse" value = "M.Tech"> M.Tech
         <input type = "radio" name = "scourse" value = "M.Sc"> M.Sc
         <input type = "radio" name = "scourse" value = "B.Sc"> B.Sc
         <input type = "radio" name = "scourse" value = "PhD"> PhD
         <br>
        
         <?php echo $stucourse_err;?>
        Branch: <input type = "text" name = "sbranch" value="<?php echo $stubranch;?>">
        <br>
        <?php echo $stubranch_err;?>
       
      
         year (between 1 and 10):
  <input type="number" name="syr" min="1" max="10" value="<?php echo $stuyear; ?>">

  <br>
  <?php echo $stuyear_err;?>
          Email: <input type = "text" name = "semail" value="<?php echo $stuemail;?>">
          <br>
          <?php echo $stuemail_err;?>
          
          Caterer ID :
  <input type="number" name="scat" value="<?php echo $stucat ;?>">
	
  <br>
         <?php echo $stucat_err;?>
         
           Meal system ID :
  <input type="number" name="smealsys" value="<?php echo $stumealsys; ?>">
	
  <br>
         <?php echo $stumealsys_err;?>
         
                      
          <input type="submit" name="submit" value="submit"/>
 
 
 <br><br><br>
 <a href = "../stutransaction.php" target = "_self"> <- GO BACK TO STUDENT PAGE <br></a>
          <a href = "../index.php" target = "_self"> <- GO BACK TO HOME<br></a>
         
      </form>
       
       
       
      </body>
  </html>
