<?php if (!defined('ACCESS')) die('DIRECT ACCESS NOT ALLOWED'); ?>

<?php element('header') ?>

<?php element('adminHeader') ?>

    <h1 class="display-5">Services</h1>

    <div class="card-header py-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
            <i class="fa fa-plus"></i> Add new
        </button>
    </div>

    <?php
        $query = $DB->query("SELECT * FROM services_table");

        $services = [];
        while ($row = $query->fetch_assoc()) {
            $services[] = $row;
        }
    ?>

    <div class="container">
        <div id="message"><?php echo show_message() ?> </div>
        <div class="row py-5">
            <?php if(count($services) == 0): ?>
                <div class="col py-3">
                    <h1 class="display-1 d-flex justify-content-center align-items-center text-dark text-uppercase">no data found</h1>
                </div>
            <?php else: ?>
                <?php foreach ($services as $service): ?>
                <div class="col-lg-4 col-sm-12">
                    <div class="card text-wrap shadow mb-3">
                        <div class="card-body">
                            <h3 class="font-weight-bold text-dark text-uppercase"><?php echo $service['title']; ?></h3>
                            <p class="text-justify text-sm"><?php echo $service['description']; ?></p>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <a href="?page=update-service&id=<?php echo $service['id'] ?>" class="btn btn-sm btn-outline-primary mb-2 mx-2">
                            <i class="fas fa-pen"></i> Update</a>

                            <a href="?page=delete_service&id=<?php echo $service['id'] ?>&action=delete_service" class="btn btn-sm btn-outline-danger mb-2 mx-2">
                            <i class="fas fa-trash-alt"></i> Delete</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif ?>
        </div>
    </div>

    <!-- MODAL CREATE -->
    <div class="modal fade" id="create" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="createLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createLabel"><i class="fa fa-plus"></i> Create</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    <input type="hidden" name="action" value="new_service">
                    <div class="modal-body">
                        <div class="form-group my-2">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Please enter title.." required>
                        </div>
                        <div class="form-group my-2">
                            <label for="desc">Description:</label>
                            <input type="text" name="description" id="desc" class="form-control" placeholder="Please enter description.." required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="btn-sbmt" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL END  -->

<?php element('adminFooter') ?>

<?php element('footer') ?>