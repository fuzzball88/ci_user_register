<?php echo validation_errors(); ?>

<?php echo form_open('users/register');?>
<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label for="text">Username</label>
		</div>
		<div class="col-md-4">
			<input type="text" class="form-control" name="username">
		</div>
	</div>

	
	<div class="row">
		<div class="col-md-4">
			<label for="Ingredients">Email</label>
		</div>
		<div class="col-md-4">
			<input type="text" class="form-control" name="email">
		</div>
	</div> 
	
	<div class="row">
		<div class="col-md-4">
			<label for="ProductionMethod">Password</label>
		</div>
		<div class="col-md-4">
			<input type="password" class="form-control" name="password1">
		</div>
	</div> 
	
	<div class="row">
		<div class="col-md-4">
			<label for="ProductionMethod">Password confirmation</label>
		</div>
		<div class="col-md-4">
			<input type="password" class="form-control" name="password2">
		</div>
	</div> 
	
	<div class="row">
		<div class="col-md-4">
			<input class="p-3 mb-2 bg-primary text-white" type="submit" value="Register">
		</div>
		<div class="col-md-4">
			<a href="https://mvc-user-account-n7pete00.c9users.io/ci/index.php/users/index/">Back</a>
		</div>
	</div> 

</form>