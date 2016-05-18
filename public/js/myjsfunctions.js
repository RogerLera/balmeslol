$(document).ready(function() {
    $("#buscarcampeon").keyup(function() {

        // Recogemos el valor que haya escrito en el input
        var filter = $(this).val();

        // Hacemos un bucle por cada champinfo
        $(".champ-box").each(function() {

            // Si el texto no contiene el valor lo ocultamos
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();
                // Si lo tiene lo mostramos
            } else {
                $(this).show();
            }
        });
    });

    $("#filtrarcampeon").change(function() {

        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val();
        // Loop through the comment list
        $(".champ-box").each(function() {
            // If the list item does not contain the text phrase fade it out
            //if ($('input').val().search(new RegExp(filter, "i")) < 0) {
            //    $(this).fadeOut();
                // Show the list item if the phrase matches
            //} else {
            //    $(this).show();
            //}
            var prueba = $(this).find('[name="tag"]').val();
            var todo = "";
            if (filter === prueba) {
                $(this).show();
            } else {
                $(this).fadeOut();
            }
        });
    });
});
