<?php if (isset($form) && $form == 'add') {
    echo form_open('form/add', array('id' => 'app_form'));
} elseif (isset($form) && $form == 'update') {
    echo form_open('form/update/' . $id, array('id' => 'app_form'));
}
?>
<fieldset>

    <!-- Form Name -->
    <legend>Something Application</legend>
    <?php echo validation_errors(); ?>
    <!-- Text input-->
    <div class="input-group">
        <label class="control-label" for="title">Title</label>

        <div class="controls">
            <input id="title" name="title" placeholder="Title" value="<?php echo isset($title) ? $title : ''; ?>"
                   class="form-control" type="text">
        </div>
    </div>

    <!-- Text input-->
    <div class="input-group">
        <label class="control-label" for="desc">Description</label>

        <div class="controls">
            <input id="description" name="description" placeholder="Description"
                   value="<?php echo isset($description) ? $description : ''; ?>" class="form-control" type="text">
        </div>
    </div>

    <div>
        <button type="submit" class="btn btn-primary" name="submit" value="complete">Submit</button>
        <button type="submit" class="btn btn-secondary" name="submit" value="incomplete">Save Incomplete</button>
    </div>

</fieldset>
</form>

