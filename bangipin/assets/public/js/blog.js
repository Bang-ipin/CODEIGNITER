var AppBlog = function() {
	var base_url = 'https://bangipin.com/';

	var share = function() {
		$("#sharePopup").jsSocials({
			showCount: true,
			showLabel: true,
			shareIn: "popup",
			shares: [
				{ share: "email", label: "Mail" },
				{ share: "twitter", label: "Twitter" },
				{ share: "facebook", label: "Facebook" },
				{ share: "googleplus", label: "Google+" },
				{ share: "linkedin", label: "LinkedIn" },
				{ share: "whatsapp", label: "WhatsApp" },
			]
		});
	}
	
	var komentarBlog = function() {
		$('#simpankomentarblog').click(function(e){
			var blogid					= $("#blogid").val();
			var nama					= $("#nama").val();
			var email					= $("#email").val();
			var message					= $("#message").val();
			
			var string = $("#formkomentarblog").serialize();
			
			if(nama.length==0){
				$("#nama").focus();
				return false;
			}else
			if(email.length==0){
				$("#email").focus();
				return false;
			}
			else if(message.length==0){
				$("#message").focus();
				return false;
			}
			
			$.ajax({
				type	: 'POST',
				url		: base_url+'komentar/comment_blog',
				data	: string,
				cache	: false,
				success	: function(data){
					console.log(data);
					swal("Success!", "Komentar Terkirim dan di moderasi!", "success");
				},
					  error:function(data){
					 swal("Oops...", "Something went wrong :(", "error");
				}
			});
			 e.preventDefault(); 		
		});
	}
	return {
		init: function () {
			share();
			komentarBlog();
		}
	}
}();
jQuery(document).ready(function() {    
   AppBlog.init(); // init metronic core componets
});