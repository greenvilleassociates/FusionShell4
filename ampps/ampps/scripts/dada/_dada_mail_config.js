tinymce.init({


 
    file_browser_callback: function(field_name, url, type, win) { 
        // from http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript
        var w = window,
        d = document,
        e = d.documentElement,
        g = d.getElementsByTagName('body')[0],
        x = w.innerWidth || e.clientWidth || g.clientWidth,
        y = w.innerHeight|| e.clientHeight|| g.clientHeight;

        var cmsURL = '[[wwwurl]]/dada_mail_support_files/RichFilemanager/index.html?&field_name='+field_name+'&lang='+tinymce.settings.language;

        if(type == 'image') {            
            cmsURL = cmsURL + "&type=images";
        }

        tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
        });   
    },


    selector:              "textarea#html_message_body",
    height:                "30em", 
    image_advtab :          true,
    paste_data_images :     true,
    convert_fonts_to_spans : true,
    element_format :         "xhtml",
    entity_encoding :        "names",
    keep_styles:             true,
    protect: [
         /<\?dada.*?\?>/g
     ],
     visual: true, 
     convert_urls: false, 
     relative_urls: false,
     
      
     document_base_url :     "[[wwwurl]]/dada_mail_support_files/",
     
     remove_script_host: false, 
     visualblocks_default_state: true,
    
    plugins: [
        "autoresize advlist autolink lists link image charmap preview hr anchor ",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "nonbreaking table contextmenu directionality",
        "emoticons paste textcolor fullpage"
    ],

    toolbar1 : "undo redo  | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect | bullist numlist outdent indent | link image",
    toolbar2 : "preview | forecolor backcolor emoticons code fullpage", 
	
	setup: function(editor) {
	  editor.on('PreInit', function() {
	    editor.parser.addNodeFilter('#cdata', function(nodes) {
	      for (var i = 0; i < nodes.length; i++) {
	        nodes[i].remove();
	      }
	    });
	  });
	}
	
    
 });