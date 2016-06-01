/* Función que hace una llamada ajax, para modificar la votación de la guía.
 Los parámetros que le llegan són: id de la guía, id del usuario, elemento a
 cambiar la votación (el número), y el tipo de votación (positivo o negativo). */
function votacion(idGuia, idUser, elemento, tipoVotacion) {
    // Empezamos la llamada.
    $.ajax({
        // Tipo POST.
        type: 'POST',
        // Como cabezera le pasamos el token (asi solo los usuarios registrados podran votar).
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        // URL (Controlador) que se encargará de realizar la inserción de la votación a la base de datos.
        url: '/guias/votacion',
        // Datos a pasar con la URL.
        data: 'idGuia=' + idGuia + '&idUser=' + idUser + '&tipo=' + tipoVotacion,
        // Si todo sale correctamente, actualizamos el elemento con el nuevo número.
        success: function(resultado) {
            $('#' + elemento).html(resultado);
        }
    });
}
