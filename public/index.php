<?php include 'templates/header_no_nav.php'; ?>
<div class="col-sm-12 col-md-6 offset-sm-0 offset-md-3">
    <div class="h1 pb-md-3">Prioritask Login</div>
    <div class="row no-gutters">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email">
    </div>
    <div class="row no-gutters pt-md-2">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password">
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

<?php include 'templates/footer.php'; ?>
