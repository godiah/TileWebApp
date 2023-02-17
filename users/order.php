<!-- Connect to dB -->
<?php 
include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start();

//Accessing User ID
if(isset($_GET['user_id'])){
    $id = $_GET['user_id'];
}

//Total Items & Price
$ip = getIPAddress();
$total_price = 0;
$invoice_no = mt_rand();
$status = 'pending';
$cart_price = "Select * from `cart_details` where ip_address = '$ip'";
$result_price = mysqli_query($con,$cart_price);
$product_count = mysqli_num_rows($result_price);
while($row_price=mysqli_fetch_array($result_price)){
    $product_id = $row_price['product_id'];
    $select_product = "Select * from `tileproducts` where product_id = $product_id";
    $run_price = mysqli_query($con,$select_product);
    while($row_product_price=mysqli_fetch_array($run_price)){
        $product_price = array($row_product_price['price']);
        $product_values = array_sum($product_price);
        $total_price += $product_values;
    }
}

//Accessing Quantity from Cart
$get_cart = "Select * from `cart_details`";
$run_cart = mysqli_query($con,$get_cart);
$get_item_qty = mysqli_fetch_array($run_cart);
$qty = $get_item_qty['quantity'];
if($qty==0){
    $qty = 1;
    $subtotal = $total_price;
}else{
    $qty = $qty;
    $subtotal = $total_price*$qty;
}
$insert_orders = "Insert into `users_orders` (user_id,amount_due,invoice_number,total_products,
order_date,order_status) values ($id,$subtotal,$invoice_no,$product_count,NOW(),'$status')";
$result=mysqli_query($con,$insert_orders);
if($result){
    echo "<script>alert('Order Submitted')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}

//Pending Orders
$insert_pending_orders = "Insert into `orders_pending` (user_id,invoice_number,product_id,
quantity,order_status) values ($id,$invoice_no,$product_id,$qty,'$status')";
$result_pending_orders=mysqli_query($con,$insert_pending_orders);

//Empty Cart Items
$empty_cart ="Delete from `cart_details` where ip_address = '$ip'";
$delete=mysqli_query($con,$empty_cart);
?>
