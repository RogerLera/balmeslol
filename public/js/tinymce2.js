$(document).ready(function() {
    var botones = [
        {'boton': 'botonHechizos', 'nombre': 'Hechizos', 'titulo': 'Escojer un hechizo', 'tabla' : ''},
        {'boton': 'botonCampeones', 'nombre': 'Campeones', 'titulo': 'Escojer un campeon' , 'tabla' : ''},
    ];
    var contenidoHtml;
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
            $.each(botones, function() {
                var titulo = this.titulo;
                var ruta = this.nombre.toLowerCase();
                editor.addButton(this.boton, {
                    // Nombre del botoón.
                    text: this.nombre,
                    // Icono para el botón (false = desactivado).
                    icon: false,
                    // Al apretar el botón realizaremos una funcion.
                    onclick: function() {
                        getJson(ruta);
                        setTimeout(function(){mostrarPopUp(editor.windowManager, titulo)}, 2000);
                    }
                });
            });
        },
        // Estilo que tendra el textarea.
        content_css: [
            '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });

    function mostrarPopUp(editor, tituloPopUp)
    {
        editor.open({
            // Título para el popup.
            title: tituloPopUp,
            height: 300,
            width: 800,
            scrollbars : "yes",
            // Contenido.
            body: [{
                // Tipo del contenido (contenedor html).
                type: 'container',
                classes: 'ola',
                // En contenido pasamos la variable hechizos con la tabla de imagenes.
                html: contenidoHtml
            }]
        });
    }

    // Función que obtiene todos los hechizos (llamada json) y los pasamos en formato tabla a la variable 'hechizos'.
    function getJson(ruta) {
        // Realizamos la llamada json.
        $.getJSON('/json/' + ruta, function(data) {
            // Creamos variable que almazenará la tabla con las imagenes.
            var tabla = '<table><tbody>';
            // Por cada objeto que nos llega en la llamada, hacemos una fila (con 4 columnas).
            $.each(data, function(n) {
                // Si n és uno acabamos y empezamos otra fila.
                if (n === 1) {
                    tabla += '<td><img src="' + this.imagen + '" alt="' + this.nombre + '"></td></tr><tr>';
                    // Si la división de n entre 4 da 0 como resultado, empezamos nueva fila.
                } else if (n % 4 === 0) {
                    tabla += '<tr><td><img src="' + this.imagen + '" alt="' + this.nombre + '"></td>';
                    // Quando no sea divisible por 4, introducimos a la variable una columna.
                } else {
                    tabla += '<td><img src="' + this.imagen + '" alt="' + this.nombre + '"></td>';
                }
            });
            // Cerramos la tabla.
            tabla += '</tbody></table>';
            contenidoHtml = tabla;
        });
    }
});
