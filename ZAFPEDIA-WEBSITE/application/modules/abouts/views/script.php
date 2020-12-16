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
		</script>