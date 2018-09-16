
<section class="contact" id="contact">
    <div class="container">
        <div class="heading">
            <h2>Contacto</h2>
            <h3>Envíanos tus sugerencias llenando nuestro formulario.<br>
                Estaremos gustusos en antenderte.</h3>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="map">
                    <iframe id="google-map"src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d997.038415026676!2d-78.68136064613807!3d-1.6551561578285172!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe968c5dee7e4e3c2!2sEspoch%2C+Fabrica+de+Ideas!5e0!3m2!1ses!2sec!4v1535939432197"  frameborder="0" style="border:0" allowfullscreen></iframe>
                    <!--<div id="google-map" data-latitude="-1.6579361" data-longitude="-78.67634229999999"></div>-->
                </div>
            </div>
            <br>
            <br>
            <div class="contact-info">
                <div class="col-md-5">
                    <h4>Información de contacto</h4>
                    <br>

                    <h5>Informacion 1</h5>
                    <br>

                    <p>También podemos atender tus inquietudes, tan sólo marcando a nuestros contactos</p>
                    <ul>
                        <li><i class="fas fa-map-marker-alt fa-2x"></i> Panamericana Sur km 1 1/2, Riobamba-Ecuador</li>
                        <li><i class="fa fa-phone fa-2x"></i> 593(03) 2998-200</li>
                        <li><i class="fa fa-envelope fa-2x"></i> <a href="mailto:luisguanolema3@gmail.com">  fabricaideas@gmail.com</a></li>
                        <li><i class="fa fa-download fa-2x"></i><a>  Descarga nuestra app</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!--<div class="col-md-6 col-md-offset-2">-->
                <div id="sendmessage">Tu mensaje ha sido enviado gracias...!</div>
                <div id="errormessage"></div>
                <form method="post" role="form" class="contactForm" name="sentMessage" id="contactForm" action="EnviarComentario.php">
                    <div class="form-group">
                        <label>Nombres: </label>
                        <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Ingrese menos 4 caracteres " placeholder="Nombres">
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <label>Email: </label>
                        <input type="email" class="form-control" name="email" id="email"  data-rule="email" data-msg="Ingrese un email válido" placeholder="Email">
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <label>Asuto: </label>
                        <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Ingrese al menos 8 caracteres del asunto" placeholder="Asunto">
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <label>Teléfono: </label>
                        <input type="tel" class="form-control" name="phone" id="phone" data-rule="minlen:10" data-msg="Ingrese un número de teléfono" placeholder="Teléfono">
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <label>Mensaje: </label>
                        <textarea class="form-control" name="message" id="mensaje" rows="5" data-rule="required" data-msg="Ingrese su mensaje" placeholder="Mensaje"></textarea>
                        <div class="validation"></div>
                    </div>

                    <div class="text-center"><button type="submit" class="contact submit" name="sub" value="Enviar"> Enviar Mensaje</button></div>

                    <div id="alerta" class="alert hide">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong class="respuesta"></strong> <span class="mensaje-alerta"></span>
                    </div>

                </form>

                <?php
                if (isset($_POST['sub'])) {
                    $name = $_POST['name'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $approval = "Not Allowed";
                    $sql = "INSERT INTO `contact`(`fullname`, `phoneno`, `email`,`cdate`,`approval`) VALUES ('$name','$phone','$email',now(),'$approval')";

                    if (mysqli_query($con, $sql))
                        echo"OK";
                }
                ?>
            </div>
        </div>
        <div class="clearfix"></div>

    </div>

</section>

<!--footer-->

