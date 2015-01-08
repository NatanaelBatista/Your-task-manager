/*Configurações de carregamento do Editor Creditor*/
$(function() {
     CKEDITOR.replace( 'recado', {
        uiColor: '#f9f8f8',
        toolbar: [
          [ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
          [ 'FontSize', 'TextColor', 'BGColor','PasteFromWord','Undo', 'Redo','Format','JustifyLeft'],
          ['Image','Maximize']
        ]
      });

});