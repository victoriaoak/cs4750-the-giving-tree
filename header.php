<head>
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="your name">
  <meta name="description" content="include some description about your page">      
  <title>The Giving Tree</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="icon" type="image/png" href="icon/favicon-32x32.png" />


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<header>  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/" style="padding:15px;">
      <div class="logo-image" href="homepage.php">
            <img src="icon\android-chrome-192x192.png" class="img-fluid" width="50" height="50">
      </div>
    </a>
      <a class="navbar-brand" href="homepage.php" style="font-size:150%">The Giving Tree</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="book-catalogue-admin.php" style="font-size:115%">Book Database</a>
          </li>
        </ul>

        <form class="ms-auto" action="book-search.php">
          <button class = "btn search-btn">
            <i class="bi bi-search" style = "color:darkgray; font-size: 125%; padding-right: 10px;"></i>
          </button>
        </form>

        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
              <?php if (isset($_COOKIE['user']) && isset($_COOKIE['hash'])) {?> 
                <a class="nav-link" href="submit-request.php">Submit a Request</a> <?php }?>
          </li>
          <li class="nav-item">
              <?php if (isset($_COOKIE['user']) && isset($_COOKIE['hash'])) {?> <a class="nav-link" href="accountInfo.php">Account Information</a> <?php }?>
          </li>
          <li class="nav-item" style = "padding-right: 20px;">
              <?php if (isset($_COOKIE['user']) && isset($_COOKIE['hash'])) {?> <a class="nav-link" href="logout.php">Log Out</a> <?php }?>
              <?php if (!isset($_COOKIE['user']) && !isset($_COOKIE['hash'])) {?> <a class="nav-link" href="login.php">Log In</a> <?php }?>
          </li>
        </ul>

      </div>
    </nav>
  </header>
