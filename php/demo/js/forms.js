$(function () {
	var pathToHandler = "./../requestHandler/";
    $('form#tester').submit(function (e) {
        e.preventDefault();
        var task = $(this).find('input#task').val();
        var date = $(this).find('input#date').val();
		var form = $('div#form');
		form.hide();
		form.html('<h3>Your task has been submitted. </h3>');
		form.fadeIn( "slow");
		
		$.ajax({
				type: 'POST', 
				data: 'request=addtask&task=' + task + '&date=' + date,
				url: pathToHandler + 'index.php',
				async: true,
				success: function(data) {
					//success
					form.append('<br />' + data);
				},
				error: function() {
					alert("an error has occured!");
				}
			});
    });
});