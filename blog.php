<?php require_once('inc/headerBlog.php'); ?>
</head>
<body>
    <?php
    require_once('inc/SliderBlog.php');

    $number_of_posts = 3;

    if (isset($_GET['page'])) {
        $page_id = $_GET['page'];
    } else {
        $page_id = 1;
    }

    if (isset($_GET['cat'])) {
        $cat_id = $_GET['cat'];
        $cat_query = "SELECT * FROM categories WHERE id = $cat_id";
        $cat_run = mysqli_query($con, $cat_query);
        $cat_row = mysqli_fetch_array($cat_run);
        $cat_name = $cat_row['category'];
    }


    if (isset($_POST['search'])) {
        $search = $_POST['search-title'];
        $all_posts_query = "SELECT * FROM posts WHERE status = 'publico'";
        $all_posts_query .= " and tags LIKE '%$search%'";
        $all_posts_run = mysqli_query($con, $all_posts_query);
        $all_posts = mysqli_num_rows($all_posts_run);
        $total_pages = ceil($all_posts / $number_of_posts);
        $posts_start_from = ($page_id - 1) * $number_of_posts;
    } else {
        $all_posts_query = "SELECT * FROM posts WHERE status = 'publico'";
        if (isset($cat_name)) {
            $all_posts_query .= " and categories = '$cat_name'";
        }
        $all_posts_run = mysqli_query($con, $all_posts_query);
        $all_posts = mysqli_num_rows($all_posts_run);
        $total_pages = ceil($all_posts / $number_of_posts);
        $posts_start_from = ($page_id - 1) * $number_of_posts;
    }
    ?>

    <br>
    <br>
    <br>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php
                    $slider_query = "SELECT * FROM posts WHERE status = 'publico' ORDER BY id DESC LIMIT 5";
                    $slider_run = mysqli_query($con, $slider_query);
                    if (mysqli_num_rows($slider_run) > 0) {
                        $count = mysqli_num_rows($slider_run);
                        ?>
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <?php
                                for ($i = 0; $i < $count; $i++) {
                                    if ($i == 0) {
                                        echo "<li data-target='#carousel-example-generic' data-slide-to='" . $i . "' class='active'></li>";
                                    } else {
                                        echo "<li data-target='#carousel-example-generic' data-slide-to='" . $i . "'></li>";
                                    }
                                }
                                ?>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <?php
                                $check = 0;
                                while ($slider_row = mysqli_fetch_array($slider_run)) {
                                    $slider_id = $slider_row['id'];
                                    $slider_image = $slider_row['image'];
                                    $slider_title = $slider_row['title'];
                                    $check = $check + 1;
                                    if ($check == 1) {
                                        echo "<div class='item active'>";
                                    } else {
                                        echo "<div class='item'>";
                                    }
                                    ?>
                                    <a href="post.php?post_id=<?php echo $slider_id; ?>"><img src="img/<?php echo $slider_image; ?>"></a>
                                    <div class="carousel-caption">
                                        <h2><?php echo $slider_title; ?></h2>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <?php
                }
                if (isset($_POST['search'])) {
                    $search = $_POST['search-title'];
                    $query = "SELECT * FROM posts WHERE status = 'publico'";
                    $query .= " and tags LIKE '%$search%'";
                    $query .= " ORDER BY id DESC LIMIT $posts_start_from, $number_of_posts";
                } else {
                    $query = "SELECT * FROM posts WHERE status = 'publico'";
                    if (isset($cat_name)) {
                        $query .= " and categories = '$cat_name'";
                    }
                    $query .= " ORDER BY id DESC LIMIT $posts_start_from, $number_of_posts";
                }
                $run = mysqli_query($con, $query);
                if (mysqli_num_rows($run) > 0) {
                    while ($row = mysqli_fetch_array($run)) {
                        $id = $row['id'];
                        $date = getdate($row['date']);
                        $day = $date['mday'];
                        $month = $date['month'];
                        $year = $date['year'];
                        $title = $row['title'];
                        $author = $row['author'];
                        $author_image = $row['author_image'];
                        $categories = $row['categories'];
                        $tags = $row['tags'];
                        $post_data = $row['post_data'];
                        $views = $row['views'];
                        $status = $row['status'];
                        $image = $row['image'];
                        ?>
                        <div class="post">
                            <div class="row">
                                <div class="col-md-2 post-date">
                                    <div class="day"><?php echo $day; ?></div>
                                    <div class="month"><?php echo $month; ?></div>
                                    <div class="year"><?php echo $year; ?></div>
                                </div>
                                <div class="col-md-8 post-title">
                                    <a href="post.php?post_id=<?php echo $id; ?>"><h2><?php echo $title; ?></h2></a>
                                    <p>Escrito por: <span><?php echo ucfirst($author); ?></span></p>
                                </div>
                                <div class="col-md-2 profile-picture">
                                    <img src="img/<?php echo $author_image; ?>" alt="Foto de Perfil" class="img-circle">
                                </div>
                            </div>
                            <a href="post.php?post_id=<?php echo $id; ?>"><img src="img/<?php echo $image; ?>" alt="Post Image"></a>
                            <div class="desc">
                                <?php echo substr($post_data, 0, 300) . "......"; ?>
                            </div>
                            <a href="post.php?post_id=<?php echo $id; ?>" class="btn btn-primary">Leer más</a>
                            <div class="bottom">
                                <span class="first"><i class="fa fa-folder"></i><a href="#"> <?php echo ucfirst($categories); ?></a></span>|
                                <span class="sec"><i class="fa fa-comment"></i><a href="#"> Comentario</a></span>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<center><h2>Búsqueda no encontrada...</h2></center>";
                }
                ?>

                <nav id="pagination">
                    <ul class="pagination">
                        <?php
                        for ($i = 1; $i <= $total_pages; $i++) {
                            echo "<li class='" . ($page_id == $i ? 'active' : ' ') . "'><a href='blog.php?page=" . $i . "&" . (isset($cat_name) ? "cat=$cat_id" : " ") . "'>$i</a></li>";
                        }
                        ?>
                    </ul>
                </nav>
            </div>

            <div class="col-md-4">
                <?php require_once('inc/sidebar.php'); ?>              
            </div>
        </div>
    </div>
</section>

<?php require_once './inc/revistaBlog.php'; ?>
<?php require_once './inc/contact_1.php'; ?>


<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- contact form -->
<script src="js/jqBootstrapValidation.js"></script>
<!-- /contact form -->	

<!-- Calendar -->
<script src="js/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
    });
</script>
<!-- //Calendar -->


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

<!--search-bar para la barra de busqueda-->
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

            * /
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