<?php 
     session_start();
   require('./components.php');
   require('../includes/CreateDb.php');


  //  creating an instance of CreateDb class
  $database = new CreateDb(dbname: 'product_cart_db', tablename:'product_cart_table');

 if(isset($_POST['add'])){
    // print_r($_POST['product_id']);


    if(isset($_SESSION['cart'])){
       $item_array_id = array_column($_SESSION['cart'], "product_id");
       print_r($item_array_id);

       if(in_array($_POST['product_id'], $item_array_id)){
           header("location:index.php?error=Item has been added to cart already");
          
       }else{
          $count = count($_SESSION['cart']);
          $item_array = array(
            'product_id' => $_POST['product_id']
         );
         $_SESSION['cart'][$count] = $item_array;
          header("location:index.php?success=Item has been successfully added to cart");
        

       }
    }else{
       $item_array = array(
          'product_id' => $_POST['product_id']
       );
       $_SESSION['cart'][0] = $item_array;
      //  print_r($_SESSION['cart']);
    }
 }

?>

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

<body style="background-color: #f0f0f0;">
<?php
      if(isset($_GET['error'])){
          ?>

    <div class="container alert alert-danger text-center"><?= $_GET['error'] ?></div>

    <?php
      }elseif(isset($_GET['success'])){
        ?>

        <div class="container alert alert-success text-center"><?= $_GET['success'] ?></div>
    
        <?php
      }


   ?>
    <?php 
       include_once('./hero.php')
    ?>

    
    <div class="container">

        <div class="row bg-white py-5 shadow border">
            <?php  
                            // components(productname:"2022 Mens casual Board Shoes Running Sneakers-Black", productprice:599, productimg:"../img/sheo.jpg");
                            // components(productname:"2022 Mens casual Air-Cushion Shoes Running Sneakers - White", productprice:599, productimg:"../img/shoe-2.jpg");
                            // components(productname:"Darling Mens Casual Classic Shoes - Board Sneakers-white", productprice:599, productimg:"../img/shoe-3.jpg");
                            // components(productname:"2022 Mens casual Air-Cushion Shoes Running Sneakers - White", productprice:599, productimg:"../img/shoe-5.jpg");


                            $result =$database->getData();

                            while($row = mysqli_fetch_assoc($result)){
                              components($row['product_name'], $row['product_price'], $row['product_image'],$row['id']);
                            }
              
              ?>
        </div>
    </div>

    <?php 
    include_once('contact.php');
  ?>

    <a href="#" class="to-top">
        <i class="fa fa-chevron-up"></i>
    </a>
    <script src="../dist/js/bootstrap.min.js"></script>

    <script src="../js/index.js"></script>
</body>

</html>