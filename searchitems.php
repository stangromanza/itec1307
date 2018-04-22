<?php
include('theme/header.php');
$tosearch = $_POST['tosearch'];

$query = "select * from products where ";
$query_fields = Array();
$sql = "SHOW COLUMNS FROM products"; // #1
$columnlist = mysqli_query($connect, $sql) or die(mysql_error()); // #2
while ($arr = mysqli_fetch_array($columnlist, MYSQLI_ASSOC)) { // #3
    extract($arr);
    $query_fields[] = $Field . " like('%" . $tosearch . "%')";
}

$query .= implode(" OR ", $query_fields);
$results = mysqli_query($connect, $query) or die(mysql_error());
if (mysqli_num_rows($results) > 0) {
    ?>
    <div class="panel panel-success panel-heading">
        <font color="green" size="4">Search >> <?= $tosearch;?></font>
    </div>
    <?php
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
        <?php
    }
} else {
    ?>
    <div class="panel panel-danger text-center">
        <div class="panel-body">
            <font color="red" size="4">ไม่พบสินค้าที่ค้นหา</font>
        </div>
    </div>    
    <?php
}
include('theme/footer.php');
?>