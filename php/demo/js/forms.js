$(function () {
    var pathToHandler = "./../api/";
    
    $('form#task').submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var task = form.find('input#task').val();
        var date = form.find('input#date').val();
        form.hide();
        form.html('<h3>Your task has been submitted. </h3>');
        form.fadeIn("slow");

        $.ajax({
            type: 'POST',
            data: 'request=addtask&task=' + task + '&date=' + date,
            url: pathToHandler + 'index.php',
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
            url: pathToHandler + 'index.php',
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
            data: 'request=register&email=' + email + '&password=' + password + '&passwordconf='+passwordc,
            url: pathToHandler + 'index.php',
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