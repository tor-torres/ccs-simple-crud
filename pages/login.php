<?php if (!defined('ACCESS')) die('DIRECT ACCESS NOT ALLOWED'); if(isset($_SESSION[AUTH_ID])) { redirect(); }?>

<?= element('header') ?>

<div class="d-flex justify-content-center align-items-center vh-100">

    <div class="col-sm-4">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="text-center">
                    <img src="assets/img/icon.png" width="100px">
                    <h2 class="card-title py-3">LOG IN</h2>
                </div>
                <div id="message"><?php echo show_message() ?> </div>
                <form method="POST">
                    <input type="hidden" name="action" value="validate_user" />
                    <div class="form-group my-2 px-sm-3">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" placeholder="Please enter username.."
                            class="form-control" />
                    </div>
                    <div class="form-group my-2 px-sm-3">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" placeholder="Please enter password.."
                            class="form-control" />
                    </div>
                    <div class="form-group my-4 px-sm-3">
                        <div class="row">
                            <div class="col-6">
                                <input type="checkbox" id="showPassword">
                                <label for="showPassword">Show Password</label>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <input type="submit" name="btn-submit" value="Log In"
                                    class="btn btn-outline-primary btn-block" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <script defer>
        document.querySelector("#showPassword").addEventListener("click", () => {
            const password = document.querySelector("#password");
            password.type = password.type === "password" ? "text" : "password";
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.waves.min.js"></script>
    <script>
        VANTA.WAVES({
            el: ".vh-100",
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 200.00,
            minWidth: 200.00,
            scale: 1.00,
            scaleMobile: 1.00,
            color: 0x6514ac,
            shininess: 61.00,
            waveHeight: 26.50,
            waveSpeed: 0.80,
            zoom: 0.79
        })
    </script>

<?= element('footer') ?>