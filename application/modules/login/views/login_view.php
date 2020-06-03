<div class="container">
	<div class="row justify-content-center">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 ">
			<form class="form-horizontal" method="post" action="<?= site_url('login') ?>"><br>
				<?php echo $this->session->flashdata('msg'); ?><br>
				<fieldset>
					<legend >Sign in</legend>			
					<div class="form-group">
						<label for="email" class="cols-sm-2 control-label">Email</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="cols-sm-2 control-label">Password</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
							</div>
						</div>
					</div>
					<?php echo $this->session->flashdata('flash_data'); ?>
					<div class="form-group ">
						<button type="submit" class="btn btn-dark">Login</button>
					</div>
 				</fieldset>
			</form>

		</div>
	</div>
</div> 
