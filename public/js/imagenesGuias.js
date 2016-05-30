var contenido;
if ($('div').hasClass('borde')) {
    $('div.borde').on('click', function(e) {

        contenido = 'ok';
        console.log(e);
        // Accedemos a la ventana padre del iframe (popup), i en el tinyMCE, executamos el
        // comando de inserir contenido, introduciendo la imagen.
        window.parent.tinyMCE.activeEditor.execCommand('mceInsertContent', 0, contenido);
        // Finalmente cerramos el iframe.
        window.parent.tinyMCE.activeEditor.windowManager.close();
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
