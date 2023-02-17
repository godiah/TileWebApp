<!-- Connect to dB -->
<?php 
include('../includes/connect.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $select_orders = "Select * from `users_orders` where order_id = $order_id";
    $run_orders = mysqli_query($con,$select_orders);
    $row_fetch = mysqli_fetch_assoc($run_orders);
    $invo = $row_fetch['invoice_number'];
    $amount = $row_fetch['amount_due'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- Bootstrap/CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#FCEDDA">
<div class="container my-3">
    <form action="" method="post">
        <h1 class="text-center">Confirm Payment</h1>
        <div class="form-outline text-center">
            <input type="text" class="form-control w-50 m-auto" name="invoice_no" value="<?php echo $invo ?>">
        </div>
        <div class="form-outline  text-center">
            <label for="" class="text-center">Amount</label>
            <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount ?>">
        </div>
        <div class="form-outline text-center mt-3">
            <select name="payment_mode" id="" class="form-select w-50 m-auto">
                <option value="">Select Payment</option>
                <option value="">Paypal</option>
                <option value="">Visa</option>
                <option value="">MasterCard</option>
                <option value="">Cash On Delivery</option>
                <option value="">Pay Offline</option>
            </select>
        </div>
        <div class="form-outline  text-center mt-3">            
            <input type="submit" class="py-2 px-3 border-0" name="confirm_pymt" value="Confirm Payment"
            style="background-color:#49111c; border-radius: 15px; color:#FCEDDA">
        </div>

    </form>
</div>
    
</body>
</html>