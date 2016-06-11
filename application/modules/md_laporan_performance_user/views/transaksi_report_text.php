<?php
	/*
	print_r($grid_result);
	print_r($grid_result_layanan);
	print_r($grid_result_performance);
	print_r($result);
	print_r($result_layanan);
	print_r($result_performance);
	*/
?>

<!DOCTYPE html>
<html>
    <head>
		<title>Laporan User Performance</title>
		<link href="<?php echo base_url();?>assets/chartjs/demo.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			#container{width: 95%;margin: auto;}
			.report{width: 100%;overflow: hidden;margin-bottom: 10px;}
			.report .graphic{float: left;width: 350px;height: 170px;border: solid 1px;}
			.report .grid{display: block;margin-left: 365px;}
			.header{text-align: center;}
		</style>
		<script src="<?php echo base_url();?>assets/chartjs/Chart.min.js"></script>
        <script src="<?php echo base_url();?>assets/chartjs/legend.js"></script>
    </head>
    <body>
    	<div id="container">
    		<div class="header">
    			<h2>Laporan User Performance</h2>
    			<h3><?php echo $data_company['f_comp_name']; ?></h3>	
    		</div>
    		<hr />
    		<h3>Waktu Tunggu</h3>
    		<div class="report">
    			<div class="graphic">
					<div style="margin:auto;width:95%;">
						<canvas id="canvas" height="160" width="350"></canvas>
					</div>
    			</div>
    			<div class="grid">
    				<table border="1" cellpadding="5" cellspacing="0">
    					<tr>
    						<th>No</th>
    						<th>Info</th>
    						<th>Tanggal Transaksi</th>
    						<th>Rata-Rata</th>
    					</tr>
						<?php $no = 1; ?>
    					<?php foreach($grid_result as $value) : ?>
    					<tr>
    						<td><?php echo $no; ?></td>
    						<td><?php echo $value['info']; ?></td>
    						<td><?php echo $value['tanggal_transaksi']; ?></td>
    						<td><?php echo $value['rata_rata']; ?></td>
    					</tr>
    					<?php $no++; ?>
    					<?php endforeach; ?>
    				</table>
    			</div>	
    		</div>
    		<hr />
    		<h3>Waktu Layanan</h3>
    		<div class="report">
    			<div class="graphic">
					<div style="margin:auto;width:95%;">
						<canvas id="canvas_2" height="160" width="350"></canvas>
					</div>
    			</div>
    			<div class="grid">
    				<table border="1" cellpadding="5" cellspacing="0">
    					<tr>
    						<th>No</th>
    						<th>Info</th>
    						<th>Tanggal Transaksi</th>
    						<th>Rata-Rata</th>
    					</tr>
    					<?php $no = 1; ?>
    					<?php foreach($grid_result_layanan as $value) : ?>
    					<tr>
    						<td><?php echo $no; ?></td>
    						<td><?php echo $value['info']; ?></td>
    						<td><?php echo $value['tanggal_transaksi']; ?></td>
    						<td><?php echo $value['rata_rata']; ?></td>
    					</tr>
    					<?php $no++; ?>
    					<?php endforeach; ?>
    				</table>
    			</div>
    		</div>
    		<hr />
    		<h3>Performance User</h3>
    		<div class="report">
    			<div class="graphic">
					<div style="margin:5px auto;width:160px;">
						<canvas id="chart-area" width="150" height="150"/>
					</div>
					<div style="margin-top:20px;">
						<div>
							<span style="display: inline-block;width:30px;height:10px;line-height: 10px;background-color:<?php echo $result_performance['total_waktu_layanan']['color']; ?>;">&nbsp;</span> <?php echo $result_performance['total_waktu_layanan']['label']; ?> : <?php echo $result_performance['total_waktu_layanan']['value']; ?>
						</div>
						<div>
							<span style="display: inline-block;width:30px;height:10px;line-height: 10px;background-color:<?php echo $result_performance['total_waktu']['color']; ?>;">&nbsp;</span> <?php echo $result_performance['total_waktu']['label']; ?> : <?php echo $result_performance['total_waktu']['value']; ?>
						</div>
					</div>
    			</div>
    			<div class="grid">
    				<table border="1" cellpadding="5" cellspacing="0">
    					<tr>
    						<th>No</th>
    						<th>Info</th>
    						<th>Tanggal Info</th>
    						<th>Tanggal Login</th>
    						<th>Tanggal Logout</th>
    						<th>Lama Waktu</th>
    						<th>Lama Waktu Layanan</th>
    					</tr>
    					<?php $no = 1; ?>
    					<?php foreach($grid_result_performance as $value) : ?>
    					<tr>
    						<td><?php echo $no; ?></td>
    						<td><?php echo $value['info']; ?></td>
    						<td><?php echo $value['tgl_info']; ?></td>
    						<td><?php echo $value['f_login_date']; ?></td>
    						<td><?php echo $value['f_logout_date']; ?></td>
    						<td><?php echo $value['lama_waktu']; ?></td>
    						<td><?php echo $value['lama_waktu_layanan']; ?></td>
    					</tr>
    					<?php $no++; ?>
    					<?php endforeach; ?>
    				</table>
    			</div>
    		</div>
    	</div>
    	<script>
			function show_chart(ajax, data_result, data_result_layanan, data_result_performance) {
				var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
				if(ajax == 1) {
					var result = [<?php echo implode(',', $result['list_x']); ?>];
					var datasets = [
			        {
			                fillColor : "<?php echo $result['listwarna'][0][0]; ?>",
			                strokeColor : "<?php echo $result['listwarna'][0][1]; ?>",
			                highlightFill : "<?php echo $result['listwarna'][0][2]; ?>",
			                highlightStroke : "<?php echo $result['listwarna'][0][3]; ?>",
			                data : [<?php echo implode(',', $result['list_y']); ?>],
			                label : "<?php echo $result['legend'][0]; ?>"
			            }
			        ];
			        var result_layanan = [<?php echo implode(',', $result_layanan['list_x']); ?>];
					var datasets_layanan = [
			        {
			                fillColor : "<?php echo $result_layanan['listwarna'][0][0]; ?>",
			                strokeColor : "<?php echo $result_layanan['listwarna'][0][1]; ?>",
			                highlightFill : "<?php echo $result_layanan['listwarna'][0][2]; ?>",
			                highlightStroke : "<?php echo $result_layanan['listwarna'][0][3]; ?>",
			                data : [<?php echo implode(',', $result_layanan['list_y']); ?>],
			                label : "<?php echo $result_layanan['legend'][0]; ?>"
			            }
			        ];
			        var pieData = [
						{
							value: <?php echo $result_performance['total_waktu']['value']; ?>,
							color: "<?php echo $result_performance['total_waktu']['color']; ?>",
							highlight: "<?php echo $result_performance['total_waktu']['highlight']; ?>",
							label: "<?php echo $result_performance['total_waktu']['label']; ?>"
						},
						{
							value: <?php echo $result_performance['total_waktu_layanan']['value']; ?>,
							color: "<?php echo $result_performance['total_waktu_layanan']['color']; ?>",
							highlight: "<?php echo $result_performance['total_waktu_layanan']['highlight']; ?>",
							label: "<?php echo $result_performance['total_waktu_layanan']['label']; ?>"
						}

					];
				} else {
					myBar.destroy();
					myBar_2.destroy();
					myPie.destroy();
					
					var result = data_result.data;
					console.log(result);
					var datasets = [
						{
							fillColor : data_result.datasets.fillColor,
							strokeColor : data_result.datasets.strokeColor,
							highlightFill: data_result.datasets.highlightFill,
							highlightStroke: data_result.datasets.highlightStroke,
							data : data_result.datasets.data,
							label : data_result.datasets.label
						}
					];
			        var result_layanan = data_result_layanan.data;
					var datasets_layanan = [
						{
							fillColor : data_result_layanan.datasets.fillColor,
							strokeColor : data_result_layanan.datasets.strokeColor,
							highlightFill: data_result_layanan.datasets.highlightFill,
							highlightStroke: data_result_layanan.datasets.highlightStroke,
							data : data_result_layanan.datasets.data,
							label : data_result_layanan.datasets.label
						}
					];
					var pieData = [
						{
							value: data_result_performance.total_waktu.value,
							color: data_result_performance.total_waktu.color,
							highlight: data_result_performance.total_waktu.highlight,
							label: data_result_performance.total_waktu.label
						},
						{
							value: data_result_performance.total_waktu_layanan.value,
							color: data_result_performance.total_waktu_layanan.color,
							highlight: data_result_performance.total_waktu_layanan.highlight,
							label: data_result_performance.total_waktu_layanan.label
						}
					];
				}
				var barChartData = {
			        labels : result,
			        datasets : datasets

			    }
				var ctx = document.getElementById("canvas").getContext("2d");
				myBar = new Chart(ctx).Bar(barChartData, {
					//responsive : true
				});
				var barChartData_waktu_layanan = {
			        labels : result_layanan,
			        datasets : datasets_layanan

			    }
				var ctx_2 = document.getElementById("canvas_2").getContext("2d");
				myBar_2 = new Chart(ctx_2).Bar(barChartData_waktu_layanan, {
					//responsive : true
				});
				var ctx_3 = document.getElementById("chart-area").getContext("2d");
				myPie = new Chart(ctx_3).Pie(pieData);
			}
			show_chart(1);
		</script>
    </body>
</html>