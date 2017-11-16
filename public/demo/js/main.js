$(function () {
    var api = "./../api/";
    $("a#logout").on("click", function (e) {
        $.ajax({
            type: 'POST',
            data: 'request=logout&r=t',
            url: api + 'index.php',
            async: true,
            success: function (response) {
                document.location.href = "index.php";
            },
            error: function () {
                alert("Error with logout!");
            }
        });
    });
    $('form#task').submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var task = form.find('input#task').val();
        var due = form.find('input#due').val();
        var datetc = form.find('input#daytc').val();
        var hourtc = form.find('input#hourtc').val();
        var minutetc = form.find('input#minutetc').val();
        var location = form.find('input#location').val();
        var notes = form.find('input#notes').val();

        form.hide();
        form.html('<h3>Your task has been submitted. </h3>');
        form.fadeIn("slow");

        $.ajax({
            type: 'POST',
            data: 'request=addTask&task=' + task + '&due='
                    + due + '&datetc=' + datetc + '&hourtc=' + hourtc + '&minutetc='
                    + minutetc + '&location=' + location + '&notes=' + notes,
            url: api + 'index.php',
            async: true,
            success: function (data) {
                //success
                if (data == 1)
                    form.append('<br />Task added, click <a href=\"index.php\">here</a> to reload');
                else
                    form.append('Failed to post task due to some reason! Try cleaning up your inputs,\n\
                                <br/>click <a href=\"index.php\">here</a> to reload')
            },
            error: function () {
                alert("an error has occured!");
            }
        });
    });

    $('form#login').submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var email = form.find('input#email').val();
        var password = form.find('input#password').val();
        form.hide();
        form.html('<h3>Your login request was submitted. </h3>');
        form.fadeIn("slow");

        $.ajax({
            type: 'POST',
            data: 'request=login&email=' + email + '&password=' + password,
            url: api + 'index.php',
            async: true,
            success: function (data) {
                //success
                form.append('<br />' + data);
            },
            error: function () {
                alert("an error has occured!");
            }
        });
    });

    $('form#register').submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var email = form.find('input#email').val();
        var password = form.find('input#password').val();
        var passwordc = form.find('input#passwordconf').val();
        form.hide();
        form.html('<h3>Your registration request was submitted. </h3>');
        form.fadeIn("slow");

        $.ajax({
            type: 'POST',
            data: 'request=register&email=' + email + '&password=' + password + '&passwordconf=' + passwordc,
            url: api + 'index.php',
            async: true,
            success: function (data) {
                //success
                form.append('<br />' + data);
            },
            error: function () {
                alert("an error has occured!");
            }
        });
    });

});