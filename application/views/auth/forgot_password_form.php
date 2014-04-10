<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
    'class' => 'form-control',
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
?>
<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>

    <div class="form-group">
        <?php echo form_label($login_label, $login['id'], array('class'=> 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo form_input($login); ?>
        </div>
        <div  style="color: red;text-align: left" class="control-label">
            <?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo form_submit('reset', 'Get a new password', "class='btn btn-primary'"); ?>
        </div>
    </div>
<?php echo form_close(); ?>