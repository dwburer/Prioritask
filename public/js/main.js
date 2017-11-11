
// After the document is ready, load session info from a cookie
$(document).ready(
function()
{
	let cookie_split = decodeURIComponent(document.cookie).split(';');
	if (cookie_split) {
		var session_info = {};
		for(let i = 0, len = cookie_split.length; i < len; i++) {
			let _t_split = cookie_split[i].trim().split('=');
			session_info[_t_split[0]] = _t_split[1];
		}
		// If the current session still going on, redirect to the user's dashboard
		if(	session_info
		 && session_info['expiration']
	 	 && new Date(session_info['expiration']) - Date.now() > 0) {
			document.location.href = 'dashboard.php';
		}
	}
});

$('#login-button').on('click',
function(event)
{
	let email = $('#email').text();
	let password = $('#password').text();
	$.ajax({
		type: "POST",
		data: 'request=login&email=' + email + '&password=' + password,
		url: 'api/index.php',
		async: true,
		success: function(data) {
			document.cookie = encodeURIComponent('session_id=' + data['session_id'] + ';expiration=' + data['expiration'] + ';');
			document.location.href = 'dashboard.php';
		},
		error: function () {
			alert('Login error!');
		}
	});
});
