<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav nav-bg sidebar accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?page=default">
                <marquee behavior="scroll" direction="right">
                    <div class="sidebar-brand-text text-capitalize">
                        <?php echo title() ?>
                    </div>
                </marquee>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="?page=default">
                    <i class="fas fa-fw fa-eye"></i>
                    <span>View Site</span>
                </a>
            </li>

             <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="?page=dashboard">
                    <i class="fas fa-fw fa-eye"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Settings
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="?page=#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="?page=settings">Site Title</a>
                        <a class="collapse-item" href="?page=image-carousel">Home</a>
                        <a class="collapse-item" href="?page=services">Services</a>
                        <a class="collapse-item" href="?page=staff">Staff</a>
                        <a class="collapse-item" href="?page=feedback">View Feedbacks</a>

                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">


            <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
                    <i class="fa fa-arrow-right"></i>
                    <span>Log out</span>
                </a>
            </li>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                </nav>

                <div class="container-fluid">