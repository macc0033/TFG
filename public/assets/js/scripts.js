/* Boton Borrar Campos De Formulario*/
$(document).ready(function () {
    //Cerrar Las Alertas Automaticamente
    $('.alert[data-auto-dismiss]').each(function (index, element) {
        const $element = $(element),
            timeout = $element.data('auto-dismiss') || 5000;
        setTimeout(function () {
            $element.alert('close');
        }, timeout);
    });
    
    //TOOLTIPS
    $('body').tooltip({
        trigger: 'hover',
        selector: '.tooltipsC',
        placement: 'top',
        html: true,
        container: 'body'
    });
    $('ul.nav').find('li.active').parents('li').children().addClass('active');
    $('ul.nav').find('li.active').parents('li').addClass('menu-open');

    //BUSQUEDA
    $('.busqueda').click(function() {
        $('#form-busqueda').css('display', 'block');
        $('.busqueda-close').css('display', 'block');
        $('.busqueda').css('display', 'none');
    });

    $('.busqueda-close').click(function() {
        $('#form-busqueda').css('display', 'none');
        $('.busqueda-close').css('display', 'none');
        $('.busqueda').css('display', 'block');
    });
});


