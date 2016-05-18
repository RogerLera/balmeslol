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
            var rolCampeon = $(this).find('[name="tag"]');
            // Creamos variable rolCampeon2 (ya que algunos campeones tienen 2 roles).
            var rolCampeon2 = null;
            // Comprobamos que el campeón tiene segundo rol, si el segundo objeto que nos llega (el hidden),
            // es undefined o no.
            if (typeof rolCampeon[1] !== 'undefined') {
                // Si no es undefined, introducimos el valor en la variable.
                rolCampeon2 = rolCampeon[1].defaultValue;
            }
            // Comprovamos si en alguno de los dos input existe el rol marcado.
            if (filtro === rolCampeon[0].defaultValue || filtro === rolCampeon2) {
                // Si coincide lo mostramos.
                $(this).show();
            } else {
                // Sinó lo escondemos.
                $(this).fadeOut();
            }
        });
    });
});
