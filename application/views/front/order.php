<?php
$company = array(
    'name' => 'company',
    'id' => 'company',
    'value' => set_value('company'),
    'maxlength' => 80,
    'size' => 30,
    'class' => 'form-control'
);
$firstName = array(
    'name' => 'firstName',
    'id' => 'firstName',
    'value' => set_value('firstName'),
    'maxlength' => 80,
    'size' => 30,
    'class' => 'form-control'
);
$lastName = array(
    'name' => 'lastName',
    'id' => 'lastName',
    'value' => set_value('lastName'),
    'maxlength' => 80,
    'size' => 30,
    'class' => 'form-control'
);
$email = array(
    'name' => 'email',
    'id' => 'email',
    'value' => set_value('email'),
    'maxlength' => 80,
    'size' => 30,
    'class' => 'form-control'
);
$createAccount = array(
    'name' => 'createAccount',
    'id' => 'createAccount',
    'value' => 1,
    'checked' => set_value('remember'),
    'style' => 'margin:0;padding:0',
);
?>

<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>

    <div class="form-group">
        <?php echo form_label("Company", $company['id'], array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo form_input($company); ?>
        </div>
        <div style="color: red; text-align: left" class="control-label">
            <?php echo form_error($company['name']); ?><?php echo isset($errors[$company['name']]) ? $errors[$company['name']] : ''; ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo form_label("First Name", $firstName['id'], array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo form_input($firstName); ?>
        </div>
        <div style="color: red; text-align: left" class="control-label">
            <?php echo form_error($firstName['name']); ?><?php echo isset($errors[$firstName['name']]) ? $errors[$firstName['name']] : ''; ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo form_label("Last Name", $lastName['id'], array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo form_input($lastName); ?>
        </div>
        <div style="color: red; text-align: left" class="control-label">
            <?php echo form_error($lastName['name']); ?><?php echo isset($errors[$lastName['name']]) ? $errors[$lastName['name']] : ''; ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo form_label("Last Name", $email['id'], array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo form_input($email); ?>
        </div>
        <div style="color: red; text-align: left" class="control-label">
            <?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']]) ? $errors[$email['name']] : ''; ?>
        </div>
    </div>


    <div class="form-group">
        <?php echo form_label("Last Name", $createAccount['id'], array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <label>
                <?php echo form_checkbox($createAccount,'',false, 'style=""'); ?> Create account with us!
            </label>
        </div>
        <div style="color: red; text-align: left" class="control-label">
            <?php echo form_error($createAccount['name']); ?><?php echo isset($errors[$createAccount['name']]) ? $errors[$createAccount['name']] : ''; ?>
        </div>
    </div>





    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo form_submit('submit', 'Submit', "class='btn btn-primary'"); ?>
        </div>
    </div>
<?php echo form_close(); ?>