// 0 = LOGIN
// 1 = REGISTER

var formState = 0;

function swapState() {
    clearFields();
    if (formState == 0) {
        // Fade login fields and show registration fields.
        $("div#regfield").fadeIn("slow", function () {
            $("button#register-button").removeClass('btn-secondary').addClass('btn-primary');
            $("button#login-button").removeClass('btn-primary').addClass('btn-secondary');
            formState = 1;
        });
    } else {
        // Fade registration fields and show login fields.
        $("div#regfield").fadeOut("slow", function () {
            $("button#register-button").removeClass('btn-primary').addClass('btn-secondary');
            $("button#login-button").removeClass('btn-secondary').addClass('btn-primary');
            formState = 0;
        })
    }
}

function clearFields() {
    $(":text").val("");
    $(":password").val("");
}

$("a#logout").on("click", function (e) {
    $.ajax({
        type: 'POST',
        data: 'request=logout&r=t',
        url: 'api/index.php',
        async: true,
        success: function (response) {
            document.location.href = "index.php";
        },
        error: function () {
            alert("Error with logout!");
        }
    });
});

$('#login-button').on('click', function (e) {

    if (formState === 1) {
        swapState();
        return;
    }

    var email = $('input#email').val();
    var password = $('input#password').val();

    $.ajax({
        type: "POST",
        data: 'request=login&email=' + email + '&password=' + password,
        url: 'api/index.php',
        async: true,
        success: function (data) {
            if (data == true) {
                // Login was successful, redirect to dashboard.
                document.location.href = 'dashboard.php';
            } else {
                alert(data);
            }
        },
        error: function (data) {
            console.log('Login error!: ' + data);
        }
    });
});

$("#register-button").on("click", function () {

    if (formState === 0) {
        swapState();
        return;
    }

    var email = $('input#email').val();
    var password = $('input#password').val();
    var passwordconf = $('input#passwordconf').val();

    $.ajax({
        type: "POST",
        data: 'request=register&email=' + email + '&password=' + password + '&passwordconf=' + passwordconf,
        url: 'api/index.php',
        async: true,
        success: function (data) {
            // User registered and logged in.
            if (data == 1) {
                // Login was successful, redirect to dashboard.
                document.location.href = 'dashboard.php';
            } else {
                alert(data);
            }
        },
        error: function (data) {
            console.log('Login error!: ' + data);
        }
    });
});
