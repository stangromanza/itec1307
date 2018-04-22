<?php
include('theme/header.php');
$connect = mysqli_connect("localhost", "root", "", "shopping") or
die("Please, check your server connection.");
$query = "SELECT item_code, item_name, description, imagename, price FROM
products";
$results = mysqli_query($connect, $query) or die(mysql_error());
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
    extract($row);
    ?>
    <div class="col-lg-4">
        <a href="itemdetails.php?itemcode=<?php echo $item_code; ?>">
            <div class="panel panel-default text-center">
                <div class="panel-body">
                    <img class="bottom" src="<?php echo $imagename; ?>" style="max-width:300px;max-height:200px;width:auto; height:auto;" />
                </div>
                <div class="panel-body">
                    <font size="4"> <?php echo cut_text($item_name, 25); ?></font><br>
                    <font size="4" color="red">$ <?php echo $price; ?></font>
                </div>
            </div>
        </a>
    </div>
<?php }
include('theme/footer.php');
?>