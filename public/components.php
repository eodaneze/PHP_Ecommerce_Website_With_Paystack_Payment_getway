<?php 
   function components($productname,$productprice,$productimg,$productid){
       $element = "
       <div class=\"col-lg-3 col-sm-6 col-md-4 text-center\">
       <form action=\"index.php\" method=\"post\">
             <div class=\"product-content\">
                   <img src=\"$productimg\" class=\"img-fluid\" alt=\"product-1\">
                   <p>$productname</p>
                   <h5>
                     <small><s class=\"text-secondary\"><i class=\"fa fa-naira-sign\"></i>519</s></small>
                     <span class=\"price\"><i class=\"fa fa-naira-sign\"></i>$productprice</span>
                 </h5>
                 <div class=\"rating\">
                      <i class=\"fa fa-star\"></i>
                      <i class=\"fa fa-star\"></i>
                      <i class=\"fa fa-star\"></i>
                      <i class=\"fa fa-star\"></i>
                      <i class=\"far fa-star\"></i>
                 </div>
                 <button type=\"submit\" name=\"add\" class=\"cart-btn\">Add to Cart <i class=\"fa fa-shopping-cart\"></i></button>
                 <input type=\"hidden\" name=\"product_id\" value=\"$productid\">

             </div>
       </form>
  </div>
       
       ";

       echo $element;
   }


   function cartElement($productimg,$productname,$productprice, $productid){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" method=\"get\" class=\"cart-items\">
    <div class=\"border rounded\">
         <div class=\"row bg-white border mb-4 \">
             <div class=\"col-md-3 p-0\">
                 <img src=$productimg alt=\"Image1\" class=\"img-fluid w-100\">
             </div>
             <div class=\"col-md-6 pb-3\">
                 <h5 class=\"pt-2\">$productname</h5>
                 <small class=\"text-seconadry\">Sellet: Daniel</small>
                 <h5 class=\"pt-2\"><i class=\"fa fa-naira-sign\"></i>$productprice</h5>
                 <button type=\"submit\" class=\"btn text-light fw-bold\" style=\" background-color:#95C41F\" >Save For Later</button>
                 <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\" ><i class=\"fa-solid fa-trash-can\"></i>Remove</button>
             </div>
             <div class=\"col-md-3 py-5\">
                 <div>
                 <button class=\"btn btn-light border\" style=\"border-radius: 50%;\">+</button>
                 <span>1</span>
                 <button class=\"btn btn-light border\" style=\"border-radius: 50%;\">-</button>
                 </div>
             </div>
         </div>
    </div>
</form>
    ";

    echo $element;
 }

   ?>

  
