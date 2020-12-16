<?php
	date_default_timezone_set('Asia/Jakarta');
	$tahun = date('Y');
	//$hari = date('d');
	for($bln=1; $bln <=12; $bln++){
		$total = $this->Beranda_model->TotalVisitorPerbulan($bln,$tahun);
		$data[$bln]= $total;
	}

	$visit = '';
	for ($bulan=1; $bulan <=12; $bulan++) {

		$visit .= $data[$bulan];
		if($bulan < 12) $visit .= ',';
	}

?>	
		<script>
			
			var MONTHS = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
			var color = Chart.helpers.color;
			var barChartData = {
				labels: MONTHS,
				datasets: [{
					label: 'Kunjungan',
					backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
					borderColor: window.chartColors.blue,
					borderWidth: 1,
					data: [<?php if(isset($visit)){echo $visit;}?>] 
				}]
			};

			window.onload = function() {
				var ctx = document.getElementById("site_statistics_bulanan").getContext("2d");
				window.myBar = new Chart(ctx, {
					type: 'line',
					data: barChartData,
					options: {
						responsive: true,
						width:500,
						height:500,
						legend: {
							position: 'top',
						},
						title: {
							display: true,
							text: 'GRAFIK VISITOR',
							fontSize:'12',
							fontColor:'blue',
							fontfamily:'sans-serif'
							},
						tooltips: {
							mode: 'index',
							intersect: false,
						},
						hover: {
							mode: 'nearest',
							intersect: true
						},
						scales: {
							xAxes: [{
								display: true,
								scaleLabel: {
									display: true,
									fontColor:'black',
									fontSize:'12',
									fontFamily:'Times-new-roman',
									labelString: 'Tahun <?=$tahun;?>',
								}
							}],
							yAxes: [{
								display: true,
								scaleLabel: {
									display: true,
									fontColor:'black',
									fontSize:'16',
									fontFamily:'Times-new-roman',
									labelString: 'Jumlah Visitor',
								}
							}]
						}
					}
				});

			};
		</script>
		