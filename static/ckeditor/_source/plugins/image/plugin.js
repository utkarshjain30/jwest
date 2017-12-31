CKEDITOR.plugins.add('imgupload', {
    init: function(editor) {
        editor.addCommand('imgupload', new CKEDITOR.dialogCommand('imgupload'));
        editor.ui.addButton('imgupload',
                        {
                            label: editor.lang.common.image + ' ' + editor.lang.common.upload,
                            command: 'imgupload',
                            icon: this.path + 'imgupload.png'
                        });
        CKEDITOR.dialog.add('imgupload', this.path + 'dialogs/imgupload.js');
    }
});