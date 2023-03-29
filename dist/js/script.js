function start_loader() {
	$('body').append('<div id="preloader"><div class="loader-holder"><div></div><div></div><div></div><div></div>')
}
function end_loader() {
	$('#preloader').fadeOut('fast', function () {
		$('#preloader').remove();
	})
}
// function 
window.alert_toast = function ($msg = 'TEST', $bg = 'success', $pos = '') {
	var Toast = Swal.mixin({
		toast: true,
		position: $pos || 'top-end',
		showConfirmButton: false,
		timer: 5000
	});
	Toast.fire({
		icon: $bg,
		title: $msg
	})
}

$(document).ready(function () {
	// Login
	$('#login-frm').submit(function (e) {
		e.preventDefault()
		start_loader()
		if ($('.err_msg').length > 0)
			$('.err_msg').remove()
		$.ajax({
			url: _base_url_ + 'classes/Login.php?f=login',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err)

			},
			success: function (resp) {
				if (resp) {
					resp = JSON.parse(resp)
					if (resp.status == 'success') {
						location.replace(_base_url_ + 'user');
					} else if (resp.status == 'incorrect') {
						var _frm = $('#login-frm')
						var _msg = "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> Incorrect username or password</div>"
						_frm.prepend(_msg)
						_frm.find('input').addClass('is-invalid')
						$('[name="username"]').focus()
					}
					end_loader()
				}
			}
		})
	})
	//Client Login
	$('#login-user-frm').submit(function (e) {
		e.preventDefault()
		start_loader()
		if ($('.err_msg').length > 0)
			$('.err_msg').remove()
		$.ajax({
			url: _base_url_ + 'classes/Login.php?f=login',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err)

			},
			success: function (resp) {
				if (resp) {
					resp = JSON.parse(resp)
					if (resp.status == 'success') {
						location.replace(_base_url_ + 'user');
					} else if (resp.status == 'incorrect') {
						var _frm = $('#login-user-frm')
						var _msg = "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> Incorrect username or password</div>"
						_frm.prepend(_msg)
						_frm.find('input').addClass('is-invalid')
						$('[name="username"]').focus()
					}
					end_loader()
				}
			}
		})
	})
	//Client Register
	$('#register-user-frm').submit(function (e) {
		e.preventDefault()
		start_loader()
		if ($('.err_msg').length > 0)
			$('.err_msg').remove()
		$.ajax({
			url: _base_url_ + 'classes/Login.php?f=register_user',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err)

			},
			success: function (resp) {
				if (resp) {
					resp = JSON.parse(resp)
					var _frm = $('#register-user-frm')
					_frm.find('input').removeClass('is-invalid');
					if (resp.status == 'success') {
						var _msg = "<div class='alert alert-success text-white err_msg'><i class='fa fa-solid fa-check'></i>Success! Proceed to the <a href='login.php'>Login Page</a></div>";
						_frm.prepend(_msg)
					} else if (resp.status == 'duplicate' || resp.status == 'incomplete') {
						if (resp.status == 'duplicate') {
							$('[name="email"]').focus()
							resp._error = "Email already exists! Would you like to <a href='login.php'>Login</a> instead?"
						} else if (resp.status == 'incomplete') {
							_frm.find('input[value=""]').addClass('is-invalid')
						}
						var _msg = "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i>" + resp._error + "</div>";
						_frm.prepend(_msg)
						_frm.find('input[name="email"]').addClass('is-invalid')
						if (resp.status == 'duplicate')
							$('[name="email"]').focus()
					} else {
						var _frm = $('#register-user-frm')
						var _msg = "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> " + resp._error + "</div>";
						_frm.prepend(_msg)
					}
					end_loader()
				}
			}
		})
	})
	//Establishment Login
	$('#flogin-frm').submit(function (e) {
		e.preventDefault()
		start_loader()
		if ($('.err_msg').length > 0)
			$('.err_msg').remove()
		$.ajax({
			url: _base_url_ + 'classes/Login.php?f=flogin',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err)

			},
			success: function (resp) {
				if (resp) {
					resp = JSON.parse(resp)
					if (resp.status == 'success') {
						location.replace(_base_url_ + 'faculty');
					} else if (resp.status == 'incorrect') {
						var _frm = $('#flogin-frm')
						var _msg = "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> Incorrect username or password</div>"
						_frm.prepend(_msg)
						_frm.find('input').addClass('is-invalid')
						$('[name="username"]').focus()
					}
					end_loader()
				}
			}
		})
	})

	//user login
	$('#slogin-frm').submit(function (e) {
		e.preventDefault()
		start_loader()
		if ($('.err_msg').length > 0)
			$('.err_msg').remove()
		$.ajax({
			url: _base_url_ + 'classes/Login.php?f=slogin',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err)

			},
			success: function (resp) {
				if (resp) {
					resp = JSON.parse(resp)
					if (resp.status == 'success') {
						location.replace(_base_url_ + 'student');
					} else if (resp.status == 'incorrect') {
						var _frm = $('#slogin-frm')
						var _msg = "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> Incorrect username or password</div>"
						_frm.prepend(_msg)
						_frm.find('input').addClass('is-invalid')
						$('[name="username"]').focus()
					}
					end_loader()
				}
			}
		})
	})
	// System Info
	$('#system-frm').submit(function (e) {
		e.preventDefault()
		start_loader()
		if ($('.err_msg').length > 0)
			$('.err_msg').remove()
		$.ajax({
			url: _base_url_ + 'classes/SystemSettings.php?f=update_settings',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function (resp) {
				if (resp == 1) {
					// alert_toast("Data successfully saved",'success')
					location.reload()
				} else {
					$('#msg').html('<div class="alert alert-danger err_msg">An Error occured</div>')
					end_load()
				}
			}
		})
	})
})
