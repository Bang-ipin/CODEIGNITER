<?php header("Content-Type: application/xml; charset=utf-8"); ?>
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" >
  <url>
     <loc><?php echo site_url();?></loc>
     <priority>1.0</priority>
	 <changefreq>monthly</changefreq>
  </url>
	<?php foreach($page as $data) { ?>
  <url>
     <loc><?php echo site_url().$data->laman_seo;?></loc>
     <priority>0.5</priority>
  </url>
  <?php } ?>
 
  <?php foreach($produk as $data) { ?>
  <url>
     <loc><?php echo site_url().'produk/'.$data->kategori_seo .'/'.$data->produk_seo;?></loc>
     <priority>0.5</priority>
     <lastmod><?php echo $data->tgl_modif;?></lastmod>
  </url>
  <?php } ?>
  
  
 </urlset>