/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/


CKEDITOR.editorConfig = function(config) {
    
	
	config.uploadUrl      = '[[softurl]]/mail.cgi';
	config.imageUploadUrl = '[[softurl]]/mail.cgi';
	
    
   config.filebrowserBrowseUrl      = '[[wwwurl]]/dada_mail_support_files/RichFilemanager/index.html?type=files&rand_string=' + rand_string();
   config.filebrowserImageBrowseUrl = '[[wwwurl]]/dada_mail_support_files/RichFilemanager/index.html?type=images&rand_string=' + rand_string();
   config.filebrowserFlashBrowseUrl = '[[wwwurl]]/dada_mail_support_files/RichFilemanager/index.html?type=flash&rand_string=' + rand_string();
   config.filebrowserUploadUrl      = null;
   config.filebrowserImageUploadUrl = null;
   config.filebrowserFlashUploadUrl = null;
   config.removeDialogTabs = 'link:upload;image:Link;image:Upload';
                   
   
   config.height                    = '30em';

   config.fullPage                  = true;
   config.startupOutlineBlocks      = true;  



   config.allowedContent            = true;

   config.disallowedContent         = 'img{width,height}';
   config.extraAllowedContent       = 'img[alt,border,width,height,align,vspace,hspace,!src];';
   
    
   config.strinsert_button_label    = 'Tags';
   config.strinsert_button_title    = 'Tags';
   config.strinsert_button_voice    = 'Tags';
   
   config.extraPlugins              = 'strinsert,image2,uploadimage';
   config.removePlugins             = 'image,exportpdf'; 
   
   
   config.toolbar_DadaMail_Admin    =
    [
        { name: 'basicstyles',    items : [ 'strinsert', 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
        { name: 'styles',         items : [ 'Styles','Format','Font','FontSize' ] },
        { name: 'colors',         items : [ 'TextColor','BGColor' ] },
        '/',
        { name: 'paragraph',      items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
        { name: 'links',          items : [ 'Link','Unlink','Anchor' ] },
        { name: 'insert',         items : [ 'Image','Table','HorizontalRule','Smiley','SpecialChar' ] },
        '/',
        { name: 'clipboard',      items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
        { name: 'editing',        items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
        { name: 'document',       items : [ 'Source','Maximize', 'ShowBlocks'] },
    ];
};

function rand_string() { 
	return Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
}

