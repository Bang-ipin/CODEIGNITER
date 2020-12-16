<?php header("Content-Type: application/xml; charset=utf-8"); ?>
<?php
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
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
     <changefreq>daily</changefreq>
  </url>
  <?php } ?>
 
   <?php foreach($blog as $data) { ?>
  <url>
     <loc><?php echo site_url().'blog/'.$data->kategori .'/'.$data->judul_seo;?></loc>
     <priority>0.5</priority>
     <changefreq>daily</changefreq>
     <lastmod><?php date_default_timezone_set("Asia/Jakarta"); echo $data->tgl_modif;?></lastmod>
  </url>
  <?php } ?>
  
 </urlset>