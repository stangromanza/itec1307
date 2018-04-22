<?php
include('theme/header.php');

$email_address = $_POST['emailaddress'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$completename = $_POST['complete_name'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$zipcode = $_POST['zipcode'];
$phone_no = $_POST['phone_no'];

$query = "SELECT email_address FROM customers WHERE email_address = '" . $email_address . "'";
$result = mysqli_query($connect, $query) or die(mysql_error()); // #3
if (mysqli_num_rows($result) == 1) {
    ?>
    <div class="panel panel-warning text-center">
        <div class="panel-body">
            <font color="red" size="4">คุณได้สมัครสมาชิกไปแล้ว</font>
        </div>
        <div class="panel-footer">
            <a href="validatesignup.php" class="btn btn-primary">ย้อนกลับ</a>
        </div>
    </div>
    <?php
} else {
    $sql = "INSERT INTO customers (email_address, password, complete_name,address_line1, address_line2, city, state, zipcode, country, cellphone_no) 
            VALUES ('$email_address',(PASSWORD('$password')), '$completename', '$address1', '$address2','$city', '$state', '$zipcode', '$country', '$phone_no')";
    $result = mysqli_query($connect, $sql) or die(mysql_error());
    if ($result) {
        $_SESSION['emailaddress'] = $email_address;
        ?>
        <div class="panel panel-success text-center">
            <div class="panel-body">
                <font color="green" size="4">Dear, <?php echo $completename; ?> your account is successfully created</font>
            </div>
            <div class="panel-footer">
                <a href="index.php" class="btn btn-primary">กลับสู่หน้าแรก</a>
            </div>
        </div>       
    <?php } else { ?>
        <div class="panel panel-danger text-center">
            <div class="panel-body">
                <font color="red" size="4">Some error occurred. Please use different email address</font>
            </div>
            <div class="panel-footer">
                <a href="validatesignup.php" class="btn btn-primary">ย้อนกลับ</a>
            </div>
        </div>
        <?php
    }
}