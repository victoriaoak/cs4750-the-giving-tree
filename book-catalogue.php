<?php
require("connect-db.php");      // include("connect-db.php");
require("book-db.php");
require("account-db.php");

$list_of_books = getAllBooks();
$user_id = getUserID($_COOKIE['user'], $_COOKIE['hash']);
$book_to_update = null;  
$book_to_rent = null;    
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='Add') 
  {
      addBook($_POST['title'], $_POST['author'], $_POST['genre'], $_POST['avg_rating'], $_POST['quantity'], $_POST['in_stock']);
      $list_of_books = getAllBooks();  
  }
  else if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='Update')
  {
      $book_to_update = getBookByTitleAuthor($_POST['book_title_to_update'], $_POST['book_author_to_update']);
  }
  else if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='Delete') 
  {
      deleteBook($_POST['book_title_to_delete'], $_POST['book_author_to_delete']);
      $list_of_books = getAllBooks();
  }
  else if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='Rent')
  {
      $book_to_rent = getBookByTitleAuthor($_POST['book_title_to_rent'], $_POST['book_author_to_rent']);
  }
  if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='Confirm update')
  {
    updateBook($_POST['book_title_update'], $_POST['book_author_update'], $_POST['genre'], $_POST['book_rating_update'], $_POST['quantity'], $_POST['in_stock']);
    $list_of_books = getAllBooks();
  } 
  else if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='Rate') 
  {
      addRating($_POST['book_title_rate'], $_POST['book_author_rate'], $user_id['user_id']);
      addRatingDetail($user_id['user_id'], $_POST['book_title_rate'], $_POST['book_author_rate'], $_POST['stars']);
      $list_of_books = getAllBooks();
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
  <title>Book Catalogue</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="icon" type="image/png" href="./icon/favicon-32x32.png" />
</head>

<body>
<?php include('header.php') ?> 


<div class="container">
<h1>Book Catalogue</h1> 
<div>
    <form action="book-insert-form.php"> <br/>
    Admin Actions: &ensp;
        <button type="submit" class="btn btn-info" title="Admin: add a new book to the database">Add a Book</button>
    </form>                   
</div>
<br/>


<div class="row justify-content-center">  
<table class="w3-table w3-bordered w3-card-4 center" style="width:100%">
  <thead>
  <tr style="background-color:#B0B0B0">
    <th width="15%"><b>Title</b></th>
    <th width="15%"><b>Author</b></th>        
    <th width="15%"><b>Genre</b></th> 
    <th width="15%"><b>Average Rating</b></th>
    <th width="15%"><b>Quantity</b></th>
    <th width="15%"><b>In Stock?</b></th>
    <th><b>Update?</b></th>
    <th><b>Delete?</b></th>
    <th><b>Rate?</b></th>
    <th><b>Rent?</b></th>
  </tr>
  </thead>
<?php foreach ($list_of_books as $book_info): ?>
  <tr>
     <td><?php echo $book_info['title']; ?></td>
     <td><?php echo $book_info['author']; ?></td>        
     <td><?php echo $book_info['genre']; ?></td> 
     <td><?php echo $book_info['avg_rating']; ?></td>
     <td><?php echo $book_info['quantity']; ?></td>
     <td><?php if ($book_info['in_stock']==0) {echo "No";} else {echo "Yes";} ?></td>
     <td>
        <form action="book-update-form.php" method="post">
          <input type="submit" value="Update" name="btnAction" class="btn btn-primary" 
                title="Click to update this book" />
          <input type="hidden" name="book_title_to_update" 
                value="<?php echo $book_info['title']; ?>" />
          <input type="hidden" name="book_author_to_update" 
                value="<?php echo $book_info['author']; ?>" />                 
        </form>
     </td>
     <td>
        <form action="book-catalogue.php" method="post" onclick="return confirm('Are you sure you want to delete this book?');">
          <input type="submit" value="Delete" name="btnAction" class="btn btn-danger" 
                title="Click to remove this book from the database" />
          <input type="hidden" name="book_title_to_delete" 
                value="<?php echo $book_info['title']; ?>" />
          <input type="hidden" name="book_author_to_delete" 
                value="<?php echo $book_info['author']; ?>" />                   
        </form>
     </td>
     <td>
        <form action="rating-form.php" method="post">
          <input type="submit" value="Rate" name="btnAction" class="btn btn-warning" 
                title="Click to rate this book" />
          <input type="hidden" name="book_title_to_rate" 
                value="<?php echo $book_info['title']; ?>" />
          <input type="hidden" name="book_author_to_rate" 
                value="<?php echo $book_info['author']; ?>" />                 
        </form>
     </td>
     <td>
        <form action="rent-form.php" method="post">
          <input type="submit" value="Rent" name="btnAction" class="btn btn-success" 
                title="Click to rent out this book" />
          <input type="hidden" name="book_title_to_rent" 
                value="<?php echo $book_info['title']; ?>" />
          <input type="hidden" name="book_author_to_rent" 
                value="<?php echo $book_info['author']; ?>" />              
        </form>
     </td>
  </tr>
<?php endforeach; ?>
</table>
</div>   

</div>    

<?php include('footer.html') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>