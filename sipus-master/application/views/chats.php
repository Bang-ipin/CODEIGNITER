<script type="text/javascript">
    tampil_data();
	function tampil_data(){
        var nis = "<?=$this->session->userdata('nis');?>";
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url('anggota/inboxdetail'); ?>",
			data	: "nis="+nis,
			cache	: false,
			success	: function(data){
				$("#tampil_data").html(data);
			}
		});
	}
    $("#Simpans").on('click',function(event){
		event.preventDefault();
		
		var inbox		= $("#inbox").val();
        var string      = $("#FormPesan").serialize();
        if(inbox.length==0){
            $("#inbox").focus();
            return;
        }
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url('anggota/kirimpesan'); ?>",
			data	: string,
            error : function(xhr, ajaxOptions, thrownError) {
                            return false;
                        }, 
			success	: function(data){
				tampil_data();
				$("#inbox").val('');
			}
		});
		
	});
</script>

    <div id="tampil_data"></div>
    <section>
        <br/>
        <div class="add-review row">
            <div class="col-sm-8 col-xs-12">
                <div class="new-review-form">
                    <?=form_open('',array('id'=>"FormPesan"));?>
                            <div class="col-md-12">
                                <textarea style="margin: 0px; width: 532px; height: 72px;" class="form-control" name="inbox" id="inbox"></textarea>
                            <div id="error-review"></div>
                            </div>
                    <?=form_close();?>
                </div>
            </div>
        </div>
    </section>
           