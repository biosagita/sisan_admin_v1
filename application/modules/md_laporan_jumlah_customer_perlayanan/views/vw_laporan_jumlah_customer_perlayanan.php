<div class="easyui-layout" data-options="fit:true">

        <div data-options="region:'center',title:'Laporan Antrian'" style="padding:5px;background-color:#efefef;">

					<table id="544_dtglaporan" class="easyui-datagrid" data-options="title:'',url:'<?php echo base_url(); ?>index.php/md_laporan_jumlah_customer_perlayanan/fntransaksiData/',toolbar:'#544_tlblaporan',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
					<thead>
						<tr>

										   <th data-options="field:'info',title:'<b>Info</b>',width:200,sortable:false" halign="center"></th>

										   <th data-options="field:'tanggal_transaksi',title:'<b>Tanggal Transaksi</b>',width:200,sortable:true" halign="center"></th>

										   <th data-options="field:'jumlah_customer',title:'<b>Jumlah Customer</b>',align:'left',width:130,sortable:true" halign="center"></th>

										   <th data-options="field:'jumlah_customer_skip',title:'<b>Jumlah Customer Skip</b>',align:'left',width:150,sortable:true" halign="center"></th>

										   <th data-options="field:'jumlah_customer_tidak_terlayani',title:'<b>Jumlah Customer Tak Terlayani</b>',align:'left',width:200,sortable:true" halign="center"></th>
					           	
					
					   </tr>
					</thead>
					</table>
		</div>  

        <div data-options="region:'south',title:'Filter',split:true" style="height:180px; ">
					<div style="padding:0px 15px;">
						<form name="frmlaporan" id="frmlaporan" accept-charset="utf-8" enctype="multipart/form-data" method="post" novalidate>
						<br>
						<div style="padding:10px;width:850px;border:0px dotted #CCCCCC;border-radius:5px;float:left;clear:left;">
								<div class="frmItem" style="margin-bottom:5px;">
									<input type="radio" style="display:inline-block;" name="544rdpilihan" value="all" checked="checked" />
									<div style="display:inline-block;width:84px;">All</div>
								</div>
								<div class="frmItem" style="margin-bottom:5px;">
									<input type="radio" style="display:inline-block;" name="544rdpilihan" value="id_layanan" />
									<div style="display:inline-block;width:84px;">Layanan</div>
									<select style="display:inline-block;width:380px;" id="544layanan" name="544layanan">
										<option value="">-- Pilih Layanan --</option>
										<?php foreach($pilihLayanan as $key => $val) : ?>
											<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="frmItem" style="margin-bottom:5px;">
									<input type="radio" style="display:inline-block;" name="544rdpilihan" value="id_loket" />
									<div style="display:inline-block;width:84px;">Loket</div>
									<select style="display:inline-block;width:380px;" id="544loket" name="544loket">
										<option value="">-- Pilih Loket --</option>
										<?php foreach($pilihLoket as $key => $val) : ?>
											<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="frmItem" style="margin-bottom:5px;">
									<input type="radio" style="display:inline-block;" name="544rdpilihan" value="id_user" />
									<div style="display:inline-block;width:84px;">User</div>
									<select style="display:inline-block;width:380px;" id="544user" name="544user">
										<option value="">-- Pilih User --</option>
										<?php foreach($pilihUser as $key => $val) : ?>
											<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="frmItem">
									<div style="display:inline-block;width:100px;">Tanggal Awal</div>
									<input style="display:inline-block;" id="544startdate" name="544startdate" ></input>   	

									<div style="display:inline-block;">Waktu</div>
									<input style="display:inline-block;" id="544startdate_time" name="544startdate_time" class="easyui-timespinner" data-options="showSeconds:true" ></input>  
								</div>
								<div class="frmItem">
									<div style="display:inline-block;width:100px;">Tanggal Akhir</div>
									<input style="display:inline-block;" id="544finishdate" name="544finishdate" ></input>   	

									<div style="display:inline-block;">Waktu</div>
									<input style="display:inline-block;" id="544finishdate_time" name="544finishdate_time" class="easyui-timespinner" data-options="showSeconds:true" ></input>  
								</div>
								<br>
								
								<div class="frmItem">
									<a href="javascript:void(0)" class="easyui-linkbutton"  onclick="fnPreview544()"><font color=#fff>Preview</a>								
									<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="fnPrint_transaksi544_text('myPop1',1000,600)"><font color=#fff> Print Text</a>
									<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="fnPrint_transaksi544('myPop1',1000,600)"><font color=#fff> Print</a>								
									<a href="javascript:void(0)" class="easyui-linkbutton"  onclick="fnPrint_rekap_chart_pertanyaan544('myPop1',1000,600)"><font color=#fff>Chart</a>
								</div>

				   		   
						</div>

						</form>
					</div>
		
		</div>  

