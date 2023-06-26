<?php if (!defined('ACCESS')) die('DIRECT ACCESS NOT ALLOWED'); ?>

<?php element('header') ?>

<?php element('adminHeader') ?>

    <h1 class="display-5">Staff</h1>

    <div class="card-header py-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
            <i class="fa fa-plus"></i> Add New Staff
        </button>
    </div>

    <?php
        $query = $DB->query("SELECT * FROM staff_table");

        $members = [];
        while ($row = $query->fetch_assoc()) {
            $members[] = $row;
        }
    ?>

    <div class="container">
        <div id="message"><?php echo show_message() ?> </div>
        <div class="row py-5">
            <?php if(count($members) == 0): ?>
                <div class="col">
                    <h1 class="display-1 d-flex justify-content-center align-items-center text-dark font-weight-bold text-uppercase">no data found</h1>
                </div>
            <?php else: ?>
                <?php foreach ($members as $member): ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card text-center shadow-lg border-bottom-success mb-3">
                        <div class="card-body">
                            <img src="assets/img/<?php echo $member['avatar'] ?>" class="card-img-top w-25">
                            <h3 class="text-dark text-uppercase"><?php echo $member['fullname']; ?></h3>
                            <p class="text-sm text-capitalize"><?php echo $member['position']; ?></p>
                        <hr>
                            <a href="?page=update-staff&id=<?php echo $member['id'] ?>" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-pen"></i> Update</a>

                            <a href="?page=delete_staff&id=<?php echo $member['id'] ?>&action=delete_staff" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash-alt"></i> Delete</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif ?>
        </div>
    </div>

     <!-- MODAL CREATE -->
     <div class="modal fade" id="create" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createLabel"><i class="fa fa-plus"></i> Create</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="new_staff">
                    <div class="modal-body">
                    <div class="form-group my-2">
                            <label for="avatar">Avatar:</label>
                            <input type="file" name="avatar" id="avatar" class="form-control" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="fullname">Fullname:</label>
                            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Please enter fullname.." required>
                        </div>
                        <div class="form-group my-2">
                            <label for="position">Position:</label>
                            <input type="text" name="position" id="position" class="form-control" placeholder="Please enter position.." required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="btn-create" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL END  -->

<?php element('adminFooter') ?>

<?php element('footer') ?>