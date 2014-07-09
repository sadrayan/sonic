<?php
//get application data per field.
//set_value()
$app_title = isset($title) ? $title : '';
$app_desc  = isset($description) ? $description : '';
$title = array(
    'name'	=> 'title',
    'id'	=> 'title',
    'value'	=> set_value('title',$app_title),
    'maxlength'	=> 80,
    'size'	=> 30,
    'class' => 'form-control',
    'placeholder' => 'Title'
);
$description = array(
    'name'	=> 'description',
    'id'	=> 'description',
    'value'	=> set_value('description', $app_desc),
    'maxlength'	=> 80,
    'size'	=> 30,
    'class' => 'form-control',
    'placeholder' => 'Description'
);


if (isset($form) && $form == 'add') {
    echo form_open('form/add', array('id' => 'app_form', 'class' => 'form-horizontal'));
} elseif (isset($form) && $form == 'update') {
    echo form_open('form/update/' . $id, array('id' => 'app_form', 'class' => 'form-horizontal'));
}


?>
    <!-- Form Name -->
    <legend>Something Application</legend>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-sm-2 control-label" for="title">Title</label>
        <div class="col-sm-5">
            <?php echo form_input($title); ?>
        </div>
        <div  style="color: red;text-align: left" class="control-label">
            <?php echo form_error($title['name']);
                  echo isset($errors[$title['name']])?$errors[$title['name']]:''; ?>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-sm-2 control-label" for="desc">Description</label>
        <div class="col-sm-5">
            <?php echo form_input($description); ?>
        </div>
        <div  style="color: red;text-align: left" class="control-label">
            <?php echo form_error($description['name']);
            echo isset($errors[$description['name']])?$errors[$description['name']]:''; ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary" name="submit" value="complete">Submit</button>
            <button type="submit" class="btn btn-secondary" name="submit" value="incomplete">Save Incomplete</button>
        </div>
    </div>

</form>

