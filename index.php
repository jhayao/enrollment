<!DOCTYPE html>
<html lang="en">
<?php require_once("templates/head.php")?>
<body>
	<?php include("process/process.php")?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form"  id="frmLogin">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Invalid Input">
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

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn" ></div>
							<button class="login100-form-btn" name="login">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="txt2" href="signup.php">
							Sign Up
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
				var username = $('input[name=username]').val();
				var password = $('input[name=pass]').val();
				var ajaxRequest;
				event.preventDefault();
				
				$.ajax({
				url: "process/process.php",
				type: "post",
				data: {"username": username ,"password": password,"login":true} ,
				success: function (result) {
					if(result=="success"){
						Swal.fire({
							icon: 'success',
							title: 'Login',
							text: 'Login Successful',
							}).then(()=>{
								window.location.href = "admin";
							})
					}
					else
					{
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Login Failed',
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