   <?php
session_start();
?>
   <?php
     require_once 'connect.php';
         $eventid=$catid=$ppl=0;
         $name=$date=$venue="";
		 
         
         $catid_err=$eventid_err=$name_err=$venue_err=$ppl_err=$date_err="";
            
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $catid=$_POST["cid"];
               
               if(empty($catid))
               $catid_err="enter the caterer id<br>";
		   
				$eventid=$_POST["eid"];
				$_SESSION["id"] = $eventid;
				
               if(empty($eventid))
               $eventid_err="enter the event id<br>";
               
                $name=$_POST["ename"];
               if(empty($name))
               $name_err="enter the event name<br>";
               
                              
                $venue=$_POST["evenue"];
                if(empty($venue))
               $venue_err="enter the event venue<br>";
		   
				$date=$_POST["edate"];
                if(empty($date))
               $date_err="enter the event date<br>";
		   
				$ppl=$_POST["people"];
                if(empty($ppl))
               $ppl_err="enter the number of people<br>";
               
               if(empty($eventid_err)||empty($catid_err)||empty($name_err)||empty($venue_err)||empty($date_err)||empty($ppl_err)){
                             
              $sql="INSERT INTO event VALUES ($eventid,'$name','$date','$venue',$ppl,$catid)";
              //$returnval= mysqli_query($sql,$conn);
                $retval = $conn->query($sql);
   
   if($retval ==1) {
    header('location:  http://127.0.0.1/addeventstock4.php');
   }
   else 
   $error="could not insert new event.<br>";     
   }        
          }    
              
              $conn->close();
  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Adding a event.</title>
    </head>
    
    <body style="text-align:center;"background="back1.jpg">
	<h1>-------ADDING AN EVENT-------</h1>
	
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Event_ID: <input type = "number" name = "eid" value="<?php echo $eventid?>">
         <br>
         <?php echo $eventid_err?>
		Caterer_ID: <input type = "number" name = "cid" value="<?php echo $catid?>">
         <br>
         <?php echo $catid_err?>
		Name: <input type = "text" name = "ename" value="<?php echo $name?>">
        <br>
        <?php echo $name_err?>
		Venue: <input type = "text" name = "evenue" value="<?php echo $venue?>">
        <br>
        <?php echo $venue_err?>
		Date: <input type = "date" name = "edate" value="<?php echo $date?>">
        <br>
        <?php echo $date_err?>
		Number of People: <input type = "number" name = "people" value="<?php echo $ppl?>">
        <br>
        <?php echo $ppl_err?>
		
             
       
       
         
                       
          <input type="submit" name="submit" value="submit"/>
 
          
      </form>
           
      </body>
  </html>
  
