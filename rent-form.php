<?php
require("connect-db.php");      // include("connect-db.php");
require("book-db.php");

$list_of_books = getAllBooks();
// $book_to_update = null;      
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='Rent')
  {
      $book_to_rent = getBookByTitleAuthor($_POST['book_title_to_rent'], $_POST['book_author_to_rent']);
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
  <link rel="icon" type="image/png" href="http://www.cs.virginia.edu/~up3f/cs4750/images/db-icon.png" />
</head>

<body>
<?php include('header.php') ?> 


<div class="container">
  <h1>Rent a Book</h1>  
    <hr>
<form name="mainForm" action="book-catalogue.php" method="post">
  <h3> Book Information </h3>
  <div class="row mb-3 mx-3">
    Title:
    <input type="text" class="form-control" name="title" disabled 
          value="<?php if ($book_to_rent!=null) echo $book_to_rent['title'] ?>"
    />   
    <input type="hidden" name="book_title_update" 
                value="<?php echo $book_to_rent['title']; ?>" />         
  </div>  
  <div class="row mb-3 mx-3">
    Author:
    <input type="text" class="form-control" name="author" disabled 
    value="<?php if ($book_to_rent!=null) echo $book_to_rent['author'] ?>"
    /> 
    <input type="hidden" name="book_author_update" 
                value="<?php echo $book_to_rent['author']; ?>" />           
  </div>
  <div class="row mb-3 mx-3">
    Genre:
    <input type="text" class="form-control" name="genre" disabled
    value="<?php if ($book_to_rent!=null) echo $book_to_rent['genre'] ?>"
    />            
  </div>  
  <div class="row mb-3 mx-3">
    Average Rating:
    <input type="number" max="5" min="0" step="0.01" class="form-control" name="avg_rating" disabled
    value="<?php if ($book_to_rent!=null) echo $book_to_rent['avg_rating'] ?>"
    />
    <input type="hidden" name="book_rating_update" 
                value="<?php echo $book_to_rent['avg_rating']; ?>" />            
  </div>
  <div class="row mb-3 mx-3">
    Quantity:
    <input type="number" min="0" class="form-control" name="quantity" disabled
    value="<?php if ($book_to_rent!=null) echo $book_to_rent['quantity'] ?>"
    />            
  </div>
  <div class="row mb-3 mx-3">
    In Stock:
    <input type="number" max="1" min="0" class="form-control" name="in_stock" disabled
    value="<?php if ($book_to_rent!=null) echo $book_to_rent['in_stock'] ?>"
    />            
  </div>
  <br/>
  <hr>
  <h3> User Information </h3>  
  <br/>
  <hr>
  <h3> Rental Information </h3>    
  <div>
    <input type="submit" value="Confirm rental" name="btnAction" class="btn btn-primary" 
           title="Rent book" />            
  </div>  

</form>   

</div>    

<?php include('footer.html') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>