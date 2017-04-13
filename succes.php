<?php
//Database credentials
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'lms_course-booking';

//Connect with the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

session_start();
/*$item_no            = $_GET['item_number'];
$item_transaction   = $_GET['tx']; // Paypal transaction ID
$item_price         = $_GET['amt']; // Paypal received amount
$item_currency      = $_GET['cc']; // Paypal received currency type
 
$price = '25.00';
$totalPrice= $price * $_GET['quantity'];
$currency='USD';
 
//Rechecking the product price and currency details
if($item_price==$totalPrice && $item_currency==$currency)
{
    echo "<h1>Welcome, Guest</h1>";
    echo "<h1>Payment Successful</h1>";
}
else
{
    echo "<h1>Payment Failed</h1>";
}*/

$item_number = $_GET['item_number']; 
$txn_id = $_GET['tx'];
$payment_gross = $_GET['amt'];
$currency_code = $_GET['cc'];
$payment_status = $_GET['st'];
//$quant= $_SESSION['quantity-pay'];
//Get product price from database
$productResult = $db->query("SELECT price FROM courses WHERE course_id = ".$item_number);
$productRow = $productResult->fetch_assoc();
$productPrice = $productRow['price'];

if(!empty($txn_id) && $payment_gross >= $productPrice ){
    //Check if payment data exists with the same TXN ID.
    $prevPaymentResult = $db->query("SELECT payment_id FROM payments WHERE txn_id = '".$txn_id."'");

    if($prevPaymentResult->num_rows > 0){
        $paymentRow = $prevPaymentResult->fetch_assoc();
        $last_insert_id = $paymentRow['payment_id'];
    }else{
     //   Insert tansaction data into the database
        $insert = $db->query("INSERT INTO payments(item_number,txn_id,payment_gross,currency_code,payment_status) VALUES('".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','".$payment_status."')");
        $last_insert_id = $db->insert_id;
    }
?>
    <h1>Your payment has been successful.</h1> 
    <h1>Your Payment ID - <?php echo $last_insert_id; ?></h1>
<?php

} 

else{


} 

    
