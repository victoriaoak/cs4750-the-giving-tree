<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
  
  <title>The Giving Tree</title>    
</head>
<?php include 'header.php'?>
<body>
  
  <div class="container">
    <h1>Thanks for visiting!</h1>
    Successfully logged out 
  </div>

<?php
if (count($_COOKIE) > 0)
{
   foreach ($_COOKIE as $key => $value)
   {
      // Deletes the variable (array element) where the value is stored in this PHP.
      // However, the original cookie still remains intact in the browser.   	
      unset($_COOKIE[$key]);   
		
      // To completely remove cookies from the client, 
      // set the expiration time to be in the past
      setcookie($key, '', time() - 3600);
   }
	
   // redirect to the login page immediately
   //    header('Location: login.php');
	
   // redirect with 5 seconds delay
   header('refresh:3; url=homepage.php');
}
?>

<?php include('footer.html') ?>







</body>
</html>
