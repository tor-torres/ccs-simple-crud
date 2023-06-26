<?php if (!defined('ACCESS')) die('DIRECT ACCESS NOT ALLOWED'); ?>

<?php element('header') ?>

<?php element('adminHeader') ?>

    <div class="container row">
        <div class="col">
            <h1 class="h3 mb-4 text-gray-800">Admin Panel</h1>
        </div>
    </div>

    <?php show_message() ?>

    <div class="container row">        
        <a href="?page=image-carousel">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Home Settings</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                        $select = $DB->query("SELECT * FROM image_carousel_table");
                                        $result = mysqli_num_rows($select);
                                        if($result == 0) { echo "No Data"; }else{ echo $result; }
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="?page=services">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Services Settings</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                                $select = $DB->query("SELECT * FROM services_table");
                                $result = mysqli_num_rows($select);
                                if($result == 0) { echo "No Data"; }else{ echo $result; }
                            ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="?page=staff">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Staff Settings</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                                $select = $DB->query("SELECT * FROM staff_table");
                                $result = mysqli_num_rows($select);
                                if($result == 0) { echo "No Data"; }else{ echo $result; }
                            ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="?page=feedback">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">View Feedbacks</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                                $select = $DB->query("SELECT * FROM feedback_table");
                                $result = mysqli_num_rows($select);
                                if($result == 0) { echo "No Data"; }else{ echo $result; }
                            ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
               
<?php element('adminFooter') ?>

<?php element('footer') ?>