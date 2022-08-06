<script src="vendors/jquery.min.js"></script>
<script src="vendors/jquery-ui/jquery-ui.min.js"></script>
<script src="vendors/bootstrap/bootstrap.bundle.js"></script>
<script src="vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="vendors/slick/slick.min.js"></script>
<script src="vendors/waypoints/jquery.waypoints.min.js"></script>
<script src="vendors/counter/countUp.js"></script>
<script src="vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="vendors/chartjs/Chart.min.js"></script>
<script src="vendors/dropzone/js/dropzone.min.js"></script>
<script src="vendors/timepicker/bootstrap-timepicker.min.js"></script>
<script src="vendors/hc-sticky/hc-sticky.min.js"></script>
<script src="vendors/jparallax/TweenMax.min.js"></script>
<script src="vendors/mapbox-gl/mapbox-gl.js"></script>
<script src="vendors/dataTables/jquery.dataTables.min.js"></script>

<script src="js/theme.js"></script>

<script>
    addToCartButton = document.querySelectorAll(".add-to-cart-button");

    document.querySelectorAll('.add-to-cart-button').forEach(function(addToCartButton) {
        addToCartButton.addEventListener('click', function() {
            addToCartButton.classList.add('added');
            setTimeout(function() {
                addToCartButton.classList.remove('added');
            }, 2000);
        });
    });

    $("#number01").on("keyup change", function(e) {
        if (/\D/g.test(this.value)) {
            // Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, '');
        }
    });
</script>