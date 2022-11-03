<?php
require("connect-db.php");      // include("connect-db.php");
require("book-db.php");

$list_of_books = getAllBooks();
$book_to_update = null;      
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
  if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='Confirm update')
  {
    updateBook($_POST['title'], $_POST['author'], $_POST['genre'], $_POST['avg_rating'], $_POST['quantity'], $_POST['in_stock']);
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
  <link rel="icon" type="image/png" href="http://www.cs.virginia.edu/~up3f/cs4750/images/db-icon.png" />
</head>

<body>
<?php include('header.html') ?> 


<div class="container">
<h1>Book Catalogue</h1> 
<div>
    <form action="book-info-form.php"> <br/>
    Admin Actions: &ensp;
        <button type="submit" class="btn btn-info" title="Admin: add a new book to the database">Add a Book</button>
    </form>                   
</div>
<br/>

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
    <th><b>Checkout?</b></th>
  </tr>
  </thead>
<?php foreach ($list_of_books as $book_info): ?>
  <tr>
     <td><?php echo $book_info['title']; ?></td>
     <td><?php echo $book_info['author']; ?></td>        
     <td><?php echo $book_info['genre']; ?></td> 
     <td><?php echo $book_info['avg_rating']; ?></td>
     <td><?php echo $book_info['quantity']; ?></td>
     <td><?php echo $book_info['in_stock']; ?></td>                     
     <td>
        <form action="book-catalogue.php" method="post">
          <input type="submit" value="Update" name="btnAction" class="btn btn-primary" 
                title="Click to update this book" />
          <input type="hidden" name="book_title_to_update" 
                value="<?php echo $book_info['title']; ?>" />
          <input type="hidden" name="book_author_to_update" 
                value="<?php echo $book_info['author']; ?>" />                 
        </form>
     </td>
     <td>
        <form action="book-catalogue.php" method="post">
          <input type="submit" value="Delete" name="btnAction" class="btn btn-danger" 
                title="Click to remove this book from the database" />
          <input type="hidden" name="book_title_to_delete" 
                value="<?php echo $book_info['title']; ?>" />
          <input type="hidden" name="book_author_to_delete" 
                value="<?php echo $book_info['author']; ?>" />                   
        </form>
     </td>
     <td>
        <form action="book-catalogue.php" method="post">
          <input type="submit" value="Checkout" name="btnAction" class="btn btn-success" 
                title="Click to rent out this book" />
          <input type="hidden" name="book_to_rent" 
                value="<?php echo $book_info['title'], $book_info['author']; ?>" />                
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