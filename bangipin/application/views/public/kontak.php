
<div class="fables-header fables-after-overlay">
    <div class="container"> 
         <h2 class="fables-page-title fables-second-border-color"><?=$title;?></h2>
    </div>
</div>  
<div class="fables-light-background-color">
    <div class="container"> 
        <nav aria-label="breadcrumb">
          <ol class="fables-breadcrumb breadcrumb px-0 py-3">
            <li class="breadcrumb-item"><a href="<?=site_url();?>" class="fables-second-text-color">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$title;?></li>
          </ol>
        </nav> 
    </div>
</div>
    <div class="container"> 
        <div class="row my-4 my-md-5 overflow-hidden">
             <div class="col-12 col-sm-6 col-md-4 text-center mb-4 mb-md-0 wow zoomIn" data-wow-duration="1.5s" data-wow-delay=".4s"> 
                    <span class="fa fa-map-marker fa-2x fables-second-background-color text-white rounded-circle d-inline-block p-4"></span> 
                    <h2 class="font-16 semi-font fables-second-text-color my-3">Address Information</h2>
                    <p class="font-14 fables-forth-text-color">
                    <?=$alamat;?></p>        
                   
             </div>
             <div class="col-12 col-sm-6 col-md-4 text-center mb-4 mb-md-0 wow zoomIn" data-wow-duration="1.5s" data-wow-delay=".8s"> 
                    <span class="fa fa-phone fa-2x  fables-second-background-color text-white rounded-circle d-inline-block p-4"></span>
                    <h2 class="font-16 semi-font fables-second-text-color my-3">Mail & Phone number</h2>
                    <p class="font-14 fables-forth-text-color"><?=$email;?></p>
                    <p class="font-14 fables-forth-text-color"><?=$telp;?></p> 
             </div>
             <div class="col-12 col-sm-6 col-md-4 text-center mb-4 mb-md-0 wow zoomIn" data-wow-duration="1.5s" data-wow-delay="1.2s"> 
                    <span class="fa fa-share fa-2x fables-second-background-color text-white rounded-circle d-inline-block p-4"></span>
                    <h2 class="font-16 semi-font fables-second-text-color my-3">Stay In Touch</h2>
                    <ul class="nav fables-contact-social-links">
						<?php if(isset($facebook)){
								echo"<li><a href='https://facebook.com/".$facebook."' target='_blank'><i class='fa fa-facebook fables-forth-text-color fa-fw'></i></a></li>";
							}?>
							<?php if(isset($twitter)){
								echo"<li><a href='https://twitter.com/".$twitter."' target='_blank'><i class='fa fa-twitter-square fables-forth-text-color fa-fw'></i></a></li>";
							}?>
							<?php if(isset($instagram)){
								echo"<li><a href='https://instagram.com/".$instagram."' target='_blank'><i class='fa fa-instagram fables-forth-text-color fa-fw'></i></a></li>";
							}?>
							<?php if(isset($youtube)){
								echo"<li><a href='https://youtube.com/".$youtube."' target='_blank'><i class='fa fa-youtube-square fables-forth-text-color fa-fw'></i></a></li>";
							}?>
							<?php if(isset($linkedin)){
								echo"<li><a href='https://linkedin.com/".$linkedin."' target='_blank'><i class='fa fa-linkedin fables-forth-text-color fa-fw'></i></a></li>";
							}?>					
                    </ul> 
             </div>
        </div>  
    </div>
    <div class="fables-contact-caption fables-after-overlay px-2 px-sm-5 text-left text-sm-center py-5 bg-rules">
		<div class="container">
		   <div class="row">
			   <div class="col-12 col-lg-8 offset-lg-2"> 
				   <h3 class="font-25 font-weight-bold white-color position-relative z-index"><?=$namalokasi;?></h3>  
				   <p class="font-weight-light fables-third-text-color my-3 position-relative z-index"><?=$caption;?></p>
				   <a href="https://api.whatsapp.com/send?phone=<?=$telp;?>" class="btn fables-second-background-color fables-rounded-btn white-color fables-btn-rounded font-19 px-5 mt-2 position-relative z-index">Chat WA</a> 
			   </div>
				
		   </div>
		   
		</div>
    </div> 
    <div class="container">     
        <div class="row my-4 my-md-5">
             <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2"> 
                <h3 class="font-35 font-weight-bold fables-second-text-color text-center mb-3">Contact Us</h3>
                <p class="fables-forth-text-color text-center"></p>
             </div>   
         </div>    
        <div class="row overflow-hidden">
            <div class="col-12 wow slideInLeft" data-wow-duration="1.5s">
			<?php if($this->session->flashdata('SUCCESSMSG')) { ?>
				<div role="alert" class="alert alert-success">
					<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
					<strong>Sukses!</strong>
					<?=$this->session->flashdata('SUCCESSMSG')?>
				</div>
				<?php } ?>
				<?php if($this->session->flashdata('GAGALMSG')) { ?>
				<div role="alert" class="alert alert-danger">
					<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
					<strong>Error!</strong>
					<?=$this->session->flashdata('GAGALMSG')?>
				</div>
			<?php } ?>
				<div class="clearfix"></div>
				<?=form_open('', array('id'=>"contact-form",'class'=>"fables-contact-form"));?>
					<div class="form-row">
						<div class="form-group col-md-12">
							<input type="text" class="form-control p-3 rounded-0"  name="name" id="name" required placeholder="Name">  
						</div> 
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<input type="email" class="form-control p-3 rounded-0" name="email" id="email" required placeholder="Email"> 
						</div>
						<div class="form-group col-md-6">
							<input type="text" class="form-control p-3 rounded-0" name="subjek" id="subjek" placeholder="Subject"> 
						</div> 
					</div> 
					<div class="form-row"> 
						<div class="form-group col-md-12">
							<textarea class="form-control p-3 rounded-0" name="pesan" id="pesan" required placeholder="Message" rows="4"></textarea>
						</div> 
					</div>
					<div class="form-row"> 
						<div class="form-group col-md-12">
							<?php echo $captcha;?>
							<?php echo $scriptcaptcha;?>
						</div> 
					</div>
					<div class="form-row">
						<div class="form-group col-md-12 text-center">
							<button type="submit" id="simpanpesan" class="btn fables-second-background-color fables-btn-rounded white-color px-7 font-20 py-2">Send</button>
						</div>
					</div>
                 <?=form_close();?>
                   
            </div>
                
        </div> 
    </div> 
        <h3 class="fables-second-text-color font-35 font-weight-bold text-center mt-0 mb-5 my-md-5">Our Location</h3>      
        <div class="mb-4 mb-md-0" id="map" data-lng="<?=$longitude;?>" data-lat="<?=$latitude;?>" data-icon="<?=base_url('assets/custom/images/map-marker.png');?>" data-zoom="12" style="width:100%;height:420px"></div> 
