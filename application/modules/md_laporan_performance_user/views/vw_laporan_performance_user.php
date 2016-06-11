<div class="easyui-layout" data-options="fit:true">

		<div data-options="region:'center',title:'Laporan Antrian'" style="padding:5px;">
			<div class="easyui-layout" data-options="fit:true">
				<div data-options="region:'north',split:true,border:false,title:'Laporan Waktu Tunggu'" style="height:130px">
					<div class="easyui-layout" data-options="fit:true">
						<div data-options="region:'west',split:true,border:false" style="width:400px;background-color:#fff;">
							<div style="margin:auto;width:95%;">
								<canvas id="canvas" height="98" width="350"></canvas>
							</div>
						</div>
						<div data-options="region:'center',border:false">
							<table id="5449_dtglaporan" class="easyui-datagrid" data-options="title:'',url:'<?php echo base_url(); ?>index.php/md_laporan_performance_user/fntransaksiData/',toolbar:'#5449_tlblaporan',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
								<thead>
									<tr>

									   <th data-options="field:'info',title:'<b>Info</b>',align:'center',width:100,sortable:false" halign="center"></th>

									   <th data-options="field:'tanggal_transaksi',title:'<b>Tanggal Transaksi</b>',align:'left',width:170,sortable:true" halign="center"></th>

									   <th data-options="field:'rata_rata',title:'<b>Rata-Rata</b>',width:110,sortable:false" halign="center"></th>
								
								   </tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
				<div data-options="region:'center',border:false">
					<div class="easyui-layout" data-options="fit:true">
						<div data-options="region:'north',split:true,border:false,title:'Laporan Waktu Layanan'" style="height:130px">
							<div class="easyui-layout" data-options="fit:true">
								<div data-options="region:'west',split:true,border:false" style="width:400px;background-color:#fff;">
									<div style="margin:auto;width:95%;">
										<canvas id="canvas_2" height="98" width="350"></canvas>
									</div>
								</div>
								<div data-options="region:'center',border:false">
									<table id="5449x_dtglaporan" class="easyui-datagrid" data-options="title:'',url:'<?php echo base_url(); ?>index.php/md_laporan_performance_user/fntransaksiData_waktu_layanan/',toolbar:'#5449x_tlblaporan',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
										<thead>
											<tr>

											   <th data-options="field:'info',title:'<b>Info</b>',align:'center',width:100,sortable:false" halign="center"></th>

											   <th data-options="field:'tanggal_transaksi',title:'<b>Tanggal Transaksi</b>',align:'left',width:170,sortable:true" halign="center"></th>

											   <th data-options="field:'rata_rata',title:'<b>Rata-Rata</b>',width:110,sortable:false" halign="center"></th>
										
										   </tr>
										</thead>
									</table>
								</div>
							</div>
						</div>
						<div data-options="region:'center',border:false">
							<div class="easyui-layout" data-options="fit:true">
								<div data-options="region:'north',split:true,border:false,title:'Laporan Performance User'" style="height:170px">
									<div class="easyui-layout" data-options="fit:true">
										<div data-options="region:'west',split:true,border:false" style="width:400px;background-color:#fff;">
											<div style="margin:5px auto;width:160px;">
												<canvas id="chart-area" width="150" height="128"/>
											</div>
										</div>
										<div data-options="region:'center',border:false">
											<table id="5449y_dtglaporan" class="easyui-datagrid" data-options="title:'',url:'<?php echo base_url(); ?>index.php/md_laporan_performance_user/fntransaksiData_performance/',toolbar:'#5449y_tlblaporan',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
												<thead>
													<tr>

													   <th data-options="field:'info',title:'<b>Info</b>',align:'center',width:100,sortable:false" halign="center"></th>

													   <th data-options="field:'tgl_info',title:'<b>Tanggal Info</b>',align:'left',width:170,sortable:true" halign="center"></th>

													   <th data-options="field:'f_login_date',title:'<b>Tanggal Login</b>',align:'left',width:150,sortable:true" halign="center"></th>

													   <th data-options="field:'f_logout_date',title:'<b>Tanggal Logout</b>',width:150,sortable:false" halign="center"></th>

													   <th data-options="field:'lama_waktu',title:'<b>Lama Waktu</b>',width:150,sortable:false" halign="center"></th>

													   <th data-options="field:'lama_waktu_layanan',title:'<b>Lama Waktu Layanan</b>',width:150,sortable:false" halign="center"></th>
												
												   </tr>
												</thead>
											</table>
										</div>
									</div>
								</div>
								<div data-options="region:'center',border:false"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        <div data-options="region:'south',title:'Filter',split:true" style="height:140px; ">
					<div style="padding:0px 15px;">
						<form name="frmlaporan" id="frmlaporan" accept-charset="utf-8" enctype="multipart/form-data" method="post" novalidate>
						<div style="padding:10px;width:850px;border:0px dotted #CCCCCC;border-radius:5px;float:left;clear:left;">
								<div class="frmItem" style="margin-bottom:5px;">
									<div style="display:inline-block;width:100px;">User</div>
									<select style="display:inline-block;width:380px;" id="5449user" name="5449user">
										<option value="">-- Pilih User --</option>
										<?php foreach($pilihUser as $key => $val) : ?>
											<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="frmItem">
									<div style="display:inline-block;width:100px;">Tanggal Awal</div>
									<input style="display:inline-block;" id="5449startdate" name="5449startdate" ></input>   	

									<div style="display:inline-block;">Tanggal Akhir</div>
									<input style="display:inline-block;" id="5449finishdate" name="5449finishdate" ></input>  
								</div>
								<br>
								
								<div class="frmItem">
									<a href="javascript:void(0)" class="easyui-linkbutton"  onclick="fnPreview5449()"><font color=#fff>Preview</a>								
									<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="fnPrint_transaksi5449_text('myPop1',1000,600)"><font color=#fff> Print Text</a>
								</div>

				   		   
						</div>

						</form>
					</div>
		
		</div>  

