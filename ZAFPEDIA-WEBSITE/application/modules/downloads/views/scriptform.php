<script src="<?=base_url('assets/admin/pages/scripts/komponen.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/admin/pages/scripts/validateform.js');?>" type="text/javascript"></script>
		<script>
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
					toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image responsivefilemanager link",
					image_advtab: true,
					relative_urls: false,
					remove_script_host: false,
					convert_urls : true,
					filemanager_title:"Filemanager",
					filemanager_crossdomain: true,
					external_filemanager_path:"<?php echo base_url('assets/filemanager/')?>",
					filemanager_title:"Filemanager" ,
					external_plugins: { "filemanager" : "<?php echo base_url('assets/filemanager/plugin.min.js')?>"},
					//filemanager_access_key:"ahAi123"
				});
			function responsive_filemanager_callback(field_id){
				console.log(field_id);
				var image= jQuery('#'+field_id).val();
				$('#previewimage').attr('src',image).width(200).height(150);
			}
			
			function clear_img(){
				var imagen= '<?=base_url();?>/files/images/no-image.jpg';
				$('#previewimage').attr('src',imagen);
				$('#none_img').val('');
			}
			
			function clear_editimg(){
				var imagen='<?php if (isset($image)){echo $image;}?>';
				$('#previewimage').attr('src',imagen);
				$('#none_img').val(imagen);
				
			}
		</script>