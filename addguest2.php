   <?php
session_start();
?>
   <?php
     require_once 'connect.php';
         $guestid=$catid=0;
         $name=$type="";
		 
         
         $catid_err=$guestid_err=$name_err=$type_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $catid=$_POST["cid"];
               
               if(empty($catid))
               $catid_err="enter the caterer id<br>";
		   
				$guestid=$_POST["gid"];
				$_SESSION['id'] = $guestid;
				
               if(empty($guestid))
               $catid_err="enter the guesr id<br>";
               
                $name=$_POST["gname"];
               if(empty($name))
               $name_err="enter the guest name<br>";
               
                              
                $type=$_POST["gtype"];
                if(empty($type))
               $type_err="enter the guest type<br>";
               
               if(empty($guestid_err)||empty($catid_err)||empty($name_err)||empty($type_err)){
                             
              $sql="INSERT INTO guest VALUES ($guestid,'$name','$type',$catid)";
              //$returnval= mysqli_query($sql,$conn);
                $retval = $conn->query($sql);
   
   if($retval ==1) {
    header('location:  http://127.0.0.1/eatmealguest2.php');
   }
   else 
   $error="could not insert new guest.<br>";     
   }        
          }    
              
              $conn->close();
  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Adding a guest.</title>
    </head>
    
    <body style="text-align:center;"background="back1.jpg">
	<h1>-----ADDING A GUEST------</h1>
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Guest_ID: <input type = "number" name = "gid" value="<?php echo $guestid?>">
         <br>
         <?php echo $guestid_err?>
		Caterer_ID: <input type = "number" name = "cid" value="<?php echo $catid?>">
         <br>
         <?php echo $catid_err?>
		Name: <input type = "text" name = "gname" value="<?php echo $name?>">
        <br>
        <?php echo $name_err?>
		Type: <input type = "text" name = "gtype" value="<?php echo $type?>">
        <br>
        <?php echo $type_err?>
		
             
       
       
         
                       
          <input type="submit" name="submit" value="submit"/>
 
          
      </form>
        
        <a href = "guesttransaction.php" target = "_self"> <- GO BACK TO GUEST PAGE<br></a>
		<a href = "index.php" target = "_self"> <- GO BACK TO HOME<br></a>
        
      </body>
  </html>
  
