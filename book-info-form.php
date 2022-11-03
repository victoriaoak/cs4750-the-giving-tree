<?php
require("connect-db.php");      // include("connect-db.php");
require("book-db.php");

$list_of_books = getAllBooks();
$book_to_update = null;      
?>

<?php
// if ($_SERVER['REQUEST_METHOD'] == 'POST')
// {
//   if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='Add') 
//   {
//       addFriend($_POST['name'], $_POST['major'], $_POST['year']);
//       $list_of_friends = getAllFriends();  
//   }
//   else if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='Update')
//   {
//       $friend_to_update = getFriendByName($_POST['friend_to_update']);
//   }
//   else if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='Delete') 
//   {
//       deleteFriend($_POST['friend_to_delete']);
//       $list_of_friends = getAllFriends();
//   }
//   if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='Confirm update')
//   {
//     updateFriend($_POST['name'], $_POST['major'], $_POST['year']);
//     $list_of_friends = getAllFriends();
//   }
// }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="your name">
  <meta name="description" content="include some description about your page">      
  <title>Book Insert/Update</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="icon" type="image/png" href="http://www.cs.virginia.edu/~up3f/cs4750/images/db-icon.png" />
</head>

<body>
<?php include('header.html') ?> 


<div class="container">
  <h1>Update/Insert Book</h1>  

<form name="mainForm" action="book-catalogue.php" method="post">   
  <div class="row mb-3 mx-3">
    Title:
    <input type="text" class="form-control" name="title" required 
          value="<?php if ($book_to_update!=null) echo $book_to_update['title'] ?>"
    />            
  </div>  
  <div class="row mb-3 mx-3">
    Author:
    <input type="text" class="form-control" name="author" required 
    value="<?php if ($book_to_update!=null) echo $book_to_update['author'] ?>"
    />            
  </div>
  <div class="row mb-3 mx-3">
    Genre:
    <input type="text" class="form-control" name="genre" 
    value="<?php if ($book_to_update!=null) echo $book_to_update['genre'] ?>"
    />            
  </div>  
  <div class="row mb-3 mx-3">
    Average Rating:
    <input type="number" max="5" min="0" step="0.01" class="form-control" name="avg_rating" 
    value="<?php if ($book_to_update!=null) echo $book_to_update['avg_rating'] ?>"
    />            
  </div>
  <div class="row mb-3 mx-3">
    Quantity:
    <input type="number" min="0" class="form-control" name="quantity" 
    value="<?php if ($book_to_update!=null) echo $book_to_update['quantity'] ?>"
    />            
  </div>
  <div class="row mb-3 mx-3">
    In Stock:
    <input type="number" max="1" min="0" class="form-control" name="in_stock" 
    value="<?php if ($book_to_update!=null) echo $book_to_update['in_stock'] ?>"
    />            
  </div>     
  <div>
    <input type="submit" value="Add" name="btnAction" class="btn btn-dark" 
           title="Insert the book into the database" />            
    <input type="submit" value="Confirm update" name="btnAction" class="btn btn-primary" 
           title="Update book" />            
  </div>  

</form>   

</div>    

<?php include('footer.html') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>