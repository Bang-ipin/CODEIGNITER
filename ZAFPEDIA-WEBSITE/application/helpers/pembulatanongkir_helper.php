<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 if ( ! function_exists('hitungongkos'))
	{
		function hitungongkos($berat,$kelipatan){
			$hitung=$berat / $kelipatan;
			if($hitung==0){
				$hasil=1;
			}
			else
			{
				if(strpos($hitung,".")){
					$split_angka=explode(".",$hitung);
					if($split_angka[1] < 999){
						$angka2=1;
						$hitung=$split_angka[0] + $angka2;
						$hasil=$hitung;
					}
				}
				else
				{
					$hasil=$hitung;	
				}
			}
			return $hasil;
		}
	}
?>