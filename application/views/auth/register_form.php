<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
        'class' => 'form-control',
        'placeholder' => 'Username'
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
    'class' => 'form-control',
    'placeholder' => 'Email'
);
$first_name = array(
    'name'	=> 'first_name',
    'id'	=> 'first_name',
    'value'	=> set_value('first_name'),
    'maxlength'	=> 80,
    'size'	=> 30,
    'class' => 'form-control',
    'placeholder' => 'First Name'
);
$last_name = array(
    'name'	=> 'last_name',
    'id'	=> 'last_name',
    'value'	=> set_value('last_name'),
    'maxlength'	=> 80,
    'size'	=> 30,
    'class' => 'form-control',
    'placeholder' => 'Last Name'
);
$company = array(
    'name'	=> 'company',
    'id'	=> 'company',
    'value'	=> set_value('company'),
    'maxlength'	=> 80,
    'size'	=> 30,
    'class' => 'form-control',
    'placeholder' => 'Company'
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
    'class' => 'form-control',
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
    'class' => 'form-control',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
    'class' => 'form-control',
);
?>
<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>

	<?php if ($use_username) { ?>

        <div class="form-group">
            <?php echo form_label('Username', $username['id'], array('class'=> 'col-sm-2 control-label')); ?>
            <div class="col-sm-3">
                <?php echo form_input($username); ?>
            </div>
            <div  style="color: red;text-align: left" class="control-label">
                <?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
            </div>
        </div>

	<?php } ?>

    <div class="form-group">
        <?php echo form_label('First Name', $first_name['id'], array('class'=> 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo form_input($first_name); ?>
        </div>
        <div style="color: red; text-align: left" class="control-label">
            <?php echo form_error($first_name['name']); ?><?php echo isset($errors[$first_name['name']])?$errors[$first_name['name']]:''; ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo form_label('Last Name', $last_name['id'], array('class'=> 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo form_input($last_name); ?>
        </div>
        <div style="color: red; text-align: left" class="control-label">
            <?php echo form_error($last_name['name']); ?><?php echo isset($errors[$last_name['name']])?$errors[$last_name['name']]:''; ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo form_label('Company', $company['id'], array('class'=> 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo form_input($company); ?>
        </div>
        <div style="color: red; text-align: left" class="control-label">
            <?php echo form_error($company['name']); ?><?php echo isset($errors[$company['name']])?$errors[$company['name']]:''; ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo form_label('Email Address', $email['id'], array('class'=> 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo form_input($email); ?>
        </div>
        <div style="color: red; text-align: left" class="control-label">
            <?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo form_label('Password', $password['id'], array('class'=> 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo form_password($password); ?>
        </div>
        <div style="color: red; text-align: left" class="control-label">
            <?php echo form_error($password['name']); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo form_label('Confirm Password', $confirm_password['id'], array('class'=> 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo form_password($confirm_password); ?>
        </div>
        <div style="color: red; text-align: left" class="control-label">
            <?php echo form_error($confirm_password['name']); ?>
        </div>
    </div>


	<?php if ($captcha_registration) {
		if ($use_recaptcha) { ?>

    <div class="form-group">
        <div class="col-sm-3">
            <div id="recaptcha_image"></div>
        </div>
        <div class="col-sm-3">
            <a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
            <div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
            <div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
        </div>
    </div>

    <div class="form-group">

        <label class="col-sm-2 control-label recaptcha_only_if_image" for="recaptcha_response_field">Enter the words above</label>
        <label class="col-sm-2 control-label recaptcha_only_if_audio" for="recaptcha_response_field">Enter the numbers you hear</label>

        <div class="col-sm-3">
            <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" class="form-control" />
        </div>
        <div style="color: red; text-align: left" class="control-label">
            <?php echo form_error('recaptcha_response_field'); ?>
        </div>
        <?php echo $recaptcha_html; ?>
    </div>

	<?php } else { ?>

    <div class="form-group">
        <div class="col-sm-3">
            <p>Enter the code exactly as it appears:</p>
            <?php echo $captcha_html; ?>
        </div>
        <div class="col-sm-3">
            <?php echo form_label('Confirmation Code', $captcha['id']); ?>
            <?php echo form_input($captcha); ?>
            <span style="color: red; text-align: left" class="control-label"><?php echo form_error($captcha['name']); ?></span>
        </div>

    </div>

	<?php }
	} ?>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo form_submit('register', 'Register', "class='btn btn-primary'"); ?>
        </div>
    </div>

<?php echo form_close(); ?>