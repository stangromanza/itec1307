<?php
$title = "หน้าแรก";
include('theme/header.php');
?>
<div class="col-lg-6">
    <a href="itemlist.php?category=CellPhone">
        <div class="panel panel-default text-center">
            <div class="panel-heading text-center">
                Category Smart Phone
            </div>
            <div class="panel-body">
                <img class="bottom" src="images/AppleiPhone4s.jpg" style="max-width:350px;max-height:350px;width:auto; height:auto;" />
            </div>
        </div>
    </a>
</div>
<div class="col-lg-6">
    <a href="itemlist.php?category=Laptop">
        <div class="panel panel-default text-center">
            <div class="panel-heading text-center">
                Category Laptop
            </div>
            <div class="panel-body">
                <img class="bottom" src="images/DELLINSPIRON3543.jpg" style="max-width:350px;max-height:350px;width:auto; height:auto;" />
            </div>
        </div>
    </a>
</div>
<?php include('theme/footer.php'); ?>