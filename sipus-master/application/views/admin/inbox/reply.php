<script type="text/javascript">
    tampil_data();
	function tampil_data(){
        var id = "<?=$viewinbox;?>";
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url('admin/inboxdetail'); ?>",
			data	: "id="+id,
			cache	: false,
			success	: function(data){
				$("#tampil_data").html(data);
			}
		});
	}
    
</script>

    <div id="tampil_data"></div>
    <section>
        <br/>
        <div class="add-review row">
            <div class="col-sm-8 col-xs-12">
                <div class="new-review-form">
                    <?=form_open('',array('id'=>"FormPesanBalasan"));?>
                            <div class="col-md-12">
                                <input type="hidden" style="margin: 0px; width: 532px; height: 72px;" class="form-control" name="inboxid" id="inboxid" readonly value="<?=$viewinbox;?>">
                                <textarea style="margin: 0px; width: 532px; height: 72px;" class="form-control" name="inbox" id="inbox"></textarea>
                            <div id="error-review"></div>
                            </div>
                    <?=form_close();?>
                </div>
            </div>
        </div>
    </section>
           