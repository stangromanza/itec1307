<?php
if (!isset($totalamount)) {
    $totalamount = 0;
}
$totalquantity = 0;
if (!session_id()) {
    session_start();
}
$connect = mysqli_connect("localhost", "root", "", "shopping") or die("Please, check your server connection.");
$sessid = session_id();
$query = "SELECT * FROM cart WHERE cart_sess = '$sessid'";
$results = mysqli_query($connect, $query) or die(mysql_query());
if (mysqli_num_rows($results) == 0) {
    ?>
    <div class="panel panel-default text-center">
        <div class="panel-body">
            <font color="red" size="4">Your Cart is empty</font>
        </div>
    </div>
<?php } else { ?>
    <div class="table-responsive">
        <table id="dataTables" class="table table-striped table-bordered">
            <thead id="dt27">
                <tr>
                    <th style="text-align:center;">Item Code</th>
                    <th style="text-align:center;">Quantity</th>
                    <th style="text-align:center;">Item Name</th>
                    <th style="text-align:center;">Price</th>
                    <th style="text-align:center;">Total Price</th>
                    <th style="text-align:center;"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                    extract($row);
                    ?>
                    <tr>
                        <td class="text-center"><?= $cart_itemcode; ?></td>
                <form method="POST" action="cart.php?action=change&icode=<?= $cart_itemcode ?>">
                    <td class="text-center"><input type="text" name="modified_quantity" size="2" value="<?= $cart_quantity ?>"></td>
                    <td class="text-center"><?= $cart_item_name; ?></td>
                    <td class="text-center"><?= $cart_price; ?></td>
                    <td class="text-center">
                        <?php
                        $totalquantity = $totalquantity + $cart_quantity;
                        $totalprice = number_format($cart_price * $cart_quantity, 2);
                        $totalamount = $totalamount + ($cart_price * $cart_quantity);

                        echo $totalprice;
                        ?>
                    </td>
                    <td>
                    <input type="submit" name="Submit" value="Change quantity"></form>
                </form>
                <form method="POST" action="cart.php?action=delete&icode=<?= $cart_itemcode; ?>">
                    <input type="submit" name="Submit" value="Delete Item">
                </form>
                </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="8" class="text-center">
                    <h4>You currently have <?= $totalquantity; ?> product(s) selected in your cart</h4>
                </td>
            </tr>
            <tr>
                <td colspan="8" style="text-align: right;">
                    <?php
                    $totalamount = number_format($totalamount, 2);
                    ?>
                    <h4>Total $<?= $totalamount ?></h4>
                </td>
            </tr>
            <tr>
                <td colspan="8" style="text-align: right;">
                    <form method="POST" action="cart.php?action=empty">
                        <button type="submit" class="btn btn-danger">Empty Cart</button>
                    </form>
                    <form method="POST" action="checklogin.php">
                        <input id="cartamount" name="cartamount" type="hidden" value= "<?php echo $totalamount; ?>">
                        <button type="submit" class="btn btn-primary">Checkout</button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <?php
}
?>
</body>
</html>