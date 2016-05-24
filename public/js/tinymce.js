$(document).ready(function() {

    // Variable global 'hechizos', que almazena todos los hechizos.
    var hechizos;
    // Llamamos a la funcion 'jsonHechizos' para rellenar la variable 'hechizos'.
    jsonHechizos();

    // Instanciamos elplugin tinymce (WYSIWYG HTML Editor).
    tinymce.init({
        // Que afecte namás a los 'textarea' con clase 'guia'.
        mode: "textareas",
        editor_selector: "guia",
        // Tendrá una longitud de 200px.
        height: 200,
        // Boton creado para los hechizos.
        toolbar: ['botonHechizos', 'botonCampeones'],
        // No mostramos el menú por defecto.
        menubar: false,
        // Al completarse, empezamos función con el editor pasado por variable.
        setup: function(editor) {
            // Creamos array (almazenará src y alt selecionados).
            var arrayHechizos = [];
            // Variable que formará la imagen en el textarea.
            var hechizoAMostrar = '';
            // Creamos el boton a nuestro gusto, añadiendo las funcionalidades.
            editor.addButton('botonHechizos', {
                // Nombre del botoón.
                text: 'Hechizos',
                // Icono para el botón (false = desactivado).
                icon: false,
                // Al apretar el botón realizaremos una funcion.
                onclick: function() {
                    // Abriremos un popup.
                    editor.windowManager.open({
                        // Título para el popup.
                        title: "Escojer un hechizo",
                        // Contenido.
                        body: [{
                            // Tipo del contenido (contenedor html).
                            type: 'container',
                            // En contenido pasamos la variable hechizos con la tabla de imagenes.
                            html: hechizos
                        }],
                        // Al apretar en una imagen.
                        onclick: function(e) {
                            editor.focus();
                            // Comprovamos si el target (tag) que nos llega contiene src
                            //(para diferenciar entre imagenes y otros tags).
                            if (typeof e.target.currentSrc !== 'undefined') {
                                // Si es una imagen pasamos el alt y el src al array.
                                arrayHechizos.push({
                                    'alt': e.target.alt,
                                    'src': e.target.currentSrc
                                });
                            // Si no es una imagen (solo pueden ser boton 'OK' o 'Cancelar').
                            } else {
                                // Por cada imagen guardada en el array.
                                $.each(arrayHechizos, function() {
                                    // Montamos en la variable 'hechizoAMostrar' una imagen.
                                    hechizoAMostrar += '<img src="' + this.src + '" alt="' + this.alt + '">';
                                });
                                // Pasamos las imagenes al editor.
                                editor.selection.setContent(hechizoAMostrar);
                                // Reseteamos variables.
                                hechizoAMostrar = '';
                                arrayHechizos = [];
                            }
                        },
                    });
                }
            });
            editor.addButton('botonCampeones', {
                // Nombre del botoón.
                text: 'Campeones',
                // Icono para el botón (false = desactivado).
                icon: false,
            });
        },
        // Estilo que tendra el textarea.
        content_css: [
            '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });

    // Función que obtiene todos los hechizos (llamada json) y los pasamos en formato tabla a la variable 'hechizos'.
    function jsonHechizos() {
        // Realizamos la llamada json.
        $.getJSON('/json/hechizos', function(data) {
            // Creamos variable que almazenará la tabla con las imagenes.
            var tablaHechizos = '<table><tbody>';
            // Por cada objeto que nos llega en la llamada, hacemos una fila (con 4 columnas).
            $.each(data, function(n) {
                // Si n és uno acabamos y empezamos otra fila.
                if (n === 1) {
                    tablaHechizos += '<td><img src="' + this.imagen + '" alt="' + this.nombre + '"></td></tr><tr>';
                    // Si la división de n entre 4 da 0 como resultado, empezamos nueva fila.
                } else if (n % 4 === 0) {
                    tablaHechizos += '<tr><td><img src="' + this.imagen + '" alt="' + this.nombre + '"></td>';
                    // Quando no sea divisible por 4, introducimos a la variable una columna.
                } else {
                    tablaHechizos += '<td><img src="' + this.imagen + '" alt="' + this.nombre + '"></td>';
                }
            });
            // Cerramos la tabla.
            tablaHechizos += '</tbody></table>';
            // Pasamos a la variable global 'hechizos' toda la tabla.
            hechizos = tablaHechizos;
        });
    }
});
