<script src="<?=base_url('assets/frontend/js/jssocials.js')?>"></script>
<script>
    $(document).ready(function(){
		$("#sharePopup").jsSocials({
			showCount: true,
			showLabel: true,
			shareIn: "popup",
			shares: [
				{ share: "twitter", label: "Twitter" },
				{ share: "facebook", label: "Facebook" },
				{ share: "googleplus", label: "Google+" },
				{ share: "linkedin", label: "Linked In" },
				{ share: "whatsapp", label: "Whats App" }
			]
		});
	});
	
	$('#simpankomentar').click(function(e){
		var productid				= $("#productid").val();
		var name					= $("#name").val();
		var email					= $("#email").val();
		var review					= $("#review").val();
		var reviewproduk			= $("#reviewproduk").val();
		var votes					= $("#votes").val();
		
		var string = $("#formreviewproduk").serialize();
		
		if(name.length==0){
			$("#name").focus();
			return false();
		}else
		if(email.length==0){
			$("#email").focus();
			return false();
		}
		else if(review.length==0){
			$("#review").focus();
			return false();
		}
		else if(review.length==0){
			$("#reviewproduk").focus();
			return false();
		}
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>komentar/comment_product",
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
</script>	