<?php if (!defined('ACCESS')) die('DIRECT ACCESS NOT ALLOWED'); ?>

<?php element('header') ?>

<?php element('adminHeader') ?>

<?php
$query = $DB->query("SELECT * FROM staff_table WHERE id = {$_GET['id']}");
$value = $query->fetch_object();
?>

<div class="container">
    <h1 class="display-5">Update Staff</h1>
    <div id="message"><?php echo show_message() ?> </div>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="update_staff">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="form-group my-2">
                    <label for="avatar">Avatar:</label>
                    <input type="file" name="avatar" id="avatar" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="form-group my-2">
                    <label for="fullname">Fullname:</label>
                    <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Please enter fullname.."
                        value="<?php echo $value->fullname ?>" required>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="form-group my-2">
                    <label for="position">Position:</label>
                    <input type="text" name="position" id="position" class="form-control"
                        placeholder="Please enter position.." value="<?php echo $value->position ?>" required>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end pt-3">    
            <a href="?page=staff" class="btn btn-secondary mx-3">Cancel</a>
            <button type="submit" name="btn-update" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

<?php element('adminFooter') ?>

<?php element('footer') ?>