$(document).ready(function() {
    var botones = [{
        'boton': 'botonHechizos',
        'nombre': 'Hechizos',
        'titulo': 'Escojer un hechizo',
        'ruta': '/json/hechizos',
        'width': 400,
        'height': 170
    }, {
        'boton': 'botonCampeones',
        'nombre': 'Campeones',
        'titulo': 'Escojer un campeon',
        'ruta': '/json/campeones',
        'width': 590,
        'height': 400
    }, ];
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
                var datos = this;
                editor.addButton(datos.boton, {
                    // Nombre del botoón.
                    text: datos.nombre,
                    // Icono para el botón (false = desactivado).
                    icon: false,
                    // Al apretar el botón realizaremos una funcion.
                    onclick: function() {
                        mostrarPopUp(editor.windowManager, datos);
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

    function mostrarPopUp(editor, datos) {
        editor.open({
            // Título para el popup.
            title: datos.titulo,
            // Contenido.
            url: datos.ruta,
            width: datos.width,
            height: datos.height,
            // Contenido.
        });
    }
});
