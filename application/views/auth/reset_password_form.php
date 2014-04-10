<?php
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
    'class' => 'form-control',
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 30,
    'class' => 'form-control',
);
?>
<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>

    <div class="form-group">
        <?php echo form_label('New Password', $new_password['id'], array('class'=> 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo form_password($new_password); ?>
        </div>
        <div  style="color: red;text-align: left" class="control-label">
            <?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo form_label('Confirm New Password', array('class'=> 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo form_password($confirm_new_password); ?>
        </div>
        <div  style="color: red;text-align: left" class="control-label">
            <?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo form_submit('change', 'Change Password', "class='btn btn-primary'"); ?>
        </div>
    </div>

<?php echo form_close(); ?>