</div>

<script type="text/javascript">
function fnSearch_544() {
	$('#544_dtglaporan').datagrid('load',{
		temp_tableKeyword: $('#544_txttemp_table').val()
	});
}
$(function() {


    $('#544startdate').datebox({  
    required:true,
   formatter:myformatter	
    }); 
    $('#544finishdate').datebox({  
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
function fnPreview544(){
	$('#544_dtglaporan').datagrid('load',{
		StartKeyword: $('#544startdate').datebox('getValue'),
		FinishKeyword: $('#544finishdate').datebox('getValue'),
		LayananKeyword: $('#544layanan').val(),
		LoketKeyword: $('#544loket').val(),
		UserKeyword: $('#544user').val(),
		PilihanKeyword: $('input[name="544rdpilihan"]:checked').val(),
		
	});
}
function fnPrint_transaksi544( title,w,h) {
 		var startKeyword = $('#544startdate').datebox('getValue') || 'all';
		var finishKeyword = $('#544finishdate').datebox('getValue') || 'all';
		var LayananKeyword = $('#544layanan').val() || 'all';
		var LoketKeyword = $('#544loket').val() || 'all';
		var UserKeyword = $('#544user').val() || 'all';
		var PilihanKeyword = $('input[name="544rdpilihan"]:checked').val() || 'all';

		//alert(PilihanKeyword); return;
 
			var left = (screen.width/2)-(w/2);
			var top = (screen.height/2)-(h/2);
			var targetWin = window.open ('index.php/md_laporan_jumlah_customer_perlayanan/fntransaksiDataPrint/'+startKeyword+'/'+finishKeyword+'/'+LayananKeyword+'/'+LoketKeyword+'/'+UserKeyword+'/'+PilihanKeyword, title, 'toolbar=yes, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
		
}

function fnPrint_transaksi544_text( title,w,h) {
 		var startKeyword = $('#544startdate').datebox('getValue') || 'all';
		var finishKeyword = $('#544finishdate').datebox('getValue') || 'all';
		var LayananKeyword = $('#544layanan').val() || 'all';
		var LoketKeyword = $('#544loket').val() || 'all';
		var UserKeyword = $('#544user').val() || 'all';
		var PilihanKeyword = $('input[name="544rdpilihan"]:checked').val() || 'all';

		//alert(PilihanKeyword); return;
 
			var left = (screen.width/2)-(w/2);
			var top = (screen.height/2)-(h/2);
			var targetWin = window.open ('index.php/md_laporan_jumlah_customer_perlayanan/fntransaksiDataPrintText/'+startKeyword+'/'+finishKeyword+'/'+LayananKeyword+'/'+LoketKeyword+'/'+UserKeyword+'/'+PilihanKeyword, title, 'toolbar=yes, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
		
}

function fnPrint_rekap_chart_pertanyaan544( title,w,h) {
 		var startKeyword = $('#544startdate').datebox('getValue') || 'all';
		var finishKeyword = $('#544finishdate').datebox('getValue') || 'all';
		var LayananKeyword = $('#544layanan').val() || 'all';
		var LoketKeyword = $('#544loket').val() || 'all';
		var UserKeyword = $('#544user').val() || 'all';
		var PilihanKeyword = $('input[name="544rdpilihan"]:checked').val() || 'all';

		//alert(PilihanKeyword); return;
 
			var left = (screen.width/2)-(w/2);
			var top = (screen.height/2)-(h/2);
			var targetWin = window.open ('index.php/md_laporan_jumlah_customer_perlayanan/fntransaksiDataPrintChart/'+startKeyword+'/'+finishKeyword+'/'+LayananKeyword+'/'+LoketKeyword+'/'+UserKeyword+'/'+PilihanKeyword, title, 'toolbar=yes, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
		
}
</script>