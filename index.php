<?php
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
   case '/':                   // URL (without file name) to a default screen
      require 'homepage.php';
      break; 
   case '/homepage.php':     // if you plan to also allow a URL with the file name 
      require 'homepage.php';
      break;              
   case '/book-catalogue.php':
      require 'book-catalogue.php';
      break;
    case '/book-catalogue-admin.php':
        require 'book-catalogue-admin.php';
        break;
    case '/book-insert-form.php':
        require 'book-insert-form.php';
        break;
    case '/book-update-form.php':
        require 'book-update-form.php';
        break;
    case '/book-search.php':
        require 'book-search.php';
        break;
    case '/login.php':
        require 'login.php';
        break;
    case '/logout.php':
        require 'book-catalogue.php';
        break;
    case '/accountInfo.php':
        require 'accountInfo.php';
        break;
    case '/createAccount.php':
        require 'createAccount.php';
        break;
    case '/rent-form.php':
        require 'rent-form.php';
        break;
    case '/submit-request.php':
        require 'submit-request.php';
        break;
    case '/account-db.php':
        require 'account-db.php';
        break;
    case '/book-db.php':
        require 'book-db.php';
        break;
    case '/connect-db.php':
        require 'connect-db.php';
        break;
    case '/header.php':
        require 'header.php';
        break;
    case '/request-db.php':
        require 'request-db.php';
        break;
    default:
      http_response_code(404);
      exit('Not Found');
}  
?>