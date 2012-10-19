<?php require("cabecera.php"); ?>		
            	<span id="position">
                    <!--<aside>
                    <h5>Noticias previas</h5>
                        <ul>
                            <li><a href="#"><time>2012-07-28</time></a></li>
                            <li><a href="#"><time>2011-12-12</time></a></li>
                            <li><a href="#"><time>2011-12-25</time></a></li>
                            <li><a href="#"><time>2012-07-28</time></a></li>
                            <li><a href="#"><time>2011-12-12</time></a></li>
                            <li><a href="#"><time>2011-12-25</time></a></li>
                            <li><a href="#"><time>2012-07-28</time></a></li>
                            <li><a href="#"><time>2011-12-12</time></a></li>
                            <li><a href="#"><time>2011-12-25</time></a></li>
                            <li><a href="#"><time>2012-07-28</time></a></li>
                            <li><a href="#"><time>2011-12-12</time></a></li>
                            <li><a href="#"><time>2011-12-25</time></a></li>
                        </ul>
                    </aside>-->
                    <div id="acordeon">
                        <h3><a href="#">Misi&oacute;n</a></h3>
                        <div>
                        	<p>Somos una empresa que pretende ser una alternativa en cuanto a servicio de hospedaje,
con alto nivel de calidad de servicio, seguridad y tranquilidad.
							</p>
                        </div>
                        <h3><a href="#">Visi&oacute;n</a></h3>
                        <div>
                        	<p>Ser una empresa líder a nivel de servicios turísticos de calidad, confort, reconocida dentro de la línea de albergue turístico.</p>
						</div>
                    </div>		
                <div id="formLogin">
                    <form method="post">
                        <div id="login">
                        <h1 id="titleLogin">LOGIN</h1>
                            <div id="cuerpoLogin">
                                <label class="labelLogin">Usuario
                                    <span class="detalle">Ingrese nombre de usuario</span>
                                </label>
                                <input type="text" id="usuario" class="inputLogin" required /><br>
                                <label class="labelLogin">Contrase&ntilde;a
                                    <span class="detalle">M&iacute;nimo 6 caracteres</span>
                                </label>
                                <input type="password" id="clave" class="inputLogin" required /><br>
                                <button type="submit" id="enterLogin">Ingresar</button>
                                    <span class="error"><?php echo $error; ?></span>
                            </div>
                        </div>
                    </form>
                </div>
                </span>
                <section>
                    <article>
                    	<img src="lib/fotos/piscina.jpg" class="fotoArt">
                        <span class="contArt">
                            <h3>Bienvenidos al Portal de la Jungla</h3>
                            <h4>Un rinc&oacute;n en la selva</h4>
                            <p>Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla</p>
                    	</span>
                    </article>
                    <article>
                    	<img src="lib/fotos/recepcion.jpg" class="fotoArt">
                        <span class="contArt">
                            <h3>Bienvenidos al Portal de la Jungla</h3>
                            <h4>Un rinc&oacute;n en la selva</h4>
                            <p>Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla</p>
                    	</span>
                    </article>
                    <article>
                    	<img src="lib/fotos/restaurante.jpg" class="fotoArt">
                        <span class="contArt">
                            <h3>Bienvenidos al Portal de la Jungla</h3>
                            <h4>Un rinc&oacute;n en la selva</h4>
                            <p>Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla, Esta es la jungla</p>
                    </span>
                    </article>
                </section>
<?php require("pie.php"); ?>