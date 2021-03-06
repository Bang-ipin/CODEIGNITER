<?php

if(!function_exists('ambiltglblog'))
{
    function ambiltglblog($tanggal)
	{
		$CI=& get_instance();
		return $CI->Site_model->ambilTgl($tanggal);	
	}
}
if(!function_exists('ambilbulanblog'))
{
    function ambilbulanblog($tanggal)
	{
		$CI=& get_instance();
		return $CI->Site_model->ambilBln($tanggal);	
	}
}
if(!function_exists('tanggalindo'))
{
    function tanggalindo()
	{
		$CI=& get_instance();
		$CI->load->library('indonesia_library');
		return $CI->indonesia_library->format_tanggal();	
	}

}
if(!function_exists('converttgl'))
{
    function converttgl($tanggal)
	{
		$CI=& get_instance();
		$CI->load->library('indonesia_library');
		return $CI->indonesia_library->konversi_tanggal($tanggal);
	}

}
if(!function_exists('convertrp'))
{
    function convertrp($angka)
	{
		$CI=& get_instance();
		$CI->load->library('indonesia_library');
		return $CI->indonesia_library->format_rupiah($angka);
	}


}

if(!function_exists('slug'))
{
    function slug($text)
	{
		// replace non letter or digits by -
		$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
	 
		// trim
		$text = trim($text, '-');
	 
		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	 
		// lowercase
		$text = strtolower($text);
	 
		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);
	 
		if (empty($text))
		{
			return 'n-a';
		}
	 
		return $text;
	}
}
if(!function_exists('show404'))
{	
	function show404($page='')
	{
		header('Location:');
		exit;
	} 	 
}

if ( ! function_exists('tgl_indo'))
{
	function date_indo($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tanggal = $pecah[2];
		$bulan = bulan($pecah[1]);
		$tahun = $pecah[0];
		return $tanggal.' '.$bulan.' '.$tahun;
	}
}
  
if ( ! function_exists('bulan'))
{
	function bulan($bln)
	{
		switch ($bln)
		{
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
}

//Format Shortdate
if ( ! function_exists('shortdate_indo'))
{
	function shortdate_indo($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tanggal = $pecah[2];
		$bulan = short_bulan($pecah[1]);
		$tahun = $pecah[0];
		return $tanggal.'/'.$bulan.'/'.$tahun;
	}
}
  
if ( ! function_exists('short_bulan'))
{
	function short_bulan($bln)
	{
		switch ($bln)
		{
			case 1:
				return "01";
				break;
			case 2:
				return "02";
				break;
			case 3:
				return "03";
				break;
			case 4:
				return "04";
				break;
			case 5:
				return "05";
				break;
			case 6:
				return "06";
				break;
			case 7:
				return "07";
				break;
			case 8:
				return "08";
				break;
			case 9:
				return "09";
				break;
			case 10:
				return "10";
				break;
			case 11:
				return "11";
				break;
			case 12:
				return "12";
				break;
		}
	}
}

//Format Medium date
if ( ! function_exists('mediumdate_indo'))
{
	function mediumdate_indo($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tanggal = $pecah[2];
		$bulan = medium_bulan($pecah[1]);
		$tahun = $pecah[0];
		return $tanggal.'-'.$bulan.'-'.$tahun;
	}
}
  
if ( ! function_exists('medium_bulan'))
{
	function medium_bulan($bln)
	{
		switch ($bln)
		{
			case 1:
				return "Jan";
				break;
			case 2:
				return "Feb";
				break;
			case 3:
				return "Mar";
				break;
			case 4:
				return "Apr";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Jun";
				break;
			case 7:
				return "Jul";
				break;
			case 8:
				return "Ags";
				break;
			case 9:
				return "Sep";
				break;
			case 10:
				return "Okt";
				break;
			case 11:
				return "Nov";
				break;
			case 12:
				return "Des";
				break;
		}
	}
}
 //format tanggal timestamp
if( ! function_exists('tgl_indo_timestamp')){
	function tgl_indo_timestamp($tgl)
	{
		$inttime=date('Y-m-d H:i:s',$tgl); //mengubah format menjadi tanggal biasa
		$tglBaru=explode(" ",$inttime); //memecah berdasarkan spaasi
		 
		$tglBaru1=$tglBaru[0]; //mendapatkan variabel format yyyy-mm-dd
		$tglBaru2=$tglBaru[1]; //mendapatkan fotmat hh:ii:ss
		$tglBarua=explode("-",$tglBaru1); //lalu memecah variabel berdasarkan -
	 
		$tgl=$tglBarua[2];
		$bln=$tglBarua[1];
		$thn=$tglBarua[0];
	 
		$bln=bulan($bln); //mengganti bulan angka menjadi text dari fungsi bulan
		$ubahTanggal="$tgl $bln $thn | $tglBaru2 "; //hasil akhir tanggal
	 
		return $ubahTanggal;
	}
}
//Long date indo Format
if ( ! function_exists('longdate_indo'))
{
	function longdate_indo($tanggal)
	{
		$ubah = gmdate($tanggal, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tgl = $pecah[2];
		$bln = $pecah[1];
		$thn = $pecah[0];
		$bulan = bulan($pecah[1]);
  
		$nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
		$nama_hari = "";
		if($nama=="Sunday") {$nama_hari="Minggu";}
		else if($nama=="Monday") {$nama_hari="Senin";}
		else if($nama=="Tuesday") {$nama_hari="Selasa";}
		else if($nama=="Wednesday") {$nama_hari="Rabu";}
		else if($nama=="Thursday") {$nama_hari="Kamis";}
		else if($nama=="Friday") {$nama_hari="Jumat";}
		else if($nama=="Saturday") {$nama_hari="Sabtu";}
		return $nama_hari.','.$tgl.' '.$bulan.' '.$thn;
	}
}
