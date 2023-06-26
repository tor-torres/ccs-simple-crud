<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>
	 <!-- Bootstrap core JavaScript-->
   <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/main.min.js"></script>
    <script src="assets/js/sub-main.min.js"></script>

    <script src="assets/js/demo/datatables-demo.js"></script>

    <script>
        const messageElement = document.querySelector('#message');
        function hideMessage() {
        messageElement.style.display = 'none';
        }
        setTimeout(hideMessage, 7000);

        document.addEventListener('DOMContentLoaded', function() {
        const scrollUpBtn = document.querySelector('#scrollUpBtn');
        
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 0) {
            scrollUpBtn.style.display = 'block';
            } else {
            scrollUpBtn.style.display = 'none';
            }
        });
        
        scrollUpBtn.addEventListener('click', function() {
            window.scrollTo({
            top: 0,
            behavior: 'smooth'
            });
        });
        });
    </script>

</body>

</html>