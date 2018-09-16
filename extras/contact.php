

<!-- contact -->
<section class="contact-w3ls" id="contact">
    <div class="container">
        <div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
            <div class="contact-agileits">
                <h4>Contáctenos
                </h4>
                <strong><p class="contact-agile2">Inscribíte y forma parte
                    </p></strong>
                <form  method="post" name="sentMessage" id="contactForm" action="EnviarComentario.php" class="formulario-contacto">
                    <div class="control-group form-group">

                        <label class="contact-p1">Nombres
                            :</label>
                        <input type="text" class="form-control" name="name" id="name" required >
                        <p class="help-block"></p>

                    </div>	
                    <div class="control-group form-group">

                        <label class="contact-p1">Teléfono
                            :</label>
                        <input type="tel" class="form-control" name="phone" id="phone" required >
                        <p class="help-block"></p>

                    </div>
                    <div class="control-group form-group">

                        <label class="contact-p1">E-mail:</label>
                        <input type="email" class="form-control" name="email" id="email" required >
                        <p class="help-block"></p>

                    </div>
                    <div class="control-group form-group">

                        <label class="contact-p1">Mensaje:</label>
                        <textarea id="mensaje" name="mensaje" id="mensaje"></textarea>
                        <!--<input type="te" class="form-control" name="email" id="email" required >-->
                        <p class="help-block"></p>

                    </div>

                    <div class="control-group form-group">
                        <input type="submit" name="sub" value="Enviar" class="btn btn-primary" id="sub">	  
                    </div>

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
        <div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile1" data-aos="flip-right">
            <h4>Estamos Ubicados
            </h4>
            <p class="contact-agile1"><i class="fas fa-mobile"></i>  <strong>Teléfono : </strong> 0996631416</p>
            <p class="contact-agile1"><i class="fas fa-envelope-square"></i><strong>  Email :</strong> <a href="mailto:luisguanolema3@gmail.com">fabricaIdeas.com</a></p>
            <p class="contact-agile1"><i class="fas fa-map-marked-alt"></i></span><strong>  Dirección :</strong> Riobamba, Ecuador</p>

            <div class="social-bnr-agileits footer-icons-agileinfo">
                <ul class="social-icons3">
                    <li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
                    <li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
                    <li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li> 

                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</section>
