<?php if (!defined('ACCESS')) die('DIRECT ACCESS NOT ALLOWED'); ?>

<?php element('header') ?>

<!-- HEADER  -->
<header class="container-fluid sticky-top py-2 bg">
    <nav class="navbar navbar-expand-lg container navbar-dark">
        <h4 class="nav-brand text-capitalize text-white d-lg-block d-none"><?php echo title() ?></h4>
        <?php if(isset($_SESSION["usertype"]) && $_SESSION["usertype"] === "admin"): ?>
            <a href="?page=dashboard" class="btn btn-xs btn-secondary nav-link text-capitalize ml-3">go back to dashboard</a>
        <?php endif ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#NavBar" aria-controls="NavBar"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="NavBar">
            <ul class="navbar-nav text-uppercase">
                <li class="nav-item px-3">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="#services">Services</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="#staff">Staff</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER -->

<button id="scrollUpBtn" class="btn btn-outline-secondary btn-lg"><i class="fa fa-arrow-alt-circle-up"></i></i></button>
<!-- HOME  -->
<?php
    $query = $DB->query("SELECT * FROM image_carousel_table");
    $carouselItems = $query->fetch_all(MYSQLI_ASSOC);
?>
<div id="home" class="carousel slide d-flex justify-content-center align-items-center" data-ride="carousel">
    <?php if(count($carouselItems) == 0) : ?>
            <h1 class="display-1 d-flex justify-content-center align-items-center font-weight-bold text-uppercase min-vh-100">no data found</h1>
    <?php else : ?>
        <ol class="carousel-indicators">
            <?php for ($i = 0; $i < count($carouselItems); $i++) { ?>
            <li data-target="#home" data-slide-to="<?php echo $i; ?>" <?php echo ($i === 0) ? 'class="active"' : ''; ?>></li>
            <?php } ?>
        </ol>
        <div class="carousel-inner">
            <?php foreach ($carouselItems as $key => $item) { ?>
                <div class="carousel-item <?php echo ($key === 0) ? 'active' : ''; ?>">
                    <img src="assets/img/<?php echo $item['image']; ?>" class="w-100 vh-50">
                    <div class="carousel-caption d-none d-md-block px-3">
                        <h5 class="display-2 text-uppercase"><?php echo $item['title']; ?></h5>
                        <p><?php echo $item['description']; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php endif ?>
</div>
<!-- END HOME  -->

<!-- SERVICES  -->
<section id="services">
    <div class="min-vh container">
        <h1 class="display-3 text-white pb-3">Services</h1>
        <div class="row">
            <?php
            $query = "SELECT * FROM services_table";
            $result = $DB->query($query);
            
            $services = [];
            while ($row = $result->fetch_assoc()) {
                $services[] = $row;
            }

            if(count($services) == 0): ?>
                <div class="col">
                <h1 class="display-1 d-flex justify-content-center align-items-center text-white font-weight-bold text-uppercase">no data found</h1>
                </div>
            <?php else: ?>
                <?php foreach ($services as $service): ?>
                <div class="col-lg-6 col-md-12">
                    <div class="jumbotron text-wrap mb-3">
                        <h3 class="font-weight-bold text-dark text-uppercase"><?php echo $service['title']; ?></h3>
                        <p class="text-justify text-sm"><?php echo $service['description']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif ?>
        </div>
    </div>
</section>
<!-- END SERVICES  -->

<!-- STAFF  -->
<section id="staff">
    <div class="container">
        <h1 class="display-3 text-dark pb-3">Staff</h1>
        <div class="row">
            <?php
            $query = "SELECT * FROM staff_table";
            $result = $DB->query($query);
            
            $members = [];
            while ($row = $result->fetch_assoc()) {
                $members[] = $row;
            }

            if(count($members) == 0): ?>
                <div class="col">
                    <h1 class="display-1 d-flex justify-content-center align-items-center text-white font-weight-bold text-uppercase">no data found</h1>
                </div>
            <?php else: ?>
                <?php foreach ($members as $member): ?>
                <div class="col-md-12 col-lg-4">
                    <div class="card border-bottom-success shadow-lg mb-3">
                        <img src="assets/img/<?php echo $member['avatar'] ?>" class="card-img-top px-3 pt-3">
                        <div class="card-body">
                            <h4 class="text-capitalize text-center"><?php echo $member['fullname']; ?></h4>
                            <hr>
                            <p class=" text-center text-capitalize"><?php echo $member['position']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <?php endif ?>
    </div>
</section>
<!-- END STAFF  -->

<!-- CONTACT  -->
<section id="contact">
    <div class="container">
        <h1 class="display-3 text-dark pb-3">Contact us</h1>
        <div id="message"><?php echo show_message() ?> </div>
        
        <form method="POST">
            <input type="hidden" name="action" value="new_feedback">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label for="fullname">Full name:</label>
                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Please enter your fullname.." required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label for="emailAdd">Email Address:</label>
                        <input type="email" class="form-control" name="email" id="emailAdd" placeholder="Please enter your email address.." required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="msg">Message:</label>
                        <textarea name="message" id="msg" class="form-control" placeholder="Write something here.." required></textarea>
                    </div>
                </div>
            </div>
            <button class="btn btn-outline-success" type="submit" name="submit">Submit Form</button>
        </form>
    </div>
</section>
<!-- END CONTACT  -->

<!-- FOOTER  -->
<footer class="py-5 bg-dark">
    <div class="container d-flex justify-content-center">
        <span class="text-white text-uppercase"><?php echo "Copyright &copy; ". date("Y") ." | ". title() ?></span>
    </div>            
</footer>
<!-- END FOOTER  -->
<?php element('footer') ?>

<script>
VANTA.NET({
  el: "#services",
  mouseControls: true,
  touchControls: true,
  gyroControls: false,
  minHeight: 200.00,
  minWidth: 200.00,
  scale: 1.00,
  scaleMobile: 1.00,
  color: 0xdfd7e6,
  backgroundColor: 0x591696,
  maxDistance: 14.00,
  spacing: 17.00
})
</script>