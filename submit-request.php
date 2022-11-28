<?php
require("connect-db.php");      // include("connect-db.php");
require("request-db.php");

$list_of_admin = getAdminNameRole();
echo $list_of_admin[0];
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="your name">
  <meta name="description" content="include some description about your page">      
  <title>Submit a Request</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="icon" type="image/png" href="http://www.cs.virginia.edu/~up3f/cs4750/images/db-icon.png" />
</head>

<body>

<?php include('header.php') ?> 


<div class="container">
  <h1>Submit a Request</h1>  

<form name="mainForm" action="homepage.php" method="post">    
  <div class="row mb-3 mx-3">
    For:
    <select class="form-control">
        <!-- <?php foreach ($list_of_admin as $admin):?>
            <option><?php echo $admin['first_name'] + ' ' + $admin['last_name'] + ' - ' + $admin['admin_role'];?></option> -->
            <option>select</option>
    </select>          
  </div>  
  <div class="form-group mb-3 mx-3">
    <label for="exampleFormControlTextarea1">Request:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
  </div>        
  <div>
    <input type="submit" value="Submit" name="btnAction" class="btn btn-lg btn-success" 
           title="Submit your request to admin" />            
  </div>  

</form>   

</div>    

<?php include('footer.html') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>