<?php if (!defined('ACCESS')) die('DIRECT ACCESS NOT ALLOWED'); ?>

<?php element('header') ?>

<?php element('adminHeader') ?>

<?php
$query = $DB->query("SELECT * FROM settings WHERE id = 1");
$value = $query->fetch_object();
?>

<div class="container">
    <h1 class="display-5">Update Site Title</h1>
    <div id="message"><?php echo show_message() ?> </div>
    <form method="POST">
        <input type="hidden" name="action" value="update_settings">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="form-group my-2">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Please enter title.."
                        value="<?php echo $value->title ?>" required>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end pt-3">    
            <a href="?page=dashboard" class="btn btn-secondary mx-3">Back to Dashboard</a>
            <button type="submit" name="btn-update" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

<?php element('adminFooter') ?>

<?php element('footer') ?>