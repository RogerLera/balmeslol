tinymce.init({
  selector: 'textarea',
  height: 200,
  toolbar: 'botonHechizos',
  menubar: false,
  setup: function (editor) {
    editor.addButton('botonHechizos', {
      text: 'Hechizos',
      icon: false,
      onclick: function () {
        editor.insertContent('&nbsp;<b>It\'s my button!</b>&nbsp;');
      }
    });
  },
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});
