<?php echo validation_errors(); ?>

<?php echo form_open('users/login');?>
<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label for="text">Username or email</label>
		</div>
		<div class="col-md-4">
			<input type="text" class="form-control" name="username">
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<label for="Password">Password</label>
		</div>
		<div class="col-md-4">
			<input type="password" class="form-control" name="password">
		</div>
	</div> 

	<div class="row">
		<div class="col-md-4">
			<input class="p-3 mb-2 bg-primary text-white" type="submit" value="login">
		</div>
		<div class="col-md-4">
			<a href="<?php echo base_url(); ?>">Back</a>
		</div>
	</div> 
</form>