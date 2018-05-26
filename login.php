   <?php
     require_once 'connect.php';
       
         $usern=$password="";
		 
         
         $error=$usern_err=$password_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               
			   $usern=$_POST["usn"];
               if(empty($usern))
               $usern_err="enter the username<br>";
				
				$password=$_POST["psw"];
				if(empty($password))
               $password_err="enter the password<br>";
               
               if(empty($usern_err)&&empty($password_err)){
                             
              
   
					if($usern=="admin" and $password=="admin123") {
					header('location: http://127.0.0.1/index.php');
							}
					else {
					$error="Incorrect username or password.<br>";     
					}        
				}    
	}
              $conn->close();
  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>WELCOME.</title>
    </head>
    
    <body style="text-align:center;" background="back1.jpg">
	<h1>------WELCOME TO MESS MANAGEMENT SYSTEM-----</h1>
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        USERNAME: <input type = "text" name = "usn" value="<?php echo $usern?>">
         <br>
         <?php echo $usern_err?>
		PASSWORD: <input type = "password" name = "psw" value="<?php echo $password?>">
         <br>
         <?php echo $password_err?>
		 <?php echo $error?>
   
        
         
                       
          <input type="submit" name="Login" value="submit"/>
 
          
      </form>
      
             
          
        
        
        
        
      </body>
  </html>
  
