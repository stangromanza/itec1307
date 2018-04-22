<?php
$code = $_REQUEST['itemcode'];
$title = $code;
include('theme/header.php');

$query = "SELECT item_code, item_name, description, imagename, price FROM products " . "where item_code like '$code'";
$results = mysqli_query($connect, $query) or die(mysql_error()); // #1
$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
extract($row);
?>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-lg-4 text-center">
                <img src='<?php echo $imagename; ?>' style="max-width:350px;max-height:250px;width:auto;height:auto;"></img>
            </div>
            <div class="col-lg-8">
                <?php
                $itemname = urlencode($item_name);
                $itemprice = $price;
                $itemdescription = $description;
                $pfquery = "SELECT feature1, feature2, feature3, feature4, feature5,feature6 FROM productfeatures " . "where item_code like '$code'"; // #2
                $pfresults = mysqli_query($connect, $pfquery) or die(mysql_error());
                $pfrow = mysqli_fetch_array($pfresults, MYSQLI_ASSOC);
                extract($pfrow);
                ?>
                <font size="4">
                <?php
                echo $item_name . '<br><br>';
                echo $feature1 . '<br>';
                echo $feature2 . '<br>';
                echo $feature3 . '<br>';
                echo $feature4 . '<br>';
                echo $feature5 . '<br>';
                echo $feature6 . '<br>';
                ?>
                </font>
            </div>
            <div class="col-lg-12">
                <form method="POST" action="cart.php?action=add&icode=<?php echo $item_code; ?>&iname=<?php echo $itemname; ?>&iprice=<?php echo $itemprice; ?>">
                    Quantity: <input class="" type="number" name="quantity" size="2" value="1">&nbsp;&nbsp;&nbsp;Price: <?php echo $itemprice; ?>
                    <button name="buynow" type="submit" class="btn btn-success">Buy now</button>
                    <button name="addtocart" type="submit" class="btn btn-success">Add To Cart</button>
                </form>
                <br><br>
                <?php echo $itemdescription; ?>
            </div>
        </div>
    </div>
</div>


<?php
include('theme/footer.php');
?>