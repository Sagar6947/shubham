<?php

//fetch_cart.php

session_start();

$total_price = 0;
$total_item = 0;

$output = '
<div class=" "  >
 
';
if(!empty($_SESSION["shopping_cart"]))
{
  foreach($_SESSION["shopping_cart"] as $keys => $values)
  {
    $output .= '<div class="single-cart-product">
              <span class="cart-close-icon">
                <a href="#" class="delete" id="'. $values["product_id"].'"><i class="ti-close"></i></a>
              </span>
              <div class="image">
                <a href="#">
                  <img src="admin/images/newservice/'.$values["product_image"].'" class="img-fluid" alt="">
                </a>
              </div>

              <div class="content">
                <h5><a href="#">'.$values["product_name"].'</a></h5>
                <h6><span class="cart-count">'.$values["product_quantity"].' x </span> <span class="discounted-price">'.$values["product_price"].'</span></h6>
                
              </div>
            </div>
';

            $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
            $total_item = $total_item + 1;
  }
          
           $output .= '
          <h5 class="cart-subtotal">
            <span class="subtotal-title">Subtotal:</span>
            <span class="subtotal-amount">₹ '.number_format($total_price, 2).'</span>
          </h5> ';
}
else
{
  $output .= '
  
       <tr>
      <td colspan="5" align="center">
          <h5> Your Cart is Empty!</h5>
      </td>
    </tr>
    ';
}
$output .= ' </div>';
$data = array(
  'cart_details'    =>  $output,
  'total_price'   =>  '₹' . number_format($total_price, 2),
  'total_item'    =>  $total_item
);  

echo json_encode($data);


?>