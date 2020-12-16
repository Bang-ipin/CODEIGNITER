<script>
    $('#simpankomentarblog').click(function(e){
		var blogid					= $("#blogid").val();
		var nama					= $("#nama").val();
		var email					= $("#email").val();
		var message					= $("#message").val();
		var messageid				= $("#messageid").val();
		
		var string = $("#formkomentarblog").serialize();
		
		if(nama.length==0){
			$("#nama").focus();
			return false();
		}else
		if(email.length==0){
			$("#email").focus();
			return false();
		}
		else if(message.length==0){
			$("#message").focus();
			return false();
		}
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>komentar/comment_blog",
			data	: string,
			cache	: false,
			success	: function(data){
				window.location.reload('<?=site_url();?>');
			},
			error : function(xhr, ajaxOptions, thrownError) {
				return false;
			}
		});
		return false();		
	});
	
	function balaskomentar(id){
		
		var komenid = $("#komenkomen");
		var commentid = $("#replycommentid").val(id);
		komenid.show();
		
	};
	function hidebalaskomentar(){
		
		$("#komenkomen").hide();
		
	};


	$(function () {
		$('#replyformkomentarblog').submit(function (e) {
			var replyblogid 		= $('#replyblogid').val();
			var replycommentid 		= $('#replycommentid').val();
			var replykomentar		= $('#replykomentar').val();
			if(replykomentar ==null || replykomentar==''){
				$('#replykomentar').focus();
				return exit;
			}
			$.ajax({
				type: 'post',
				url: '<?= site_url('komentar/replycomment_blog');?>',
				data: $('form').serialize(),
				success: function (data) {			
					window.location.reload('<?=site_url();?>');
				}
			});
			e.preventDefault();
		});
	});
</script>