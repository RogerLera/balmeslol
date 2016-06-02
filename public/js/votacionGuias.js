/* Función que hace una llamada ajax, para modificar la votación de la guía.
 Los parámetros que le llegan són: id de la guía, id del usuario y el tipo de
 votación (positivo o negativo). Una vez realiza la votación en la tabla, hace
 otra llamada ajax para canviar la votación en la vista de forma dinámica. */
function votacion(guiId, usuId, tipoVotacion) {
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
        data: 'guiId=' + guiId + '&usuId=' + usuId + '&tipo=' + tipoVotacion,
        // Si todo sale correctamente, realizamos otra llamada ajax.
        success: function(esNuevo) {
            $.ajax({
                // Tipo GET.
                type: 'GET',
                // URL (Controlador) que se encargará de realizar la actualización en la tabla guias.
                url: '/guias/votacion',
                // Datos a pasar con la URL.
                data: 'guiId=' + guiId + '&tipo=' + tipoVotacion + '&esNuevo=' + esNuevo,
                // Si todo sale correctamente, actualizamos los elementos con la nueva puntuación.
                success: function(resultado) {
                    $('#meGusta' + guiId).html(resultado[0]);
                    $('#noMeGusta' + guiId).html(resultado[1]);
                }
            });
        }
    });
}

function favorito(guiId, usuId, buttonId, metodo) {
    var texto = (metodo === 'POST') ? "Borrar favorito" : "Añadir favorito";
    var metodoSiguiente = (metodo === 'POST') ? "'DELETE'" : "'POST'";
    var clase = (metodo === 'POST') ? "glyphicon glyphicon-star" : "glyphicon glyphicon-star-empty";
    // Empezamos la llamada.
    $.ajax({
        // Tipo POST/DELETE.
        type: metodo,
        // Como cabezera le pasamos el token (asi solo los usuarios registrados podran votar).
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        // URL (Controlador) que se encargará de realizar la inserción de la votación a la base de datos.
        url: '/guias/favoritos',
        // Datos a pasar con la URL.
        data: 'guiId=' + guiId + '&usuId=' + usuId,
        // Si todo sale correctamente, actualizamos el elemento con el nuevo número.
        success: function(resultado) {
            alert(resultado);
            var button = $('#' + buttonId);
            button.attr('onclick','favorito(' + guiId + ', ' + usuId + ', this.id, ' + metodoSiguiente + ')');
            button.attr('class',clase);
        }
    });
}
