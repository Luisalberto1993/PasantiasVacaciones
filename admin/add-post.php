<?php
require_once('inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

$session_username = $_SESSION['username'];
$session_author_image = $_SESSION['author_image'];
?>
</head>
<body>
    <div id="wrapper">
        <?php require_once('inc/header.php'); ?>

        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3">
                    <?php require_once('inc/sidebar.php'); ?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fa fa-file"></i> Noticias <small>Publicadas</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li class="active"><i class="fa fa-file"></i> Agregar Noticia</li>
                    </ol>
                    <?php
                    if (isset($_POST['submit'])) {
                        $date = time();
                        $title = mysqli_real_escape_string($con, $_POST['title']);
                        $post_data = mysqli_real_escape_string($con, $_POST['post-data']);
                        $categories = $_POST['categories'];
                        $tags = mysqli_real_escape_string($con, $_POST['tags']);
                        $status = $_POST['status'];
                        $image = $_FILES['image']['name'];
                        $tmp_name = $_FILES['image']['tmp_name'];

                        if (empty($title) or empty($post_data) or empty($tags) or empty($image)) {
                            $error = "Los campos con(*) son obligados";
                        } else {
                            $insert_query = "INSERT INTO posts (date,title, author,author_image,image,categories,tags,post_data,views,status) VALUES ('$date','$title','$session_username','$session_author_image','$image','$categories','$tags','$post_data','0','$status')";
                            if (mysqli_query($con, $insert_query)) {
                                $msg = "Información Subida";
                                $path = "img/$image";
                                $title = "";
                                $post_data = "";
                                $tags = "";
                                $status = "";
                                $categories = "";
                                if (move_uploaded_file($tmp_name, $path)) {
                                    copy($path, "../$path");
                                }
                            } else {
                                $error = "Información no añadida";
                            }
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title"> Título :*</label>
                                    <?php
                                    if (isset($msg)) {
                                        echo "<div class='alert alert-danger' style='color:green;><i class='fa fa-close'></i>$msg</div>";
                                    } else if (isset($error)) {
                                        echo "<div class = 'alert alert-success' role = 'alert' style = 'color:red;'><i class='fa fa-close'></i>$error
                        </div>";
                                    }
                                    ?>
                                    <input type="text" name="title" placeholder="Ingrese un título para su publicación" value="<?php
                                    if (isset($title)) {
                                        echo $title;
                                    }
                                    ?>" class="form-control">
                                </div>


                                <div class="form-group">
                                    <textarea name="post-data" id="textarea" rows="10" class="form-control"><?php
                                        if (isset($post_data)) {
                                            echo $post_data;
                                        }
                                        ?></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="file">Imagen relacionada :*</label>
                                            <input type="file" name="image">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="categories">Categoría de Noticia:*</label>
                                            <select class="form-control" name="categories" id="categories">
                                                <?php
                                                $cat_query = "SELECT * FROM categories ORDER BY id DESC";
                                                $cat_run = mysqli_query($con, $cat_query);
                                                if (mysqli_num_rows($cat_run) > 0) {
                                                    while ($cat_row = mysqli_fetch_array($cat_run)) {
                                                        $cat_name = $cat_row['category'];
                                                        echo "<option value='" . $cat_name . "' " . ((isset($categories) and $categories == $cat_name) ? "selected" : "") . ">" . ucfirst($cat_name) . "</option>";
                                                    }
                                                } else {
                                                    echo "<cetner><h6>Categoría no disponible</h6></center>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tags">Etiquetas :*</label>
                                            <input type="text" name="tags" placeholder="Ingresar sus etiquetas" value="<?php
                                            if (isset($tags)) {
                                                echo $tags;
                                            }
                                            ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="status">Estado:*</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="publico" <?php
                                                if (isset($status) and $status == 'publico') {
                                                    echo "selected";
                                                }
                                                ?>>Público</option>
                                                <option value="oculto" <?php
                                                if (isset($status) and $status == 'oculto') {
                                                    echo "selected";
                                                }
                                                ?>>Oculto</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Agregar Noticia" name="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>