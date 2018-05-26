
 <?php
     require_once 'connect.php';
         $auth_name="";        
         $auth_name_err=" ";
		 $pub_name="";        
         $pub_name_err=" ";
		 $lang_name="";        
         $lang_name_err=" ";
		 $genre_name="";        
         $genre_name_err=" ";
           $count=0;  
            
    if($_SERVER["REQUEST_METHOD"] == "POST") {
               $auth_name=$_POST["auth"];
               if(empty($auth_name))
               $auth_name_err="enter the author name<br>";
		       $pub_name=$_POST["pub"];               
               if(empty($pub_name))
               $pub_name_err="enter the publisher name<br>";
		       $lang_name=$_POST["lang"];               
               if(empty($lang_name))
               $lang_name_err="enter the language name<br>";
				$genre_name=$_POST["genre"];               
               if(empty($genre_name))
               $genre_name_err="enter the genre name<br>";                            
               $sql="SELECT books.title from books, book_author,author, book_publisher, publisher, book_genre, genre, book_language, language ";
				  
				  if ($auth_name!="")
				  {
					  $sql=$sql."where author.name='$auth_name' and author.author_id=book_author.author_id and books.book_id=book_author.book_id";
					  $count=1;
				  }
				  else
				  {
					  $search= ", book_author,author";
					  $sql= str_replace($search, "", $sql);
				  }
				  if ($pub_name!="")
				  {
					 if ($count==0)
					  {
						$sql=$sql."where publisher.name ='$pub_name' and publisher.publisher_id=book_publisher.publisher_id and books.book_id=book_publisher.book_id";
						$count=1;
					  }
					  else
						$sql=$sql." and publisher.name='$pub_name' and publisher.publisher_id=book_publisher.publisher_id and books.book_id=book_publisher.book_id";
					  
				  }
				   else
				  {
					  $search= ", book_publisher, publisher";
					  $sql= str_replace($search, "", $sql);
				  }
				   if ($lang_name!="")
				  {
					  if ($count==0)
					  {
						$sql=$sql."where language.name ='$lang_name' and language.language_id=book_language.language_id and books.book_id=book_language.book_id";
						$count=1;
					  }
					  else
						$sql=$sql." and language.name ='$lang_name' and language.language_id=book_language.language_id and books.book_id=book_language.book_id";
					  
				  }
				   else
				  {
					  $search= ", book_language, language";
					  $sql= str_replace($search, "", $sql);
				  }
				  if ($genre_name!="")
				  {
					  if ($count==0)
					  {
						$sql=$sql."where genre.name ='$genre_name' and genre.genre_id=book_genre.genre_id and books.book_id=book_genre.book_id";
						$count=1;
					  }
					  else
						$sql=$sql." and genre.name ='$genre_name' and genre.genre_id=book_genre.genre_id and books.book_id=book_genre.book_id";
					  
				  }
				   else
				  {
					  $search= ", book_genre, genre";
					  $sql= str_replace($search, "", $sql);
				  }
				 
                   	 $result = $conn->query($sql);
					 

if ($result->num_rows > 0) {
   				 while($row = $result->fetch_assoc()) {
						
						foreach($row as $key=>$value)	{
						
							 echo $value."<br>";
							
       				 }			 
       				}
					
		 
	}
	else
		echo "0 results";
			  
        }    
            
              $conn->close();
?>




<!DOCTYPE html>
<html>
    <head>
        <title>Display book details.</title>
    </head>
    
    <body style="text-align:center;"background="back1.jpg">
    	<h1>----DISPLAY BOOK DETAILS----</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Author Name: <input type = "text" name = "auth" value="<?php echo $auth_name?>">
         <br>
    
	 Publisher Name: <input type = "text" name = "pub" value="<?php echo $pub_name?>">
         <br>

	  Language Name: <input type = "text" name = "lang" value="<?php echo $lang_name?>">
         <br>
     
	  Genre Name: <input type = "text" name = "genre" value="<?php echo $genre_name?>">
         <br>
     
	  
  
          
                       
          <input type="submit" name="submit" value="submit"/>
        
        
        
        </form>
        
      </body>
  </html>
 <!-- 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Advanced Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/penna" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    .form-group{
        margin:10px;
        padding:10px;
        }
 p,h1,h2,h3,h4,div,button,input { 
   font-family: 'PennaRegular'; 
   font-weight: bold; 
   font-style: normal; 
   font-size:40px;
}
</style>
<body>
<div class="container">
<div class="jumbotron">
    <center><h1 style="align:center">Book Details</h1> 
    <p><b>Advanced Search</b></p>
    </center>     
</div>
  <div class="form-group">
      <label class="control-label col-sm-2" for="title">Title:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" style="font-size:30px;" id="title" placeholder="Title" name="title">
      </div>
    </div>
    <br/>
    <div class="form-group">
      <label class="control-label col-sm-2" for="author">Author:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control"style="font-size:30px;" id="author" placeholder="Author" name="author">
      </div>
    </div>
    <br/>
    <div class="form-group">
      <label class="control-label col-sm-2" for="publisher">Publisher:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" style="font-size:30px;"id="author" placeholder="Publisher" name="publisher">
      </div>
    </div>
    <br/>
    <div class="form-group">
      <label class="control-label col-sm-2" for="language">Language:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="language" style="font-size:30px;" placeholder="Language" name="language">
      </div>
    </div>
    <br/>
    <div class="form-group">
      <label class="control-label col-sm-2" for="genre">Genre:</label>
      <div class="col-sm-10">          
        <input type="text" style="font-size:30px;" class="form-control" id="genre" placeholder="Genre" name="genre">
      </div>
    </div>
    <br/>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default"><b>Submit</b></button>
      </div>
    </div>
   </form>
</div>

</body>
</html>
-->
