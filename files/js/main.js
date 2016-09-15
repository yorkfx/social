// With JQuery
function hideLayer(ObHide)
{
  document.getElementById(ObHide).style.visibility="hidden";
}


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

        $("#form_registro").validate({
        rules: {
            password: {
                required: true,
                minlength: 5
            },
            password_r: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            }
        }
     });
});

	//Carga las primeras 5 imagenes
	// $('#gallery > div > .thumbnail:gt(5)').css('display','none');

 //    $('#show_more_images').click(function() {
 //      $('#gallery > div > .thumbnail').css('display','block');
 //      $(this).hide(100);
 //    });
	//lightbox Galeria
 	var $lightbox = $('#lightbox');

    $('#gallery').on('click', function(event) {
        var $img = $(this).find('img'),
            src = $img.attr('src'),
            alt = $img.attr('alt'),
            css = {
                'maxWidth': $(window).width() - 100,
                'maxHeight': $(window).height() - 100
            };

        $lightbox.find('.close').addClass('hidden');
        $lightbox.find('img').attr('src', src);
        $lightbox.find('img').attr('alt', alt);
        $lightbox.find('img').css(css);
    });

    $lightbox.on('shown.bs.modal', function (e) {
        var $img = $lightbox.find('img');

        $lightbox.find('.modal-dialog').css({'width': $img.width()});
        $lightbox.find('.close').removeClass('hidden');
    });


$(function () {

    $('[data-toggle="tooltip"]').tooltip();
    $('figcaption a:first-child').lightBox();
    $('#opciones_paquete').tagsInput({width:'auto'});
    $('#salon_servicios').tagsInput({width:'auto'});
    $('input.rating').rating();

})
