<?php
$title = "ชำระเงินผ่านบัตร";
include 'theme/header.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['cartamount'])) {
    $cartamount = $_SESSION['cartamount'];
}
$complete_name = $_POST['complete_name'];
$address1 = $_POST['address1'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode'];

$country = $_POST['country'];
$shipping_address_line1 = $_POST['shipping_address_line1'];
$shipping_address_line2 = $_POST['shipping_address_line2'];
$shipping_city = $_POST['shipping_city'];
$shipping_state = $_POST['shipping_state'];
$shipping_country = $_POST['shipping_country'];
$shipping_zipcode = $_POST['shipping_zipcode'];
$phone_no = $_POST['phone_no'];
$_SESSION['complete_name'] = $complete_name;
$_SESSION['address1'] = $address1;
$_SESSION['city'] = $city;
$_SESSION['state'] = $state;
$_SESSION['zipcode'] = $zipcode;
$_SESSION['country'] = $country;
$_SESSION['shipping_address_line1'] = $shipping_address_line1;
$_SESSION['shipping_address_line2'] = $shipping_address_line2;
$_SESSION['shipping_city'] = $shipping_city;
$_SESSION['shipping_state'] = $shipping_state;
$_SESSION['shipping_country'] = $shipping_country;
$_SESSION['shipping_zipcode'] = $shipping_zipcode;
$_SESSION['phone_no'] = $phone_no;
?>
<style>
    .checkout-form > button {
        display: inline-block;
        padding: 1em;
        border: 0;
        background-color: #1A53F0;
        color: white;
        outline: none;
        border-radius: 4px;
    }
</style>
<form name="checkoutForm" method="POST" action="placeorder.php">
    <script type="text/javascript" src="https://cdn.omise.co/omise.js"
            data-key="pkey_test_59h5zegwaso33nhfm7m"
            data-image="http://localhost/images/LOGO%20IST.png"
            data-frame-label="IST Online"
            data-button-label="ชำระเงิน"
            data-submit-label="Submit"
            data-location="no"
            data-locale="th"
            data-amount="<?php echo number_format($cartamount, 2, '', '.'); ?>"
            data-currency="usd"
            >
    </script>
</form>
<?php include('theme/footer.php'); ?>