<?php
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
    'class' => 'form-control',
);
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
    'class' => 'form-control',
);
?>
<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>

    <div class="form-group">
        <?php echo form_label('Password', $password['id'], array('class'=> 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo form_password($password); ?>
        </div>
        <div  style="color: red;text-align: left" class="control-label">
            <?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo form_label('New email address', $email['id'], array('class'=> 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo form_input($email); ?>
        </div>
        <div  style="color: red;text-align: left" class="control-label">
            <?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo form_submit('change', 'Send confirmation email', "class='btn btn-primary'"); ?>
        </div>
    </div>


<?php echo form_close(); ?>