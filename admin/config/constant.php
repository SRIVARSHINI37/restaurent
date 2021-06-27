<?php 
      //start session
      session_start();


      //create constant
      define('SITEURL','http://localhost:8012/food-order/');
      define('LOCALHOST' , 'localhost');
      define('DB_USERNAME', 'root');
      define('DB_PASSWORD', '');
      define('DB_NAME', 'food-order');
  
  
      $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD);
      $db_select = mysqli_select_db($conn,DB_NAME);

?>