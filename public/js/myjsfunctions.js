$(document).ready(function() {
    $("#buscarcampeon").keyup(function() {

        // Recogemos el valor que haya escrito en el input.
        var filtro = $(this).val();

        // Hacemos un bucle por cada champinfo.
        $(".champ-box").each(function() {

            // Si el texto no contiene el valor lo ocultamos.
            if ($(this).text().search(new RegExp(filtro, "i")) < 0) {
                $(this).fadeOut();
                // Si lo tiene lo mostramos.
            } else {
                $(this).show();
            }
        });
    });

    $("#filtrarcampeon").change(function() {

        // Recojemos el valor de la opción del select escogida.
        var filtro = $(this).val();
        // Hacemos un bucle por cada campeón.
        $(".champ-box").each(function() {
            // Recojemos en una variable los valores de los inputs hidden.
            var rolCampeon = $(this).find('[name="tag"]').val();
            // Comparamos con el filtro si coincide con el rol del campeón.
            if (filtro === rolCampeon) {
                // Si coincide lo mostramos.
                $(this).show();
            } else {
                // Sinó lo escondemos.
                $(this).fadeOut();
            }
        });
    });
});
