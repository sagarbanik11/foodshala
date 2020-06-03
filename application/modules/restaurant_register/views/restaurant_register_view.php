
<div class="container">
	<div class="row justify-content-center">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 ">
			<form class="form-horizontal" action="<?=site_url('restaurant_register/save')?>" method="post"><br>
				<fieldset>
					<legend >Restaurant Signup</legend>			
					<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">Name</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<input type="text" class="form-control" name="auth" id="auth" value='1' hidden>	
								<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="cols-sm-2 control-label">Email</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email" required>
							</div>
						</div>
						<?php echo form_error('email', '<div class="error">', '</div>'); ?>
					</div>

					<div class="form-group">
						<label for="username" class="cols-sm-2 control-label">Mobile No</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<input type="text" class="form-control" name="mobile" id="mobile"  placeholder="Enter Your Mobile No" required>
							</div>
						</div>
						<?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
					</div>
		

					<div class="form-group">
						<label for="password" class="cols-sm-2 control-label">Password</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" required>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<input type="password" class="form-control" name="confirmpassword" id="confirmpassword"  placeholder="Confirm your Password" required>
							</div>
						</div>
						<?php echo form_error('confirmpassword', '<div class="error">', '</div>'); ?>
					</div>

					<div class="form-group ">
						<button type="submit" onclick="return Validate()" class="btn btn-dark">SignUp</button>
					</div>
				</fieldset>	
			</form>
		</div>
	</div>
</div>  
</div>

<style>
.error{
    color:red;
    
}
</style>
<script type="text/javascript">
          
	function Validate() {
		var password = document.getElementById("password").value;
		var confirmPassword = document.getElementById("confirmpassword").value;
		if (password != confirmPassword) {
			document.getElementById('confirmpassword').style.borderColor = "red";
			alert("Password do not match.");
			
			return false;
		}
	}
</script>