</div>

<script type="text/javascript">
function fnSearch_5449() {
	$('#5449_dtglaporan').datagrid('load',{
		temp_tableKeyword: $('#5449_txttemp_table').val()
	});
}
$(function() {


    $('#5449startdate').datebox({  
    required:true,
   formatter:myformatter	
    }); 
    $('#5449finishdate').datebox({  
    required:true,
   formatter:myformatter	
    });     	
});
function myformatter(date){  
	var y = date.getFullYear();  
	var m = date.getMonth()+1;  
	var d = date.getDate();  
	return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);  
} 
function fnPreview5449(){
	var startKeyword = $('#5449startdate').datebox('getValue') || 'all';
	var finishKeyword = $('#5449finishdate').datebox('getValue') || 'all';
	var UserKeyword = $('#5449user').val() || 'all';

	$.ajax({
		type: 'POST',
		url: '<?php echo base_url()?>index.php/md_laporan_performance_user/fnlaporan_chart_ajax',
		dataType: 'json',
		data: {
			'startKeyword':startKeyword,
			'finishKeyword':finishKeyword,
			'UserKeyword':UserKeyword,
		},
		success: function(data) {
			$('#5449_dtglaporan').datagrid('load',{
				StartKeyword: $('#5449startdate').datebox('getValue'),
				FinishKeyword: $('#5449finishdate').datebox('getValue'),
				UserKeyword: $('#5449user').val(),
				
			});
			$('#5449x_dtglaporan').datagrid('load',{
				StartKeyword: $('#5449startdate').datebox('getValue'),
				FinishKeyword: $('#5449finishdate').datebox('getValue'),
				UserKeyword: $('#5449user').val(),
				
			});
			$('#5449y_dtglaporan').datagrid('load',{
				StartKeyword: $('#5449startdate').datebox('getValue'),
				FinishKeyword: $('#5449finishdate').datebox('getValue'),
				UserKeyword: $('#5449user').val(),
				
			});
			show_chart(2, data.result, data.result_layanan, data.result_performance);
		}
	});
}

function fnPrint_transaksi5449_text( title,w,h) {
 		var startKeyword = $('#5449startdate').datebox('getValue') || 'all';
		var finishKeyword = $('#5449finishdate').datebox('getValue') || 'all';
		var UserKeyword = $('#5449user').val() || 'all';
 
			var left = (screen.width/2)-(w/2);
			var top = (screen.height/2)-(h/2);
			var targetWin = window.open ('index.php/md_laporan_performance_user/fntransaksiDataPrintText/'+startKeyword+'/'+finishKeyword+'/'+UserKeyword, title, 'toolbar=yes, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
		
}

</script>

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