// Quando se haga click en una imagen del popup, pasaremos el elemento selecionado por la función.
$('img').on("click", function (e) {
      console.log(e.currentTarget.src);
      // Guardamos en la variable imagen un string de un tag '<img>' con el src y el
      // alt de la imagen que hemos apretado.
      var imagen = '<img style="width:50px;height:50px;" src="' + e.currentTarget.src +
      '" alt="' + e.currentTarget.alt + '">';
      // Accedemos a la ventana padre del iframe (popup), i en el tinyMCE, executamos el
      // comando de inserir contenido, introduciendo la imagen.
      window.parent.tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, imagen);
      // Finalmente cerramos el iframe.
      window.parent.tinyMCE.activeEditor.windowManager.close();
 });
