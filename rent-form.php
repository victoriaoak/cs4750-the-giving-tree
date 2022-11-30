<?php
require("connect-db.php");      // include("connect-db.php");
require("book-db.php");
require("account-db.php");

$list_of_books = getAllBooks();
// $book_to_update = null;      
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='Rent')
  {
      $book_to_rent = getBookByTitleAuthor($_POST['book_title_to_rent'], $_POST['book_author_to_rent']);
      $rent_user_info = getUserByID($_COOKIE['user'], $_COOKIE['hash']);
      addRents($book_to_rent['title'], $book_to_rent['author'], $rent_user_info['user_id']);
      addOrders($rent_user_info['user_id'], $book_to_rent['title'], $book_to_rent['author']);
  }
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="your name">
  <meta name="description" content="include some description about your page">      
  <title>Rent a Book</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="icon" type="image/png" href="./icon/favicon-32x32.png" />
</head>

<body>
<?php include('header.php') ?> 


<div class="container" style="padding-top:25px;">
  <h1>Rent a Book</h1>  
    <hr>
<form name="mainForm" action="accountInfo.php" method="post">
  <h3> <b> Book Information </b> </h3>
  <div class="row mb-3 mx-3">
    Title:
    <?php if ($book_to_rent!=null) echo $book_to_rent['title'] ?>
     
    <input type="hidden" name="book_title_update" 
                value="<?php echo $book_to_rent['title']; ?>" />         
  </div>  
  <div class="row mb-3 mx-3">
    Author:
    <?php if ($book_to_rent!=null) echo $book_to_rent['author'] ?> 
    <input type="hidden" name="book_author_update" 
                value="<?php echo $book_to_rent['author']; ?>" />           
  </div>
  <div class="row mb-3 mx-3">
    Genre:
    <?php if ($book_to_rent!=null) echo $book_to_rent['genre'] ?>
  </div>  
  <div class="row mb-3 mx-3">
    Average Rating:
    <?php if ($book_to_rent!=null) echo $book_to_rent['avg_rating'] ?>
    <input type="hidden" name="book_rating_update" 
                value="<?php echo $book_to_rent['avg_rating']; ?>" />            
  </div>
  <div class="row mb-3 mx-3">
    Quantity:
    <?php if ($book_to_rent!=null) echo $book_to_rent['quantity'] ?>
  </div>
  <div class="row mb-3 mx-3">
    In Stock:
    <?php if ($book_to_rent!=null) {if ($book_to_rent['in_stock']==0) echo "No"; else echo "Yes";} ?>
  </div>
  <br/>
  <hr>
  <h3> User Information </h3>  
  <div class="row mb-3 mx-3">
    Name:
    <?php if ($rent_user_info!=null) echo $rent_user_info['first_name'], " ", $rent_user_info['last_name']?>
    <input type="hidden" name="renter_name" 
                value="<?php echo $rent_user_info['first_name'], " ", $rent_user_info['last_name']; ?>" />         
  </div>  
  <div class="row mb-3 mx-3">
    Age:
    <?php if ($rent_user_info!=null) echo $rent_user_info['age']?>
    <input type="hidden" name="renter_age" 
                value="<?php echo $rent_user_info['age']; ?>" />         
  </div>  
  <div class="row mb-3 mx-3">
    Email:
    <?php if ($rent_user_info!=null) echo $rent_user_info['email']?>
    <input type="hidden" name="renter_email" 
                value="<?php echo $rent_user_info['email']; ?>" />         
  </div>  
  <div class="row mb-3 mx-3">
    Address:
    <?php if ($rent_user_info!=null) echo $rent_user_info['street_address'], " ", $rent_user_info['city'], " ", 
                    $rent_user_info['state'], " ", $rent_user_info['zip_code'] ?>
    <input type="hidden" name="renter_address" 
                value="<?php echo $rent_user_info['street_address'], " ", $rent_user_info['city'], " ", 
                    $rent_user_info['state'], " ", $rent_user_info['zip_code']; ?>" />         
  </div>  

  <br/>
  <hr>
  <h3> Rental Information </h3>    
  <div>
    <input type="submit" value="Rent" name="btnAction" class="btn btn-primary" 
           title="Rent book" />            
  </div>  

</form>   

</div>    

<?php include('footer.html') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>