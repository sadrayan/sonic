<?php
$login = array(
    'name' => 'login',
    'id' => 'login',
    'value' => set_value('login'),
    'maxlength' => 80,
    'size' => 30,
    'class' => 'form-control'
);
if ($login_by_username AND $login_by_email) {
    $login_label = 'Email or login';
} else if ($login_by_username) {
    $login_label = 'Login';
} else {
    $login_label = 'Email';
}
$password = array(
    'name' => 'password',
    'id' => 'password',
    'size' => 30,
    'class' => 'form-control'
);
$remember = array(
    'name' => 'remember',
    'id' => 'remember',
    'value' => 1,
    'checked' => set_value('remember'),
    'style' => 'margin:0;padding:0',
);
$captcha = array(
    'name' => 'captcha',
    'id' => 'captcha',
    'maxlength' => 8,
    'class' => 'form-control'
);
?>

<?php echo form_open($this->uri->uri_string(),array('class' => 'form-horizontal')); ?>

            <div class="form-group">
                <?php echo form_label($login_label, $login['id'], array('class'=>'col-sm-2 control-label')); ?>
                <div class="col-sm-3">
                    <?php echo form_input($login); ?>
                </div>
                <div style="color: red; text-align: left" class="control-label">
                    <?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']]) ? $errors[$login['name']] : ''; ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo form_label('Password', $password['id'], array('class'=>'col-sm-2 control-label')); ?>
                <div class="col-sm-3">
                    <?php echo form_password($password); ?>
                </div>
                <div style="color: red; text-align: left" class="control-label">
                    <?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']]) ? $errors[$password['name']] : ''; ?>
                </div>
            </div>


            <?php if ($show_captcha) {
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

                        <label class="col-sm-2 control-label recaptcha_only_if_image">Enter the words above</label>
                        <label class="col-sm-2 control-label recaptcha_only_if_audio">Enter the numbers you hear</label>

                        <div class="col-sm-3">
                            <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" class="form-control" />
                        </div>
                        <div style="color: red;text-align: left" class="control-label">
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
            }?>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-3">
                    <div >
                        <label>
                            <?php echo form_checkbox($remember,'',false, 'style=""'); ?> Remember me
                        </label>
                    </div>
                    <?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?>
                    <p><?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?></p>
                </div>
            </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <?php echo form_submit('submit', 'Sign in', "class='btn btn-primary'"); ?>
            </div>
        </div>
<?php echo form_close(); ?>
