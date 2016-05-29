$(document).ready(function() {
    // Variable botones, contiene la información de cada boron personalizada (tamaño popup, nombres títulos, ...).
    var botones = [{
        'boton': 'botonHechizos',
        'nombre': 'Hechizos',
        'titulo': 'Escojer un hechizo',
        'ruta': '/json/hechizos',
        'width': 400,
        'height': 130,
    }, {
        'boton': 'botonCampeones',
        'nombre': 'Campeones',
        'titulo': 'Escojer un campeon',
        'ruta': '/json/campeones',
        'width': 590,
        'height': 400,
    }, ];
    // Inicializamos el plugin tinymce (WYSIWYG HTML Editor).
    tinymce.init({
        // Que afecte namás a los 'textarea' con clase 'guia'.
        mode: "textareas",
        editor_selector: "guia",
        // Tendrá una altura de 200px.
        height: 200,
        // En las herramientas insertamos un array (cada posición es una fila), con los botones que ya incorpora tinymce para editar texto
        // (primera fila), y los botones personalizados para mostrar las imagenes (segunda fila).
        toolbar: [
            'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
            'botonHechizos | botonCampeones'
        ],
        // No mostramos el menú por defecto, ya que ya tenemos los botones en el toolbar.
        menubar: false,
        // Al completarse, empezamos función con el editor pasado por variable.
        setup: function(editor) {
            // Por cada objeto en el array 'botones', instanciamos un boton en el toolbar (en el toolbar tiene que estar definido
            // el nombre del botón, i coincidir con el atributo 'boton' del objeto).
            $.each(botones, function() {
                // Recojemos en la variable datos el objeto pasado, ya que para usarlo en funciones internas,
                // no podemos pasar el 'this' o sus atributos como parámetros.
                var datos = this;
                // Añadimos el botón con el nombre como parámetro.
                editor.addButton(datos.boton, {
                    // Nombre del botón.
                    text: datos.nombre,
                    // Icono para el botón (false = desactivado).
                    icon: false,
                    // Al apretar el botón realizaremos una funcion.
                    onclick: function() {
                        // Llamamos a la función mostrarPopUp.
                        mostrarPopUp(editor.windowManager, datos);
                    },
                });
            });
        },
        // Estilo que tendra el textarea (fuentes de tinymce).
        content_css: [
            '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '//www.tinymce.com/css/codepen.min.css'
        ],
    });

    // Función que inserta el contenido de cada botón.
    // Recive el el popup (windowManager) y el objeto.
    function mostrarPopUp(editor, datos) {
        // Abrimos el popup e insertamos las variables dentro.
        editor.open({
            // Título para el popup.
            title: datos.titulo,
            // Contenido (html con los datos a mostrar).
            url: datos.ruta,
            // Tamaño del popup.
            width: datos.width,
            height: datos.height,
        });
    }
});
