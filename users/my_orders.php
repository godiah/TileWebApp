<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Accessing User ID -->
<?php
$user = $_SESSION['username'];
$get_id = "Select * from `users` where username = '$user'";
$result_id = mysqli_query($con,$get_id);
$row_fetch = mysqli_fetch_assoc($result_id);
$user_id = $row_fetch['user_id'];
?>
    <h3 class="text-center mt-3" style="color:#49111c">My Orders</h3>
    <table class="table table-bordered mt-3">
        <thead style="background-color: #FCEDDA; color:#49111c">
            <tr>
                <th>Serial No.</th>
                <th>Invoice Number</th>                
                <th>Total Products</th>
                <th>Amount Due</th>                
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody">
        <!-- Accessing User Orders -->
        <?php
        $get_orders = "Select * from `users_orders` where user_id = $user_id";
        $result_orders = mysqli_query($con,$get_orders);
        $number =1;
        while($row_orders=mysqli_fetch_assoc($result_orders)){
            $id = $row_orders['order_id'];
            $amount_due = $row_orders['amount_due'];
            $invo_no = $row_orders['invoice_number'];
            $tot_prod = $row_orders['total_products'];
            $order_date = $row_orders['order_date'];
            $order_status = $row_orders['order_status'];
            if($order_status=='pending'){
                $order_status='Incomplete';
            }else{
                $order_status='Complete';
            }            
            echo "
            <tr>
            <td>$number </td>
            <td>$invo_no</td>
            <td>$tot_prod</td>
            <td>Ksh. $amount_due/=</td>
            <td>$order_date</td>
            <td>$order_status</td>
            <td><a href='confirm_payment.php?order_id= $id' class='text-decoration-none'>Confirm</a></td>
        </tr>
            ";
            $number++;
        }
        ?>           
        </tbody>
    </table>

</body>
</html>