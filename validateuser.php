<script language="JavaScript" type="text/JavaScript">
    function updateUser(username){
    var ajaxUser = document.getElementById("userinfo");
    ajaxUser.innerHTML = "Welcome " + username + "&nbsp;&nbsp;&nbsp;
    <a href="logout.php\">Log Out</a>";
    }
</script>
<?php
include('theme/header.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$connect = mysqli_connect("localhost", "root", "", "shopping") or die("Please, check your server connection.");
$query = "SELECT email_address, password, complete_name FROM customers WHERE
email_address like '" . $_POST['emailaddress'] . "' " .
        "AND password like (PASSWORD('" . $_POST['password'] . "'))";
$result = mysqli_query($connect, $query) or die(mysql_error()); // #3
if (mysqli_num_rows($result) == 1) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        extract($row);
        $_SESSION['emailaddress'] = $_POST['emailaddress'];
        $_SESSION['password'] = $_POST['password'];
        ?>

        <div class="panel panel-success text-center">
            <div class="panel-body">
                <font color="green" size="4">Welcome <?= $complete_name; ?> to our Shopping Mall</font>
            </div>
            <div class="panel-footer">
                <a href="index.php" class="btn btn-primary">กลับสู่หน้าแรก</a>
            </div>
        </div>
        <script language="JavaScript">updateUser('<?= $complete_name; ?>');</script>
        <?php
    }
} else { ?>
        <div class="panel panel-success text-center">
            <div class="panel-body">
                <font color="red" size="4">Invalid Email address and/or Password<br>Not registered?</font><br><br><br>
                <a href="validatesignup.php" class="btn btn-primary">Register</a>
                <a href="signin.php" class="btn btn-success">Login</a>
            </div>
        </div>
    <?php
}
include('theme/footer.php');
?>