<?php
  session_start();
  require('../includes/CreateDb.php');
  require('./header.php');
  require('./components.php');
  $db = new CreateDb(dbname: 'product_cart_db', tablename:'product_cart_table');


  if(isset($_POST['remove'])){
    //    print_r($_GET['id']);

    if($_GET['action'] == 'remove'){
         foreach($_SESSION['cart'] as $key => $value){
             if($value['product_id'] == $_GET['id']){
                 unset($_SESSION['cart'][$key]);
                 echo "<script>alert('product has been removed successfully')</script>";
                 echo "<script>window.location = 'cart.php'</script>";
             }
         }
    }
  }

 

?>
<div class="container pt-5">
      <div class="row px-5">
          <div class="col-md-7">
               <div class="shopping-cart">
                  
                   <h6>MyCart</h6>
                   <hr>
                
                    <?php 
                        $total = 0;

                       if(isset($_SESSION['cart'])){
                             $product_id = array_column($_SESSION['cart'], 'product_id');

                             $result =$db->getData();

                             while($row = mysqli_fetch_assoc($result)){
                                  foreach($product_id as $id){
                                       if($row['id'] == $id){
                                            cartElement($row['product_image'], $row['product_name'], $row['product_price'], $row['id']);
                                            $total = $total + $row['product_price'];
                                       }
                                  }
                             }
                       }else{
                           header('location:cart.php?error=empty');
                       }

                   ?>

               </div>
                
          </div>
          <div class="col-md-4 offset-md-1 border-rounded mt-5 bg-white h-25">
               <div class="pt-4">
                    <h6>PRICE DETAILS</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                           <?php 
                                if(isset($_SESSION['cart'])){
                                     $count = count($_SESSION['cart']);
                                     echo "<h6>Price($count Items)</h6>";
                                }

                            ?>
                          
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6><i class="fa fa-naira-sign"></i>
                               <?php
                                   echo $total
                               ?>
                            </h6>
                            <h6  style="color: #95C41F;">FREE</h6>
                            <hr>
                            <h6>
                                <i class="fa fa-naira-sign"></i>
                                <?php
                                   echo $total
                               ?>
                            </h6>
                        </div>

                        <div class="check-out text-center w-100 mt-2 mb-2">
                        <button type="button" class="btn text-white" style="background-color: #95C41F;" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"> <i class="fa fa-credit-card"></i>  Preceed To Checkout</button>
                        </div>
                    </div>
               </div>
             
          </div>
      </div>
  </div>



  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fill Your Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <div class="mb-3 row">
                        <label for="inputPassword" name='name' class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" name='name' class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" name='name' class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" class="form-control" id="phone" required>
                        </div>
                    </div>

                   <div class="text-center">
                   <button onclick="paywithpaystack()" class="btn text-white" style="background-color: #95C41F;"> <i class="fa fa-credit-card"></i>Check Out</button>
                   </div>
                </div>
                
            </div>
        </div>
    </div> 
    
    

    <script>
	function paywithpaystack(){
        // e.preventDefault()
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
		const api = 'pk_live_a6295584cc22efec6535ea80d589b4441d1b0402';
        
		var handler = PaystackPop.setup({
			key: api,
			email: email,
			amount: <?php echo $total*100; ?>,
			currency: "NGN",
			ref: ''+Math.floor((Math.random() * 1000000000) + 1),
			firstname: name,
			metadata: {
				custom_fields: [
					{
						display_name: name,
						variable_name: name,
						value: phone,
					}
				]
			},
			callback: function(response){
				const referenced = response.reference;
                console.log(response);
				window.location.href='success.php?successfullypaid='+referenced;


			},
			onClose: function(){
				alert('window closed');
                // window.location.href='cancel.php'
			}
		});
		handler.openIframe();
	}
</script>


<script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="../dist/js/bootstrap.js"></script>




    






	