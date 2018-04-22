<?php
$title = "ขอบคุณที่สั่งซื้อ Thank You.";
include('theme/header.php');
require_once dirname(__FILE__) . '/omise-php/lib/Omise.php';

define('OMISE_API_VERSION', '2017-11-02');
define('OMISE_PUBLIC_KEY', 'pkey_test_59h5zegwaso33nhfm7m');
define('OMISE_SECRET_KEY', 'skey_test_59h5zegwuft2mxq8jxu');

$complete_name = $_SESSION['complete_name'];
$address1 = $_SESSION['address1'];
$city = $_SESSION['city'];
$state = $_SESSION['state'];
$zipcode = $_SESSION['zipcode'];
$country = $_SESSION['country'];
$shipping_address_line1 = $_SESSION['shipping_address_line1'];
$shipping_address_line2 = $_SESSION['shipping_address_line2'];
$shipping_city = $_SESSION['shipping_city'];
$shipping_state = $_SESSION['shipping_state'];
$shipping_country = $_SESSION['shipping_country'];
$shipping_zipcode = $_SESSION['shipping_zipcode'];
$phone_no = $_SESSION['phone_no'];
$email_address = $_SESSION['emailaddress'];
$cartamount = $_SESSION['cartamount'];
$today = date("Y-m-d");
$sessid = session_id();
$sql = "INSERT INTO orders (order_date, email_address,shipping_address_line1, shipping_address_line2, shipping_city, shipping_state,shipping_country, shipping_zipcode)
        VALUES ('$today','$email_address','$shipping_address_line1','$shipping_address_line2', '$shipping_city','$shipping_state','$shipping_country','$shipping_zipcode')";
$result = mysqli_query($connect, $sql) or die(mysql_error());
$orderid = mysqli_insert_id($connect);

$charge = OmiseCharge::create(array(
            'order' => $orderid,
            'description' => "Order : " . $orderid,
            'amount' => number_format($cartamount, 2, '', '.'),
            'currency' => 'usd',
            'card' => $_POST["omiseToken"]
        ));

if ($charge['status'] == 'successful') {
    ?>
    <div class="panel panel-success text-center">
        <div class="panel-body">
            <font color="green" size="4">Thanks for your Order!</font>
            <font color="green" size="4">Please, remember your Order number is <?= $orderid; ?></font>
        </div>
    </div>
    <?php
    $query = "SELECT * FROM cart WHERE cart_sess='$sessid'";
    $results = mysqli_query($connect, $query) or die(mysql_error());
    $totalamount = 0;
    while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        extract($row);

        $totalamount = $totalamount + ($cart_price * $cart_quantity);

        $Str_itemname = mysqli_real_escape_string($connect, $cart_item_name);
        $Str_quantity = mysqli_real_escape_string($connect, $cart_quantity);

        $sql2 = "INSERT INTO orders_details (order_no, item_code, item_name,quantity, price)
            VALUES ('$orderid','$cart_itemcode','$Str_itemname','$Str_quantity','$cart_price')";
        $insert = mysqli_query($connect, $sql2) or die(mysql_error());
    }

    $payment_type = $charge['card']['brand'];
    $name_on_card = $charge['card']['name'];
    $card_number = $charge['card']['last_digits'];
    $expiration_date = $charge['card']['expiration_month'] . "/" . $charge['card']['expiration_year'];
    $date = date("Y-m-d");

    $sql3 = "INSERT INTO payment_details (order_no, order_date ,amount_paid , email_address,customer_name, payment_type, name_on_card, card_number, expiration_date)
        VALUES ('$orderid','$date','$totalamount','$email_address','$complete_name','$payment_type','$name_on_card','$card_number','$expiration_date')";
    $insertpayment = mysqli_query($connect, $sql3) or die(mysql_error());
    $query = "DELETE FROM cart WHERE cart_sess='$sessid'";
    $delete = mysqli_query($connect, $query) or die(mysql_error());
    session_destroy();
} else {
    echo 'Fail';
}

include('theme/footer.php');
?>