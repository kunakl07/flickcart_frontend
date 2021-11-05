<br>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
	<?= $this->Form->create('', ['class' => 'form-control']); ?>
			<h2 class="text-center">Please Sign up</h2>
				<?= $this->Form->input('name', ['class' => 'form-control me-2']); ?><br>
				<?= $this->Form->input('email', ['class' => 'form-control me-2']); ?><br>
				<?= $this->Form->input('password', ['class' => 'form-control me-2', 'type' => 'password']); ?><br>
                <div class="g-recaptcha" data-sitekey="6LfNy9EaAAAAAFbZbGeOsyQtyqqr6L3hXhRK0vyd"></div><br>
				<?= $this->Form->submit('Sign Up', ['class' => 'form-control btn btn-success']); ?><br>
				Already a user? <a href="./login" class="text-decoration-none">Login</a>
			<?= $this->Form->end(); ?>
	</div>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
