<br>
<div class="row">
	<?php
		if ($sign) echo '<div class="alert alert-success text-center" role="alert">'.$sign.'</div>';
		if($error):
	?>
	<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
		<strong><?= h($error) ?></strong>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	<?php endif;?>
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<?= $this->Form->create('', ['class' => 'form-control', 'id'=> 'login']); ?>
			<h2 class="text-center">Login</h2>
				<?= $this->Form->input('email', ['class' => 'form-control me-2']); ?><br>
				<?= $this->Form->input('password', ['class' => 'form-control me-2','type' => 'password']); ?><br>
                <div class="g-recaptcha" data-sitekey="6LfNy9EaAAAAAFbZbGeOsyQtyqqr6L3hXhRK0vyd"></div><br>
				<?= $this->Form->submit('Login', ['class' => 'form-control btn btn-success']); ?><br>

                New user? <a href="./signup" class="text-decoration-none">Sign up</a>
			<?= $this->Form->end(); ?>
	</div>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
