<?php if (!defined('ACCESS')) die('DIRECT ACCESS NOT ALLOWED'); ?>

<?php element('header') ?>

<?php element('adminHeader') ?>

<?php
    $query = $DB->query("SELECT * FROM feedback_table");
    $count = mysqli_num_rows($query);
    if($count == 0 || $count == 1 ){ $feedback = "feedback"; }else{ $feedback = "feedbacks"; }
?>
<h1 class="display-5 pb-3 text-capitalize"><?php echo $feedback ?></h1>

<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <div id="message"><?php echo show_message() ?> </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th class="col-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = $DB->query("SELECT * FROM feedback_table");
                        if ($query->num_rows > 0):
                        while ($row = $query->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?php echo $row['fullname'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td class="text-break text-justify"><?php echo $row['message'] ?></td>
                        <td>
                            <a href="?page=view-feedback&id=<?php echo $row['id'] ?>" class="btn btn-outline-primary"> View</a>
                            <a href="?page=delete_feedback&id=<?php echo $row['id'] ?>&action=delete_feedback" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile ?>
                    <?php else: ?>
                      
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php element('adminFooter') ?>

<?php element('footer') ?>
