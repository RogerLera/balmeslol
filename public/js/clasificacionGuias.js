function clasificacion(id, elemento, tipo) {
    $.ajax({
        type: 'POST',
        url: '/guias/' + id + '/clasificacion',
        data: 'tipo=' + tipo,
        success: function(resultado) {
            if (resultado == 'err') {
                alert('Some problem occured, please try again.');
            } else {
                $('#' + elemento).html(resultado);
            }
        }
    });
}
