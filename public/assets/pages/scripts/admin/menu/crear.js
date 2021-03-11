$(document).ready(function () {
    Intranet.validacionGeneral('form-general');
    $('#icono').on('blur', function () {
        $('#mostrar-icono').removeClass().addClass('fas fa-fw ' + $(this).val());
    });
});