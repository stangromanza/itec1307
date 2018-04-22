<?php
include('library/general.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$connect = mysqli_connect("localhost", "root", "", "shopping") or die("Please, check your server connection.");
$sessid = session_id();
$query = "SELECT * FROM cart WHERE cart_sess='$sessid'";
$results = mysqli_query($connect, $query) or die(mysql_error());
$rowcount = mysqli_num_rows($results);
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>IST Online</title>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="css/fontawesome-all.css" rel="stylesheet" type="text/css"/>
   
    <!-- Omise -->
    <script src="https://cdn.omise.co/omise.js"></script>
    <script>
        Omise.setPublicKey("pkey_test_59h5zegwaso33nhfm7m");
    </script>

    <script language="JavaScript" type="text/JavaScript">
        function makeRequestObject(){
        var xmlhttp=false;
        try {
        xmlhttp = new ActiveXObject('Msxml2.XMLHTTP'); // #1
        } catch (e) {
        try {
        xmlhttp = new
        ActiveXObject('Microsoft.XMLHTTP'); // #2
        } catch (E) {
        xmlhttp = false;
        }
        }
        if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest(); // #3
        }
        return xmlhttp;
        }
        function updateCart(){ // #4
        var xmlhttp=makeRequestObject();
        xmlhttp.open('GET', 'countcart.php', true); // #5
        xmlhttp.onreadystatechange = function(){ // #6
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { // #7
        var ajaxCart = document.getElementById("cartcountinfo"); // #8
        ajaxCart.innerHTML = xmlhttp.responseText;
        }
        }
        xmlhttp.send(null);
        }
    </script>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">IST Online</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Electronics
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="allitemslist.php">ALL Item</a></li>
                        <li><a href="itemlist.php?category=CellPhone">Smart Phones</a></li>
                        <li><a href="itemlist.php?category=Laptop">Laptops</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Home & Furniture
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php">Kitchen Essentials</a></li>
                        <li><a href="index.php">Bath Essentials</a></li>
                        <li><a href="index.php">Furniture</a></li>
                        <li><a href="index.php">Dining & Serving</a></li>
                        <li><a href="index.php">Cookware</a></li>
                    </ul>
                </li>
                <li><a href="index.php">Books</a></li>
                <form class="navbar-form navbar-left" method="post" action="searchitems.php">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" name="tosearch">
                    </div>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Submit</button>
                </form>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['emailaddress'])) {
                    ?>
                    <p class="navbar-text">Welcome <?php echo $_SESSION['emailaddress']; ?></p>
                    <li><a href="cart.php" style="color: white;" class="fa fa-2x fa-shopping-cart" aria-hidden="true"><span class="badge" style="background-color: red;"><?php echo $rowcount; ?></span></a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Log Out</a></li>
                <?php } else { ?>
                    <li><a href="validatesignup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <p>