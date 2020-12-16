var AppTiny = function () {
	
	var base_url = 'https://bangipin.com/';

	var TinyMCE= function() {
		tinymce.init({
			selector: "textarea.editor1",
			theme: "modern",
			max_height: 300,
			min_height: 160,
			height : 300,
			plugins: [
				 "advlist autolink link image lists charmap print preview hr anchor pagebreak",
				 "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
				 "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
			],
			toolbar: "undo redo | styleselect fontselect fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent blockquote| image responsivefilemanager link unlink code",
			image_advtab: true,
			relative_urls: false,
			remove_script_host: false,
			convert_urls : true,
			filemanager_title:"Filemanager",
			filemanager_crossdomain: true,
			mobile: {
				theme: 'mobile',
				plugins: [ 'paste', 'print', 'preview', 'save' ,'fullpage', 'searchreplace', 'autolink' ,'directionality', 'visualblocks', 'visualchars' ,'fullscreen' ,'image' ,'link' ,'media' ,'template' ,'codesample' ,'table', 'charmap', 'hr' ,'pagebreak' ,'nonbreaking', 'anchor', 'toc', 'insertdatetime', 'advlist' ,'lists', 'textcolor', 'wordcount', 'imagetools', 'contextmenu' ,'colorpicker', 'textpattern', 'help', 'responsivefilemanager' ,'code' ,'codesample', 'emoticons' ,'importcss' ,'legacyoutput' ,'noneditable' ,'spellchecker' ,'tabfocus' ],
				toolbar: [ 'undo','bold', 'italic', 'underline','styleselect','image','bullist','numlist' ],
			},
			file_browser_callback_types: 'image file media', 
			file_browser_callback: function(cb, value, meta) {
				var input = document.createElement('input');
				input.setAttribute('type', 'file');
				input.setAttribute('accept', 'image/*');
				input.onchange = function() {
					var file = this.files[0];
				  
					var reader = new FileReader();
					reader.onload = function () {
						var id = 'blobid' + (new Date()).getTime();
						var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
						var base64 = reader.result.split(',')[1];
						var blobInfo = blobCache.create(id, file, base64);
						blobCache.add(blobInfo);

						// call the callback and populate the Title field with the file name
						cb(blobInfo.blobUri(), { title: file.name });
						};
						reader.readAsDataURL(file);
					};
				input.click();
			},
			external_filemanager_path: base_url+'assets/filemanager/',
			filemanager_title:"Filemanager" ,
			external_plugins: { "filemanager" : base_url+'assets/filemanager/plugin.min.js'},
			//filemanager_access_key:"ahAi123"
		});
		
		function responsive_filemanager_callback(field_id){
			console.log(field_id);
			var image= jQuery('#'+field_id).val();
			$('#previewimage').attr('src',image).width(200).height(150);
		}
		
		function clear_img(){
			var imagen= base_url + 'files/images/no-image.jpg';
			$('#previewimage').attr('src',imagen);
			$('#none_img').val('');
		}
	}
	return {
		init: function () {
			TinyMCE();
		}
	};
}();


jQuery(document).ready(function() {    
   AppTiny.init(); // init metronic core componets
});
