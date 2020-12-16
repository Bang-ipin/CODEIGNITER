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
									<?=form_open('administrator/updatekonsumen',array('name'=>'form','id'=>"form"))?>
										<div class="form-horizontal">
											<div class="form-group">
												<div class="col-md-3">
													<label for="tanggal">Tanggal Kunjungan</label>
												</div>
												<div class="col-md-3">
													<input type="hidden" class="form-control uneditable-input" name="id" id="id" size="12" value="<?=$id;?>" readonly />
													<input type="text" class="form-control uneditable-input" name="tanggal" id="tanggal" size="12" value="<?=$tanggal_kunjungan;?>"/>
												</div>
											</div>
											
											<div class="form-group">
												<div class="col-md-3">
													<label for="pelanggan">Nama Tempat</label>
												</div>
												<div class="col-md-4">
													<input type="text" class="form-control uneditable-input" name="pelanggan" id="pelanggan" value="<?=$nama;?>" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="alamat">Alamat</label>
												</div>
												<div class="col-md-8">
													<textarea rows="8" class="form-control uneditable-input" name="alamat" id="alamat"><?=$alamat;?></textarea>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="kontak">Kontak</label>
												</div>
												<div class="col-md-3">
													<input type="text" class="form-control uneditable-input" name="kontak" id="kontak" value="<?=$kontak;?>" />
												</div>
											</div>
											<div class="form-group">
            									<div class="col-md-3">
            										<label for="area">AREA</label>
            									</div>
            									<div class="col-md-8">
            										<?php 
            											$attribute='class="table-group-action-input form-control select2me" id="area"';
            											$area_selected= $this->input->post('area')?$this->input->post('area'):'';
            											echo form_dropdown('area',$dd_area,$area_selected,$attribute);
            										?>
            									</div>
            								</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="pemilik">Pemilik</label>
												</div>
												<div class="col-md-4">
													<input type="text" class="form-control uneditable-input" name="pemilik" id="pemilik" value="<?=$pemilik;?>" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="pj">Penanggung Jawab</label>
												</div>
												<div class="col-md-4">
													<input type="text" class="form-control uneditable-input" name="pj" id="pj" value="<?=$penanggungjawab;?>" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="kebutuhan">Kebutuhan</label>
												</div>
												<div class="col-md-8">
													<textarea rows="4" class="form-control uneditable-input" name="kebutuhan" id="kebutuhan"><?=$kebutuhan;?></textarea>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="keterangan">Keterangan</label>
												</div>
												<div class="col-md-8">
													<textarea rows="4" class="form-control uneditable-input" name="keterangan" id="keterangan"><?=$keterangan;?></textarea>
												</div>
											</div>
											<fieldset class="atas" style="margin-top: 30px;margin-bottom: 30px;">
												<table width="100%">
													<tr>
														<td colspan="3" align="center">
														<button type="submit" name="simpan" id="simpan" class="easyui-linkbutton c1" data-options="iconCls:'icon-save'">SIMPAN</button>
														<a href="<?php echo base_url('administrator/sales');?>">
														<button type="button" name="kembali" id="kembali" class="easyui-linkbutton" data-options="iconCls:'icon-logout'">BACK</button>
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
			</div>
		