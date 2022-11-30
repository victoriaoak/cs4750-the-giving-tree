<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="your name">
  <meta name="description" content="include some description about your page">      
  <title>The Giving Tree</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="icon" type="image/png" href="./icon/favicon-32x32.png" />
</head>

<style>
  .hero_image {
    width: 100%;
    height: 1200px;
    overflow: hidden;
    opacity: 0.5;
  }
</style>

<?php 
require ('connect-db.php');
require ('account-db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='Create') 
  {
      addUser($_POST['username'], $_POST['pwd'], $_POST['first_name'], $_POST['last_name'], $_POST['age'], $_POST['email'],  $_POST['phone_number'],  $_POST['street_address'], $_POST['city']);
      addAddress($_POST['street_address'], $_POST['city'], $_POST['state'], $_POST['zip_code']);
      $list_all_user_info = getAllUserInfo();
  }
}?>

<body>
<?php include('header.php') ?> 


<div class="container">
  <h1>The Giving Tree</h1>  

</div> 

<img class="hero_image" src="./images/books.jpg" alt="lots of books">

<?php include('footer.html') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>