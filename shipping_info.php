<?php
include('theme/header.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['cartamount'])) {
    $cartamount = $_SESSION['cartamount'];
}
$email_address = "";
if (isset($_SESSION['emailaddress'])) {
    $email_address = $_SESSION['emailaddress'];
}
if (isset($_SESSION['password'])) {
    $password = $_SESSION['password'];
}
if ((isset($_SESSION['emailaddress']) && $_SESSION['emailaddress'] != "") ||
        (isset($_SESSION['password']) && $_SESSION['password'] != "")) {
    $query = "SELECT * FROM customers where email_address = '$email_address' and password = (PASSWORD('$password'))";
    $results = mysqli_query($connect, $query) or die(mysql_error());
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
    extract($row);
    ?>
    <form class="form-horizontal" action="purchase.php" method="post">
        <div class="panel panel-success text-center">
            <div class="panel-heading">
                Your information available with us
            </div>
            <div class="panel-body">
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="emailaddress">E-mail Address</label>  
                    <div class="col-md-4">
                        <input class="form-control input-md" type="text" id="emailaddress" name="emailaddress" value="<?php echo $email_address; ?>">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="complete_name">Complete Name</label>  
                    <div class="col-md-4">
                        <input class="form-control input-md" type="text" id="complete_name" name="complete_name" value="<?php echo $complete_name; ?>">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="address1">Address</label>  
                    <div class="col-md-4">
                        <input class="form-control input-md" type="text" id="address1" name="address1" value="<?php echo $address_line1; ?>">
                        <input class="form-control input-md" type="text" id="address2" name="address2" value="<?php echo $address_line2; ?>">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="city">City</label>  
                    <div class="col-md-4">
                        <input class="form-control input-md" type="text" id="city" name="city" value="<?php echo $city; ?>">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="state">State</label>  
                    <div class="col-md-4">
                        <input class="form-control input-md" type="text" id="state" name="state" value="<?php echo $state; ?>">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="country">Country</label>  
                    <div class="col-md-4">
                        <input class="form-control input-md" type="text" id="country" name="country" value="<?php echo $country; ?>">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="zipcode">Zip Code</label>  
                    <div class="col-md-4">
                        <input class="form-control input-md" type="text" id="zipcode" name="zipcode" value="<?php echo $zipcode; ?>">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="phone_no">Phone No</label>  
                    <div class="col-md-4">
                        <input class="form-control input-md" type="text" id="phone_no" name="phone_no" value="<?php echo $cellphone_no; ?>">
                    </div>
                </div>
            </div>
            <div class="panel-heading">
                Please update shipping information if different from the shown below
            </div>
            <div class="panel-body">
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="shipping_address_line1">Address to deliver at</label>  
                    <div class="col-md-4">
                        <input class="form-control input-md" type="text" id="shipping_address_line1" name="shipping_address_line1" value="<?php echo $address_line1; ?>">
                        <input class="form-control input-md" type="text" id="shipping_address_line2" name="shipping_address_line2" value="<?php echo $address_line2; ?>">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="shipping_city">City</label>  
                    <div class="col-md-4">
                        <input class="form-control input-md" type="text" id="shipping_city" name="shipping_city" value="<?php echo $city; ?>">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="shipping_state">State</label>  
                    <div class="col-md-4">
                        <input class="form-control input-md" type="text" id="shipping_state" name="shipping_state" value="<?php echo $state; ?>">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="shipping_country">Country</label>  
                    <div class="col-md-4">
                        <input class="form-control input-md" type="text" id="shipping_country" name="shipping_country" value="<?php echo $country; ?>">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="shipping_zipcode">Zip Code</label>  
                    <div class="col-md-4">
                        <input class="form-control input-md" type="text" id="shipping_zipcode" name="shipping_zipcode" value="<?php echo $zipcode; ?>">
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-success">Supply Payment Information</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </form>
    <?php
}
include('theme/footer.php');
?>