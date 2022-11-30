<?php
require("connect-db.php");      // include("connect-db.php");
require("request-db.php");
require("account-db.php");

$list_of_admin = getAdminNameRole();
$customer_info = getUserByID($_COOKIE['user'], $_COOKIE['hash']);
$is_customer = getCustomerRank($_COOKIE['user'], $_COOKIE['hash']);
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
  <link rel="icon" type="image/png" href="./icon/favicon-32x32.png" />
</head>

<body>

<?php include('header.php') ?> 

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='Submit') 
  {
      addRequest($_POST['customer'], $_POST['admin_id'], $_POST['request-text']);
  }
}
?>

<div class="container">
  <h1>Submit a Request</h1>  

<form name="mainForm" action="submit-request.php" method="post"> 
  <div class="row mb-3 mx-3">
    From:
    <input type="text" class="form-control"
    value="<?php echo $customer_info['first_name']. " ". $customer_info['last_name'] ?>" disabled />
    <input type="hidden" name="customer" 
                value="<?php echo $customer_info['user_id']; ?>" />  
  </div>     
  <div class="row mb-3 mx-3">
    For:
    <select class="form-control" name="admin_id">
        <?php foreach($list_of_admin as $admin) { ?>
            <option value="<?php echo $admin['admin_id']?>">
            <?php echo $admin['first_name'].' '.$admin['last_name'].' - '.$admin['admin_role']?> </option> 
        <?php } ?>
    </select>          
  </div>  
  <div class="form-group mb-3 mx-3">
    <label for="exampleFormControlTextarea1">Request:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="request-text"></textarea>
  </div>        
  <div>
    <?php if (isset($is_customer)) { ?>
    <input type="submit" value="Submit" name="btnAction" class="btn btn-lg btn-success" 
           title="Submit your request to admin" /> <?php } else { ?> 
    <input type="submit" value="Submit" name="btnAction" class="btn btn-lg btn-success" disabled
           title="Submit your request to admin" /> <?php } ?>       
  </div>  

</form>   

</div>    

<?php include('footer.html') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>