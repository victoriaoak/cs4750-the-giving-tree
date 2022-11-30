<?php
require("connect-db.php");      // include("connect-db.php");
require("account-db.php");
require("book-db.php");

$book_to_rate = null;      
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='Rate')
    {
        $book_to_rate = getBookByTitleAuthor($_POST['book_title_to_rate'], $_POST['book_author_to_rate']);
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
  <title>Update a Book</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="icon" type="image/png" href="./icon/favicon-32x32.png" />
</head>

<body>
<?php include('header.php') ?> 


<div class="container">
  <h1>Rate a Book</h1>  

<form name="mainForm" action="book-catalogue.php" method="post">   
  <div class="row mb-3 mx-3">
    Title:
    <input type="text" class="form-control" name="title" disabled 
          value="<?php if ($book_to_rate!=null) echo $book_to_rate['title'] ?>"
    />   
    <input type="hidden" name="book_title_rate" 
                value="<?php echo $book_to_rate['title']; ?>" />         
  </div>  
  <div class="row mb-3 mx-3">
    Author:
    <input type="text" class="form-control" name="author" disabled 
    value="<?php if ($book_to_rate!=null) echo $book_to_rate['author'] ?>"
    /> 
    <input type="hidden" name="book_author_rate" 
                value="<?php echo $book_to_rate['author']; ?>" />           
  </div>
  <div class="row mb-3 mx-3">
    Rating:
    <input type="number" max="5" min="0" step="0.01" class="form-control" name="stars" /> 
  <div>
</br>
    <input type="submit" value="Rate" name="btnAction" class="btn btn-primary" 
           title="Rate this book" />            
  </div>  

</form>   

</div>    

<?php include('footer.html') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>