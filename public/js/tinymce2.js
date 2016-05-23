tinymce.init({
    selector: "textarea",
    paste_data_images: true
});

$(function() {
    $("#imgTable tr td").click(function(event) {
        var imagen = $('img', this).attr('src');
        var nombre = $('img', this).attr('alt');
        tinymce.activeEditor.insertContent('<img alt="' + nombre + '" src="' + imagen + '"/>');
    });
});
