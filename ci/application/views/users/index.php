
	<div class="row">
		<?php
		if(!empty($logged_user['id'])) 
		{ ?>
		<div class="col-md-4"><a href="<?php echo site_url('users/logout'); ?>">Logout</a></div>
		<div class="col-md-4"><p><?php echo $logged_user['username']; ?></p></div>
		<?php
		}
		else
		{ ?>
	  	<div class="col-md-4"><a href="https://mvc-user-account-n7pete00.c9users.io/ci/index.php/users/register">Register</a></div>
	  	<div class="col-md-4"><a href="https://mvc-user-account-n7pete00.c9users.io/ci/index.php/users/login">Login</a></div>
	  	<?php } ?>
	</div> 
	
	<div class="row">
	  <div class="col-md-4"><h3>List of users</h3></div>
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<?php foreach ($users as $user): ?>
				<a class="btn btn-outline-info" href=""><?php echo $user['username']; ?></a>
				<br/>
			<?php endforeach; ?>
		</div>
	</div> 
	
