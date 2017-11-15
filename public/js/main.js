// 0 = LOGIN
// 1 = REGISTER
var formState = 0;
function swapState() {
    if (formState == 0) {
        //FADE LOGIN AND SHOW REGISTER
        $("div#regfield").fadeIn("slow", function () {
            $("button#register-button").removeClass('btn-secondary').addClass('btn-primary');
            $("button#login-button").removeClass('btn-primary').addClass('btn-secondary');
            formState = 1;
        });
    } else {
        //FADE REGISTER AND SHOW LOGIN
        $("div#regfield").fadeOut("slow", function () {
            $("button#register-button").removeClass('btn-primary').addClass('btn-secondary');
            $("button#login-button").removeClass('btn-secondary').addClass('btn-primary');
            formState = 0;
        })
    }
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

$('#login-button').on('click',
        function (event)
        {
            if (formState === 1) {
                swapState();
                return;
            }
            let email = $('input#email').val();
            let password = $('input#password').val();
            $.ajax({
                type: "POST",
                data: 'request=login&email=' + email + '&password=' + password,
                url: 'api/index.php',
                async: true,
                success: function (data) {
                    if (data == true) {
                        //LOGIN WAS SUCCESSFUL, REDIRECT TO DASH
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
});
