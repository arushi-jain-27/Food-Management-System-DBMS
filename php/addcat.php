   <?php
     require_once 'connect.php';
         $catid=$cattenure=0;
         $catname="";
		 
         
         $catid_err=$catname_err=$cattenure_err=$catdate_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $catid=$_POST["cid"];
               
               if(empty($catid))
               $catid_err="enter the caterer id<br>";
               
                $catname=$_POST["cname"];
               if(empty($catname))
               $catname_err="enter the caterer name<br>";
               
                              
                $cattenure=$_POST["ctenure"];
                if(empty($cattenure))
               $cattenure_err="enter the caterer tenure<br>";
               
               if(empty($catid_err)||empty($catname_err)||empty($cattenure_err)){
                             
              $sql="INSERT INTO caterer VALUES ($catid,'$catname',now(),$cattenure)";
              //$returnval= mysqli_query($sql,$conn);
                $retval = $conn->query($sql);
   
   if($retval ==1) {
    header('location: http://127.0.0.1/cattransaction.php');
   }
   else 
   $error="could not insert new caterer.<br>";     
   }        
          }    
              
              $conn->close();
  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Adding a caterer.</title>
    </head>
    
    <body style="text-align:center;"background="back1.jpg">
	<h1>------ADDING A CATERER-----</h1>
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Caterer_ID: <input type = "number" name = "cid" value="<?php echo $catid?>">
         <br>
         <?php echo $catid_err?>
     Caterer_name: <input type = "text" name = "cname" value="<?php echo $catname?>">
        <br>
        <?php echo $catname_err?>
	
             
       
         Tenure:
  <input type="number" name="ctenure" value="<?php echo $cattenure ?>">
  <br>
  <?php echo $cattenure_err?>
         
                       
          <input type="submit" name="submit" value="submit"/>
 
 
      </form>
        
 <br><br><br>
 <a href = "../cattransaction.php" target = "_self"> <- GO BACK TO CATERER PAGE <br></a>
          <a href = "../index.php" target = "_self"> <- GO BACK TO HOME<br></a> 
          
        
        
      </body>
  </html>
  
