<!DOCTYPE html>
<html lang="en">
<?php require_once("templates/head.php")?>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" id="frmLogin">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Invalid Name">
						<input class="input100" type="text" name="name">
						<span class="focus-input100" data-placeholder="Full Name"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Invalid username">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Invalid username">
					<select class="form-control" id="positon">
						<option value="Admin">Admin</option>
						<option value="Student">Student</option>
					</select>
						<!-- <span class="focus-input100" data-placeholder="Username"></span> -->
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Sign up
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="txt2" href="index.php">
							Sign In
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	<?php require_once("templates/scripts.php")?>
    <script>
		$( document ).ready(function() {
			$("#frmLogin").submit(function(event) {
				var name = $('input[name=name]').val();
				var username = $('input[name=username]').val();
				var password = $('input[name=pass]').val();
				var position = $( "#positon option:selected" ).text();
				var ajaxRequest;
				event.preventDefault();
				
				$.ajax({
				url: "process/process.php",
				type: "post",
				data: {"username": username ,"name": name ,"position": position ,"password": password,"signup":true} ,
				success: function (result) {
					if(result=="success"){
						Swal.fire({
							icon: 'success',
							title: 'Signup',
							text: 'Signup Successful',
							})
					}
					else
					{
						Swal.fire({
							icon: 'error',
							title: 'Login Failed',
							text: 'Error:' + result,
							})
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
				}
			});
		});
		});
	</script>
</body>
</html>