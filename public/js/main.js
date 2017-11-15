$("a#logout").on("click", function (e) {
    $.ajax({
        type: 'POST',
        data: 'request=logout&r=t',
        url: 'api/index.php',
        async: true,
        success: function (response) {
            document.location.href ="index.php";
        },
        error: function () {
            alert("Error with logout!");
        }
    });
});

$('#login-button').on('click',
        function (event)
        {
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
