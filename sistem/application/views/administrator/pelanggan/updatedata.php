            <div class="content-wrapper">
				<section class="content-header">
					<h1>
						<?=$title;?>
					</h1>
				</section>
			
				<section class="content">
					<div class="row">
						<div class="col-xs-12">
							<div class="box">
								<div class="box-body">
									<div><?php echo $this->session->flashdata('pesan');?></div>
									<?=form_open('administrator/updatepostingan',array('name'=>'form','id'=>"form"))?>
										<div class="form-horizontal">
											<?php foreach($data as $row){ ?>
											<div class="form-group">
												<div class="col-md-3">
													<label for="faktur">No Invoice</label>
												</div>
												<div class="col-md-3">
													<input type="hidden" class="form-control" value="<?php echo $row->id;?>" name="id" id="id" readonly="readonly"  >
													<input type="text" class="form-control uneditable-input" name="kodeinvoice" id="kodeinvoice" size="12" readonly="readonly" value="<?php echo $row->kode_invoice;?>" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="tanggal">Tanggal Invoice</label>
												</div>
												<div class="col-md-3">
													<input type="text" class="form-control uneditable-input" name="tanggal" id="tanggal" readonly="readonly" size="12" value="<?php echo $row->tanggal_invoice;?>" />
												</div>
											</div>
											
											<div class="form-group">
												<div class="col-md-3">
													<label for="pelanggan">Nama Pelanggan</label>
												</div>
												<div class="col-md-4">
													<input type="text" class="form-control uneditable-input" name="pelanggan" id="pelanggan" value="<?php echo $row->pelanggan;?>" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="institusi">Nama Institusi</label>
												</div>
												<div class="col-md-4">
													<input type="text" class="form-control uneditable-input" name="institusi" id="institusi" value="<?php echo $row->institusi;?>" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="kota">Kota</label>
												</div>
												<div class="col-md-3">
													<input type="text" class="form-control uneditable-input" name="kota" id="kota"  value="<?php echo $row->kota;?>"/>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="email">Email</label>
												</div>
												<div class="col-md-4">
													<input type="text" class="form-control uneditable-input" name="email" id="email" value="<?php echo $row->email;?>" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="telepon">Telepon</label>
												</div>
												<div class="col-md-4">
													<input type="text" class="form-control uneditable-input" name="telepon" id="telepon" value="<?php echo $row->telepon;?>" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="lahir">Tanggal Lahir</label>
												</div>
												<div class="col-md-4">
													<input type="text" class="form-control uneditable-input" name="lahir" id="lahir" value="<?php echo $row->ttl;?>" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="paket">Pilihan Paket</label>
												</div>
												<div class="col-md-2">
													<?php
													$attr			= "class='form-control select2' id='paket'";
													$paket_select	= $this->input->post('paket')? $this->input->post('paket'):$row->paket;
													echo form_dropdown('paket',$dd_paket,$paket_select,$attr);
													?>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="bank">Pembayaran Via Bank</label>
												</div>
												<div class="col-md-3">
													<?php
													$attr			= "class='form-control select2' id='bank'";
													$bank_select	= $this->input->post('bank')? $this->input->post('bank'):$row->pembayaran;
													echo form_dropdown('bank',$dd_bank,$bank_select,$attr);
													?>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="nominal">Nominal</label>
												</div>
												<div class="col-md-4">
													<input type="text" class="form-control uneditable-input" name="nominal" id="nominal" readonly="true"  value="<?=$row->nominal;?>"/>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="bank">Postingan IG ke</label>
												</div>
												<div class="col-md-3">
													<?php
													$attr			= "class='form-control select2' id='ig'";
													$ig_select		= $this->input->post('postig')? $this->input->post('postig'):$row->postig;
													echo form_dropdown('postig',$dd_ig,$ig_select,$attr);
													?>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="bank">Postingan WEB ke</label>
												</div>
												<div class="col-md-3">
													<?php
													$attr			= "class='form-control select2' id='web'";
													$web_select		= $this->input->post('postweb')? $this->input->post('postweb'):$row->postweb;
													echo form_dropdown('postweb',$dd_web,$web_select,$attr);
													?>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="bank">Status</label>
												</div>
												<div class="col-md-3">
													<?php
													$attr				= "class='form-control select2' id='status'";
													$status_select		= $this->input->post('status')? $this->input->post('status'):$row->status;
													echo form_dropdown('status',$dd_status,$status_select,$attr);
													?>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="catatan">Catatan</label>
												</div>
												<div class="col-md-4">
													<textarea name="catatan" rowspan="5" colspan="8"><?=$row->catatan;?></textarea> 
												</div>
											</div>
										<?php } ?>
											<fieldset class="atas" style="margin-top: 30px;margin-bottom: 30px;">
												<table width="100%">
													<tr>
														<td colspan="3" align="center">
														<button type="submit" name="simpan" id="simpan" class="easyui-linkbutton c1" data-options="iconCls:'icon-save'">SIMPAN</button>
														<a href="<?php echo base_url('administrator/pelanggan');?>">
														<button type="button" name="kembali" id="kembali" class="easyui-linkbutton" data-options="iconCls:'icon-logout'">Kembali</button>
														</a>
														</td>
													</tr>
												</table>  
											</fieldset>
										</div>
									<?php form_close();?>
									<fieldset>
										<div id="tampil_data"></div>
									</fieldset>
								</div>
							</div>
						</div>
					</div>
				</section>
				<script>
				    $(function(){
                    	$('#lahir').datetimepicker({
                    	lang:'en',
                    	timepicker:false,
                    	format:'d-m-Y',
                    	closeOnDateSelect:true,
                    	showAnim:'slide',
                    	});
                    });
				</script>
			</div>
		