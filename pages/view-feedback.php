<?php if (!defined('ACCESS')) die('DIRECT ACCESS NOT ALLOWED'); ?>

<?php element('header') ?>

<?php element('adminHeader') ?>

<?php
    $query = $DB->query("SELECT * FROM feedback_table WHERE id = {$_GET['id']}");
    $row = $query->fetch_assoc();
?>

<div class="container">
    <h1 class="display-5 pb-3 text-capitalize"><?php echo  "Feedback of ". $row['fullname'] ?></h1>

    <div id="message"><?php echo show_message() ?> </div>
    
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label for="fullname">Full name:</label>
                <input type="text" class="form-control" id="fullname" value="<?php echo $row['fullname'] ?>" disabled>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="form-group">
                <label for="emailAdd">Email Address:</label>
                <input type="email" class="form-control" id="emailAdd" value="<?php echo $row['email'] ?>" disabled>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" class="form-control" disabled><?php echo $row['message'] ?></textarea>
            </div>
        </div>
    </div>
    <a href="?page=feedback" class="btn btn-outline-secondary">Back</a>
</div>

<?php element('adminFooter') ?>

<?php element('footer') ?>
