
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Document</title>
</head>



<nav class="navbar navbar-expand-lg  container shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php">SHOE <span>STORE</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active home" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#">Account</a>
        </li>
        <li class="nav-item">
          <a href="cart.php" class="nav-link text-dark">
              <i class="fa fa-shopping-cart" style="color:#95C41F;"></i>Cart
              <!-- <span id="cart_count" class="bg-light border" style="padding: 0 0.9rem 0.1rem 0.9rem; border-radius:3rem; color:#95C41F;">0</span> -->

              <?php
                  if(isset($_SESSION['cart'])){
                    $count = count($_SESSION['cart']);
                    echo "
                    <span id=\"cart_count\" class=\"bg-light border\" style=\"padding: 0 0.9rem 0.1rem 0.9rem; border-radius:3rem; color:#95C41F;\">$count</span>
                    ";
                  }else{
                     echo "
                     <span id=\"cart_count\" class=\"bg-light border\" style=\"padding: 0 0.9rem 0.1rem 0.9rem; border-radius:3rem; color:#95C41F;\">0</span>
                     ";
                  }

               ?>
          
        </a>
        </li>
       
      </ul>
      
    </div>
  </div>
</nav>
<body>