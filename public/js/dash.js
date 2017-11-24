$("a#markcomplete").on("click", function () {
    var taskid = $(this).attr('taskid');
    $.ajax({
        type: "POST",
        data: 'request=completeTask&taskid=' + taskid,
        url: 'api/index.php',
        async: true,
        success: function (data) {
            //user registered and set as logged in!
            if (data == 1) {
                $("a#markcomplete").html("Completed").remove('id');
            } else {
                alert("Couldn't mark task completed in database!");
            }
        },
        error: function (data) {
            console.log('Login error!: ' + data);
        }
    });
});