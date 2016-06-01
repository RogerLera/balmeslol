$(document).ready(function() {

    /* -- CAMPEONES -- */

    /* Buscador de campeones por nombres. */
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
                $(this).fadeIn();
            }
        });
    });

    /* Filtrado de campeones por etiquetas (select). */
    $("#filtrarcampeon").change(function() {

        // Recojemos el valor de la opción del select escogida.
        var filtro = $(this).val();

        // Hacemos un bucle por cada campeón.
        $(".champ-box").each(function() {
            //Desglosamos el filtro para saber que quiere filtrar el usuario
            if (filtro == "Todos") {
                $(this).fadeIn();
            } else if (filtro != "Gratis") {
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
                    $(this).fadeIn();
                } else {
                    // Sinó lo escondemos.
                    $(this).fadeOut();
                }
            } else {
                // Recojemos en una variable los valores de los inputs hidden.
                var campeonGratuito = $(this).find('[name="gratis"]').val();
                // Comprovamos si el campeon tiene el input gratis o no
                if (filtro === campeonGratuito) {
                    // Si coincide lo mostramos.
                    $(this).fadeIn();
                } else {
                    // Sinó lo escondemos.
                    $(this).fadeOut();
                }
            }
        });
    });

    /* -- OBJETOS -- */

    /* Buscar objetos por nombre. */
    $("#buscarobjeto").keyup(function() {

        // Recogemos el valor que haya escrito en el input.
        var filtro = $(this).val();

        // Hacemos un bucle por cada champinfo.
        $(".object-box").each(function() {

            // Si el texto no contiene el valor lo ocultamos.
            if ($(this).text().search(new RegExp(filtro, "i")) < 0) {
                $(this).fadeOut();
                // Si lo tiene lo mostramos.
            } else {
                $(this).fadeIn();
            }
        });
    });

    /* Buscar objetos por filtrado (checkbox). */
    // Variable que guarda en un array los filtros marcados del checkbox.
    var filtrosActivos = [];

    // Buscamos todos los tags que tengan la clase 'filtroObjeto', i cada vez que cambie
    //(sea marcado o desmarcado) entre en la función.
    $('.filtroObjeto').change(function() {
        // Cojemos el valor marcado del checkbox.
        var filtro = $(this).val();
        // Comprovamos si han marcado (true) o desmarcado (false).
        if (this.checked) {
            // Si lo han marcado, hacemos push en el array con el valor.
            filtrosActivos.push(filtro);
        } else {
            // Si lo han desmarcado, lo eliminamos del array.
            filtrosActivos.splice(filtrosActivos.indexOf(filtro), 1);
        }

        // Si filtrosActivos es más grande de 0 (como mínimo han marcado uno).
        if (filtrosActivos.length > 0) {
            // Por cada objeto.
            $(".object-box").each(function() {
                // Obtenemos las etiquetas (hidden).
                var etiquetaObjeto = $(this).find('[name="tag"]');
                // Boolean que se pondrá a true si coincide alguna etiqueta con la seleccionada.
                var esta = false;

                // Si el array filtrosActivos es mayor de 1.
                if (filtrosActivos.length > 1) {
                    // Creeamos array buscar, que contendrá las etiquetas del objeto.
                    var buscar = [];

                    // Si contiene más de una etiqueta (array).
                    if (typeof etiquetaObjeto[1] !== 'undefined') {
                        // Hacemos bucle para cojer todas las etiquetas.
                        for (var n = 0; n < etiquetaObjeto.length; n++) {
                            // Las pasamos al array buscar.
                            buscar.push(etiquetaObjeto[n].defaultValue);
                        }
                        // Si todas las etiquetas de filtrosActivos están en buscar, devolverá true, sinó false.
                        esta = compararTags(buscar, filtrosActivos);
                    }
                // Si filtrosActivos contiene una etiqueta.
                } else {
                    // Si contiene más de una etiqueta (array).
                    if (typeof etiquetaObjeto[1] !== 'undefined') {
                        // Hacemos bucle para cojer todas las etiquetas.
                        for (var n = 0; n < etiquetaObjeto.length; n++) {
                            // Comrpovamos si la etiqueta coincide con alguna del objeto.
                            if (filtrosActivos[0] === etiquetaObjeto[n].defaultValue) {
                                // En caso afirmativo pasamos el boolean esta a true.
                                esta = true;
                            }
                        }
                    // Si el objeto solo tiene una etiqueta.
                    } else {
                        // Comprovamos el que coincida.
                        if (filtrosActivos[0] === etiquetaObjeto[0].defaultValue) {
                            // En caso afirmativo pasamos el boolean esta a true.
                            esta = true;
                        }
                    }
                }
                // Si el booelan 'esta' es true.
                if (esta) {
                    // Mostramos el objeto.
                    $(this).fadeIn();
                } else {
                    // Sinó lo escondemos.
                    $(this).fadeOut();
                }
            });
        // Si el array filtrosActivos está vacio, mostramos todos los objetos.
        } else {
            $(".object-box").fadeIn();
        }
    });
});

// Función que compara dos arrays, y comprueba que el array a buscar contenga los valores del otro.
function compararTags(buscar, comparar)
{
    // Ordenamos los arrays.
    buscar.sort();
    comparar.sort();
    // Creamos variables contador para el bucle.
    var i, j;
    // Creamos bucle.
    for (i = 0, j = 0; i < buscar.length && j < comparar.length;) {
        // Comparamos si el string del array 'buscar' coincide con el de 'comparar'.
        if (buscar[i].localeCompare(comparar[j]) !== 0) {
            // Si no coincide aumentamos la variable i.
            ++i;
        // Si coinciden, aumentamos ambas variables.
        } else if (buscar[i] == comparar[j]) {
            ++i;
            ++j;
        // Si no coinciden, devolvemos false.
        } else {
            return false;
        }
    }
    // Comprovamos que no hay más elementos a comparar.
    return j == comparar.length;
}
