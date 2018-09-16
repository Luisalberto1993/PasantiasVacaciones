<?php require_once('inc/header.php'); ?>
<?php require_once('inc/Slider.php'); ?>

<!-- banner-bottom -->
<div class="banner-bottom">
    <div class="container">	
        <div class="agileits_banner_bottom">
            <h3><span>Experimenta tu emprendimiento, formando parte de nuestro grupo</span> Encuentra nuestra acogedora bienvenida
            </h3>
        </div>
        <div class="w3ls_banner_bottom_grids">
            <ul class="cbp-ig-grid">
                <li>
                    <div class="w3_grid_effect">

                        <span class="cbp-ig-icon w3_cube"></span>
                        <h4 class="cbp-ig-title">OFICINA
                        </h4>
                        <span class="cbp-ig-category">FÁBRICA IDEAS</span>
                    </div>
                </li>
                <li>
                    <div class="w3_grid_effect">
                        <span class="cbp-ig-icon w3_users"></span>
                        <h4 class="cbp-ig-title">REUNIONES</h4>
                        <span class="cbp-ig-category">FÁBRICA IDEAS</span>
                    </div>
                </li>
                <li>
                    <div class="w3_grid_effect">
                        <span class="cbp-ig-icon w3_ticket"></span>
                        <h4 class="cbp-ig-title">COBERTURA WIFI
                        </h4>
                        <span class="cbp-ig-category">FÁBRICA IDEAS</span>
                    </div>
                </li>
                <li>
                    <div class="w3_grid_effect">
                        <span class="cbp-ig-icon w3_cube"></span>
                        <h4 class="cbp-ig-title">ASESORIA</h4>
                        <span class="cbp-ig-category">FÁBRICA IDEAS
                        </span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- //banner-bottom -->

<!--menu-->
<?php include_once './inc/about.php'; ?>
<?php include_once './inc/team.php'; ?>
<?php include_once './inc/gallery.php'; ?>
<?php include_once './inc/revista.php'; ?>
<?php include_once './inc/publicaciones.php'; ?>
<?php include_once './inc/eExperimentaron.php'; ?>
<?php include_once './inc/contact_1.php'; ?>
<!--menu-->

<!--/footer -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!--<script src="js/jqBootstrapValidation.js"></script>-->

<script src="js/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
    });
</script>

<!-- gallery popup -->
<link rel="stylesheet" href="cssPaginaInicial/swipebox.css">
<script src="js/jquery.swipebox.min.js"></script> 
<script type="text/javascript">
    jQuery(function ($) {
        $(".swipebox").swipebox();
    });
</script>
<!-- //gallery popup -->

<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });
</script>
<!-- start-smoth-scrolling -->

<!-- flexSlider -->
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });
</script>
<!-- //flexSlider -->

<script src="js/responsiveslides.min.js"></script>
<script>
// You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider4").responsiveSlides({
            auto: true,
            pager: true,
            nav: false,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>

<!--search-bar-->
<script src="js/main.js"></script>	
<!--//search-bar-->

<!--tabs-->
<script src="js/easy-responsive-tabs.js"></script>
<script>
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function (event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>
<!--//tabs-->

<!-- smooth scrolling -->
<script type="text/javascript">
    $(document).ready(function () {
        $().UItoTop({easingType: 'easeOutQuart'});
        });
</script>

<div class="arr-w3ls">
    <a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</div>

<div class="arr-w3ls">
    <a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</div>

<?php require_once('inc/footer.php'); ?>

