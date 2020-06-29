<script>
	function post(a){
		$('#message').hide();
		$.ajax({
					type: 'POST',
					url: $(a).attr('action'),
					data: $(a).serialize(),
					success: function(data) {
						$('#message').fadeIn('slow').html(data);
					}
				});
				return false;
	}
	
	window.onload = function() {
		document.getElementById("denda").focus();
	};
	$(document).ready(function() { 
		$("#denda").keypress(function(data){
			if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
				return false;
			}
		});

	});

</script>

<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<?=$title;?>
		</h1>
	</section>	
	<section class="content">
		<div class="row">
			<div class="col-sm-12">
				<div class="box">
					<div class="box-body">
						<?php 
							echo $this->session->flashdata('message');
						?>
						<div id="message"></div>
						<form method="post" accept-charset="utf-8" role="form" action="<?= base_url() ?>admin/simpandenda/" onsubmit="return post(this);">
							<input type="hidden" class="form-control" name="id" id="id" value="<?=$id;?>">
							<div class="form-group">
								<label for="name">Nominal Denda:</label>
								<input type="text" class="form-control" name="denda" id="denda" placeholder="Nominal Denda" value="<?=$denda;?>">
							</div>
							<button type="submit" class="btn btn-default">Update</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>