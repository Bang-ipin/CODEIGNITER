<?php foreach($dataabout as $data){?>
	<div class="fables-header fables-after-overlay bg-rules">
		<div class="container"> 
			 <h2 class="fables-page-title fables-second-border-color wow fadeInLeft" data-wow-duration="1.5s">About </h2>
		</div>
	</div>  
	<div class="fables-light-gary-background">
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
        <div class="row overflow-hidden"> 
            <div class="col-12 col-md-6">
                 <div class="image-container translate-effect-right">
                    <img data-src="<?=base_url('files/media/'.$data['gambar'].'');?>" alt="Fables Template" class="lazy img-fluid">
                 </div>
            </div>
            <div class="col-12 col-md-6 mt-4 mt-md-0">
                 <h2 class="font-30 font-weight-bold fables-second-text-color my-4 d-inline-block d-lg-block wow fadeInRight" data-wow-duration="1.5s"><?=strtoupper($title);?></h2>
                <div class="fables-vision-detail fables-forth-text-color wow fadeInRight" data-wow-duration="1.5s">
                    <?=$data['deskripsi1'];?>
				</div>
            </div>
		</div> 
    </div>
   
    <div class="container"> 
		<div class="row overflow-hidden">
            <div class="col-12 col-md-6">
                <span class="fables-iconvision-icon fables-second-text-color fa-4x"></span>
                <h2 class="font-30 font-weight-bold fables-second-text-color my-4 wow fadeInLeft d-inline d-lg-block" data-wow-duration="1.5s">Visi & Misi</h2>
                <div class="fables-forth-text-color mt-4 wow fadeInLeft" data-wow-duration="1.5s">
                  <?=$data['deskripsi2'];?>
				</div>
            </div>
            <div class="col-12 col-md-6 mt-4 mt-md-0">
                <div class="image-container translate-effect-right">
                     <img data-src="<?=base_url('assets/public/img/misi.jpg');?>" alt="Fables Template" class="img-fluid lazy">
                </div>               
            </div>
		</div> 
    </div>

<?php } ?>