<?php if (!defined('ACCESS')) die('DIRECT ACCESS NOT ALLOWED'); ?>

<?php element('header') ?>

<?php element('adminHeader') ?>

<h1 class="display-5 pb-3">Image Carousel Home</h1>
<!-- DataTales -->
<div class="card shadow mb-4">

    <div class="card-header py-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
            <i class="fa fa-plus"></i> Add new
        </button>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <div id="message"><?php echo show_message() ?> </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Image Carousel</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th class="col-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = $DB->query("SELECT * FROM image_carousel_table");
                        if ($query->num_rows > 0):
                        while ($row = $query->fetch_assoc()):
                    ?>
                    <tr>
                        <td><img src="./assets/img/<?php echo $row['image'] ?>" alt="Image" width="100px"></td>
                        <td><?php echo $row['title'] ?></td>
                        <td class="text-break text-justify"><?php echo $row['description'] ?></td>
                        <td>
                            <a href="?page=update-image-carousel&id=<?php echo $row['id'] ?>" class="btn btn-outline-primary"> Update</a>
                            <a href="?page=delete_image_carousel&id=<?php echo $row['id'] ?>&action=delete_image_carousel" class="btn btn-outline-danger">Delete</a>
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

<!-- Modal -->
<div class="modal fade" id="create" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel"><i class="fa fa-plus"></i> Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <input type="hidden" name="action" value="new_image_carousel">
                <div class="modal-body">
                    <div class="form-group my-2">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" class="form-control pb-5" required>
                    </div>
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

<?php element('adminFooter') ?>

<?php element('footer') ?>
