tinymce.init({
    mode : "textareas",
    editor_selector: "guia",
    height: 200,
    toolbar: 'botonHechizos',
    menubar: false,
    setup: function(editor) {
        editor.addButton('botonHechizos', {
            text: 'Hechizos',
            icon: false,
            onclick: function() {
                editor.windowManager.open({
                    title: "Escojer un hechizo",
                    body: [{
                        type: 'container',
                        name: 'container',
                        label: 'container',
                        html: '<img src=" https://ddragon.leagueoflegends.com/cdn/6.9.1/img/spell/SummonerExhaust.png" alt="Extenuación">'
                    }],
                    onsubmit: function(e) {
                            editor.focus();
                            console.log(e);
                            editor.selection.setContent(e.data.source);
                        }
                        /*width: 700,
                        height: 600,
                        inline: true,
                        close_previous: "yes"*/
                }, {
                    arg1: 42,
                    arg2: "Hello world"
                });
                //editor.insertContent('<img alt="sd" src=" https://ddragon.leagueoflegends.com/cdn/6.9.1/img/spell/SummonerClairvoyance.png"/>');
            }
        });
    },
    content_css: [
        '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
        '//www.tinymce.com/css/codepen.min.css'
    ]
});

function reverseGeocodeAddress() {
    $.ajax({
        type: "GET",
        url: './geo-info-response',
        data: "",
        success: function() {
            console.log("Geodata sent");
        }
    });
}
