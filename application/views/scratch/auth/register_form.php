<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
	<?php if ($use_username) { ?>
		<?php echo form_label('Username', $username['id']); ?>
		<?php echo form_input($username); ?>
		<?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
	<?php } ?>
		<?php echo form_label('Email Address', $email['id']); ?>
		<?php echo form_input($email); ?>
		<?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
		<?php echo form_label('Password', $password['id']); ?>
		<?php echo form_password($password); ?>
		<?php echo form_error($password['name']); ?>
		<?php echo form_label('Confirm Password', $confirm_password['id']); ?>
		<?php echo form_password($confirm_password); ?>
		<?php echo form_error($confirm_password['name']); ?>

	<?php if ($captcha_registration) {
		if ($use_recaptcha) { ?>
			<div id="recaptcha_image"></div>
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		  <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
		  <?php echo form_error('recaptcha_response_field'); ?>
		  <?php echo $recaptcha_html; ?>
	  <?php } else { ?>
		  <p>Enter the code exactly as it appears:</p>
		  <?php echo $captcha_html; ?>
		  <?php echo form_label('Confirmation Code', $captcha['id']); ?>
		  <?php echo form_input($captcha); ?>
		  <?php echo form_error($captcha['name']); ?>
	  <?php }
	  } ?>
<?php echo form_submit('register', 'Register'); ?>
<?php echo form_close(); ?>
