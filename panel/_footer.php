	<footer>
<!-- 		<div id="lvl_1">
			<div class="container">
				Prefooter
			</div>
		</div> -->
		<div id="lvl_2">
			<div class="container">
				<div class="col-md-6">1</div>
				<div class="col-md-3">
					<h5>Nosotros</h5>
					<ul>
						<li><a href="#">Ayuda</a></li>
						<li><a href="#">Contacto</a></li>
						<li><a href="#">Terminos</a></li>
						<li><a href="#">Aviso Legal</a></li>
						<li><a href="#">Aviso de privacidad</a></li>
					</ul>
				</div>
				<div class="col-md-3">
					<h5>Siguenos</h5>
					<ul>
						<li><a href="#">Facebook</a></li>
						<li><a href="#">Twitter</a></li>
						<li><a href="#">Google +</a></li>
						<li><a href="#">Instangram</a></li>
						<li><a href="#">Youtube</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="lvl_3">
			<div class="container">
				<div class="col-md-9"> Copyright misal © 2014. Todos los derechos reservados </div>
				<div class="col-md-3">iconos redes</div>
			</div>
		</div>
	</footer>


	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../files/js/jquery.min.js"><\/script>')</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script>window.jQuery || document.write('<script src="../files/js/bootstrap.min.js"><\/script>')</script>
	<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>


	<script src="../files/js/libs/jquery.tagsinput.min.js"></script>
	<script src="../files/js/libs/ion.rangeSlider.min.js"></script>
	<script src="../files/js/libs/jquery.lightbox-0.5.min.js"></script>
	<script src="../files/js/main.js"></script>
	
<script>

$(document).ready(function() {

    jQuery.extend(jQuery.validator.messages, {
        required: "Este campo es obligatorio.",
        remote: "Por favor, rellena este campo.",
        email: "Por favor, escribe una dirección de correo válida",
        url: "Por favor, escribe una URL válida.",
        date: "Por favor, escribe una fecha válida.",
        dateISO: "Por favor, escribe una fecha (ISO) válida.",
        number: "Por favor, escribe un número entero válido.",
        digits: "Por favor, escribe sólo dígitos.",
        creditcard: "Por favor, escribe un número de tarjeta válido.",
        equalTo: "No coninciden las contraseñas.",
        accept: "Por favor, escribe un valor con una extensión aceptada.",
        maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
        minlength: jQuery.validator.format("Debe tener al menos {0} caracteres."),
        rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
        range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
        max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
        min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
    });
});
		$("#agregar_paquete").validate();

	</script>

	<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
	<script>
		(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
		e=o.createElement(i);r=o.getElementsByTagName(i)[0];
		e.src='//www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
		ga('create','UA-XXXXX-X');ga('send','pageview');
	</script>
</body>
</html>