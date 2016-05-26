function ola(obj)
{
    console.log(obj);
    var imageUrl2 = '<img src="' + obj.src + '">';
    var imageUrl = imageUrl2.replace('"&quot;','');
    console.log(imageUrl);
    window.parent.tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, imageUrl);
    window.parent.tinyMCE.activeEditor.windowManager.close();
}
