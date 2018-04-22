<?php
include('theme/header.php');
?>
<form class="form-horizontal" action="validateuser.php" method="post">
    <div class="panel panel-default text-center">
        <div class="panel-body">
            <div class="col-xs-12" style="padding:0 50px">
                <div class="control-group">
                    <!-- Username -->
                    <label class="control-label"  for="username">E-mail Address</label>
                    <div class="controls">
                        <input type="text" name="emailaddress" >
                    </div>
                </div>
                <div class="control-group">
                    <!-- Password -->
                    <label class="control-label"  for="password">Password</label>
                    <div class="controls">
                        <input type="password" name="password" >
                    </div>
                </div><br>
                <button type="submit" name="submit" class="btn btn-success">Login</button>
            </div>
        </div>
    </div>
</form>
<?php
include('theme/footer.php');
?>