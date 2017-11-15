<?php include 'templates/header_no_nav.php'; ?>
<div class="col-sm-12 col-md-6 offset-sm-0 offset-md-3">
    <div id="login" class="userform">
        <div class="h1 pb-md-3">PrioriTask Login</div>
        <div class="row no-gutters">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email">
        </div>
        <div class="row no-gutters pt-md-2">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password">
        </div>
        <div id="regfield" class="row no-gutters pt-md-2">
            <label for="password">Confirm Password:</label>
            <input type="password" class="form-control" id="passwordconf">
        </div>
        <div class="row no-gutters pt-md-4">
            <div class="col">
                <button id="login-button" type="button" style="width: 15rem;" class="btn btn-primary btn-block float-left">Login</button>
            </div>
            <div class="col">
                <button id="register-button" type="button" style="width: 15rem;" class="btn btn-secondary btn-block float-right">Register</button>
            </div>
        </div>
    </div>
</div>

<?php include 'templates/footer.php'; ?>

<script type="text/javascript">
    $(function () {
        $("div#regfield").hide();
        //checking if user is logged in 
        //then redirecting them to the dashboard if they are
        var api = "./api/";
        //jQuery ajax call to the api
        $.ajax({
            type: 'POST',
            data: 'request=checklogin',
            url: api + 'index.php',
            async: true,
            success: function (response) {
                //If api returns 1
                if (response == 1) {
                    document.location.href = 'dashboard.php';
                }
                //Otherwise do nothing
            },
            error: function () {
                alert("An error has occured while verifying logged-in status!");
            }
        });
    });
</script>