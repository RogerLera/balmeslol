// Variable contenido que pasamos al editor de tinyMCE.
var contenido;
var prova = $('span.mce-txt').parent().context.URL.split('/');

// Comprobamos si nos llega un div (para las runas que són imagen más texto).
if ($('div').hasClass('borde')) {
    // Quando apretemos el div, cridem a una funció anónima que pasa com a parámetre el element seleccionat.
    $('div.borde').on('click', function(e) {
        // Añadimos a la variable 'contenido' la imagen y el texto de la ventana de las runas.
        contenido = '<img style="width:50px;height:50px;" src="' + e.currentTarget.childNodes[0].currentSrc +
            '" alt="' + e.currentTarget.childNodes[0].alt + '">' + e.currentTarget.childNodes[1].innerText;
        // Accedemos a la ventana padre del iframe (popup), i en el tinyMCE, executamos el
        // comando de inserir contenido, introduciendo la imagen.
        window.parent.tinyMCE.activeEditor.execCommand('mceInsertContent', 0, contenido);
        // Finalmente cerramos el iframe.
        window.parent.tinyMCE.activeEditor.windowManager.close();
    });
    // Si no llega un div, solo una imagen, realizamos lo siguiente.
} else if (prova[prova.length - 1] == 'campeones?habilidades=true') {
    $('img').on('click', function(e) {
        window.parent.tinyMCE.activeEditor.windowManager.open({
            // Título para el popup.
            title: 'Selecionar una habilidad',
            // Contenido (html con los datos a mostrar).
            url: '/json/habilidades/' + e.currentTarget.id,
            // Tamaño del popup.
            width: 390,
            height: 120,
        });
    });
} else {
    // Quando se haga click en una imagen del popup, pasaremos el elemento selecionado por la función.
    $('img').on('click', function(e) {
        // Guardamos en la variable imagen un string de un tag '<img>' con el src y el
        // alt de la imagen que hemos apretado.
        contenido = '<img style="width:50px;height:50px;" src="' + e.currentTarget.src +
            '" alt="' + e.currentTarget.alt + '">';
        // Accedemos a la ventana padre del iframe (popup), i en el tinyMCE, executamos el
        // comando de inserir contenido, introduciendo la imagen.
        window.parent.tinyMCE.activeEditor.execCommand('mceInsertContent', 0, contenido);
        // Finalmente cerramos el iframe.
        window.parent.tinyMCE.activeEditor.windowManager.close();
    });
}
