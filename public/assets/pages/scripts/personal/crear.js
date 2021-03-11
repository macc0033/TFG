$(document).ready(function () {
    Intranet.validacionGeneral('form-general');
});

$("#provincia").change(function(){
    $.ajax({
        url: '/ajax/select/localidades/'+$(this).val(),
        method: 'GET',
        success: function(data) {
            $('#localidad').html(data);
        },
    });
});