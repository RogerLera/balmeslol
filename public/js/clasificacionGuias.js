function votacion(idGuia, idUser, elemento, tipoVotacion) {
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/guias/votacion',
        data: 'idGuia=' + idGuia + '&idUser=' + idUser + '&tipo=' + tipoVotacion,
        success: function(resultado) {
            $('#' + elemento).html(resultado);
        }
    });
    /*$.ajax({
            type: "POST",
            beforeSend: function(request) {
              return request.setRequestHeader('X-CSRF-Token',"{{ csrf_token() }}");
            },
            url: '/guias/' + id + '/clasificacion', //this would be your path to your route
            data:
            {
                html: 'tipo=' + tipo, //data separated by a comma
            },
            success: function(data){
                alert("Success");
              },
              error: function(xhr, textStatus, thrownError) {
                alert('Failed');
              }


});*/
}
