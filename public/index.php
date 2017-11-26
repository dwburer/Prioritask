<?php include 'templates/base.php'; ?>

<?php startblock('navigation') ?>
<?php endblock() ?>

<?php startblock('content') ?>
    <div class="col-sm-12 col-md-6 offset-sm-0 offset-md-3">
        <div id="login" class="userform">
            <div class="h1 pb-md-3">Prioritask</div>
            <div class="row no-gutters">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email">
            </div>
            <div class="row no-gutters pt-2">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password">
            </div>
            <div id="regfield" class="row no-gutters pt-2">
                <label for="password">Confirm Password:</label>
                <input type="password" class="form-control" id="passwordconf">
            </div>
            <div class="row pt-4">
                <div class="col">
                    <button id="login-button" type="button" class="btn btn-primary btn-block float-left">Login</button>
                </div>
                <div class="col">
                    <button id="register-button" type="button" class="btn btn-secondary btn-block float-right">Register</button>
                </div>
            </div>
        </div>
    </div>
<?php endblock() ?>

<?php startblock('footer_js') ?>
    <script src="js/splash.js"></script>
    <script type="text/javascript">
        $(function () {
            $("div#regfield").hide();
            // Checking if user is logged in, and then redirecting them to the dashboard if they are.
            // Ajax call to the API for login verification.
            $.ajax({
                type: 'POST',
                data: 'request=checklogin',
                url: '<?php echo API_URL . 'index.php'?>',
                async: true,
                success: function (response) {
                    //If API returns 1 (success)
                    if (response == 1) {
                        document.location.href = 'dashboard.php';
                    }
                },
                error: function () {
                    alert("An error has occured while verifying logged-in status!");
                }
            });
        });
    </script>
<?php endblock() ?>
