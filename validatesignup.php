<?php
include('theme/header.php');
?>

<form class="form-horizontal" action="addcustomer.php" method="post" onsubmit="return validate(this);">
    <!-- Form Name -->
    <legend>Register</legend>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="emailaddress">E-mail Address</label>  
        <div class="col-md-4">
            <input class="form-control input-md" type="text" id="emailaddress" name="emailaddress" ><span id="emailmsg"></span>
        </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="password">Password</label>  
        <div class="col-md-4">
            <input class="form-control input-md" type="password" id="password" name="password" ><span id="passwdmsg"></span>
        </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="repassword">Re-Password</label>  
        <div class="col-md-4">
            <input class="form-control input-md" type="password" id="repassword" name="repassword" ><span id="repasswdmsg"></span>
        </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="complete_name">Complete Name</label>  
        <div class="col-md-4">
            <input class="form-control input-md" type="text" id="complete_name" name="complete_name"><span id="usrmsg"></span>
        </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="address1">Address</label>  
        <div class="col-md-4">
            <input class="form-control input-md" type="text" id="address1" name="address1" >
            <input class="form-control input-md" type="text" id="address2" name="address2" >
        </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="city">City</label>  
        <div class="col-md-4">
            <input class="form-control input-md" type="text" id="city" name="city" >
        </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="state">State</label>  
        <div class="col-md-4">
            <input class="form-control input-md" type="text" id="state" name="state" >
        </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="country">Country</label>  
        <div class="col-md-4">
            <input class="form-control input-md" type="text" id="country" name="country" >
        </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="zipcode">Zip Code</label>  
        <div class="col-md-4">
            <input class="form-control input-md" type="text" id="zipcode" name="zipcode" >
        </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="phone_no">Phone No</label>  
        <div class="col-md-4">
            <input class="form-control input-md" type="text" id="phone_no" name="phone_no" >
        </div>
    </div>
    <!-- Text input-->
    <div class="form-group"> 
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
        </div>
    </div>
</form>
<script>
    function validate(userForm) {
        div = document.getElementById("emailmsg"); // #1
        div.style.color = "red"; // #2
        if (div.hasChildNodes()) // #3
        {
            div.removeChild(div.firstChild); // #4
        }
        regex = /(^\w+\@\w+\.\w+)/; // #5
        match = regex.exec(userForm.emailaddress.value);
        if (!match)
        {
            div.appendChild(document.createTextNode("Invalid Email")); // #6
            userForm.emailaddress.focus(); // #7
            return false; // #8
        }
        div = document.getElementById("passwdmsg");
        div.style.color = "red";
        if (div.hasChildNodes())
        {
            div.removeChild(div.firstChild);
        }
        if (userForm.password.value.length <= 7) // #9
        {
            div.appendChild(document.createTextNode("The password shouldbe of at least size 8"));
            userForm.password.focus();
            return false;
        }
        div = document.getElementById("repasswdmsg");
        div.style.color = "red";
        if (div.hasChildNodes())
        {
            div.removeChild(div.firstChild);
        }
        if (userForm.password.value != userForm.repassword.value) // #10
        {
            div.appendChild(document.createTextNode("The two passwordsdon't match"));
            userForm.password.focus();
            return false;
        }
        var div = document.getElementById("usrmsg");
        div.style.color = "red";
        if (div.hasChildNodes())
        {
            div.removeChild(div.firstChild);
        }
        if (userForm.complete_name.value.length == 0) // #11
        {
            div.appendChild(document.createTextNode("Name cannot be blank"));
            userForm.complete_name.focus();
            return false;
        }
        return true;
    }
</script>

<?php
include('theme/footer.php');
?>