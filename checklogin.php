<?php
include('theme/header.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$cartamount = 0;
$cartamount = $_POST['cartamount'];
$_SESSION['cartamount'] = $cartamount;
if (isset($_SESSION['emailaddress'])) {
    $email_address = $_SESSION['emailaddress'];
}
if (isset($_SESSION['password'])) {
    $password = $_SESSION['password'];
}
if ((isset($_SESSION['emailaddress']) && $_SESSION['emailaddress'] != "") ||
        (isset($_SESSION['password']) && $_SESSION['password'] != "")) {
    $sess = session_id();
    $query = "select * from cart where cart_sess = '$sess'";
    $result = mysqli_query($connect, $query) or die(mysql_error());
    if (mysqli_num_rows($result) >= 1) {
        ?>
        <div class="panel panel-success text-center">
            <div class="panel-body">
                <font color="green" size="4">Welcome <?= $email_address; ?></font><br><br>
                <p>
                    If you have finished Shopping <a href=shipping_info.php>Click Here</a> to supply ShippingInformation<br>
                    Or You can do more purchasing by selecting items from the menu.
                </p>
            </div>
        </div>
    <?php } else { ?>
        <div class="panel panel-success text-center">
            <div class="panel-body">
                <font color="red" size="4">"You can do purchasing by selecting items from the menu on left side</font>
            </div>
        </div>
        <?php
    }
} else {
    ?>
    <div class="panel panel-success text-center">
        <div class="panel-body">
            <font color="red" size="4">Not Logged in yet</font>
            <p>
                You are currently not logged into our system.<br>
                You can do purchasing only if you are logged in.<br>
                If you have already registered
            </p>
        </div>
        <div class="panel-footer">
            <a href="signin.php" class="btn btn-success">Login</a>
            <a href="validatesignup.php" class="btn btn-primary">Register</a>
        </div>
    </div>
    <?php
}
include('theme/footer.php');
?>