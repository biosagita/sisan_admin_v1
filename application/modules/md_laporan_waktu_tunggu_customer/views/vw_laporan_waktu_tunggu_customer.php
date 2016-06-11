<div class="easyui-layout" data-options="fit:true">

        <div data-options="region:'center',title:'Laporan Antrian'" style="padding:5px;background-color:#efefef;">

					<table id="542_dtglaporan" class="easyui-datagrid" data-options="title:'',url:'<?php echo base_url(); ?>index.php/md_laporan_waktu_tunggu_customer/fntransaksiData/',toolbar:'#542_tlblaporan',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
					<thead>
						<tr>


  					           
										   <th data-options="field:'id_transaksi',title:'<b>Id</b>',hidden:true,width:40,sortable:true" halign="center"></th>
										   
										   <th data-options="field:'tanggal_transaksi',title:'<b>Tanggal</b>',align:'center',width:80,sortable:true" halign="center"></th>

										   <th data-options="field:'no_ticket',title:'<b>No Tiket</b>',align:'left',width:100,sortable:true" halign="center"></th>

										   <th data-options="field:'waktu_ambil',title:'<b>Waktu Ambil</b>',align:'center',width:110,sortable:true" halign="center"></th>

										   <th data-options="field:'waktu_tunggu',title:'<b>Waktu Tunggu</b>',width:110,sortable:false" halign="center"></th>
								           
										   <th data-options="field:'waktu_panggil',title:'<b>Waktu Panggil</b>',width:110,sortable:true" halign="center"></th>
								           
										   <th data-options="field:'id_layanan',title:'<b>Layanan</b>',width:200,sortable:true" halign="center"></th>
								           
										   <th data-options="field:'id_user',title:'<b>User</b>',align:'center',width:150,sortable:true" halign="center"></th>
								           
										   <th data-options="field:'id_loket',title:'<b>Loket</b>',align:'center',width:80,sortable:true" halign="center"></th>

					           	
					
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
									<div style="display:inline-block;width:100px;">Layanan</div>
									<select style="display:inline-block;width:380px;" id="542layanan" name="542layanan">
										<option value="">-- Pilih Layanan --</option>
										<?php foreach($pilihLayanan as $key => $val) : ?>
											<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="frmItem" style="margin-bottom:5px;">
									<div style="display:inline-block;width:100px;">Loket</div>
									<select style="display:inline-block;width:380px;" id="542loket" name="542loket">
										<option value="">-- Pilih Loket --</option>
										<?php foreach($pilihLoket as $key => $val) : ?>
											<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="frmItem" style="margin-bottom:5px;">
									<div style="display:inline-block;width:100px;">User</div>
									<select style="display:inline-block;width:380px;" id="542user" name="542user">
										<option value="">-- Pilih User --</option>
										<?php foreach($pilihUser as $key => $val) : ?>
											<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="frmItem">
									<div style="display:inline-block;width:100px;">Tanggal Awal</div>
									<input style="display:inline-block;" id="542startdate" name="542startdate" ></input>   	

									<div style="display:inline-block;">Tanggal Akhir</div>
									<input style="display:inline-block;" id="542finishdate" name="542finishdate" ></input>  
								</div>
								<br>
								
								<div class="frmItem">
									<a href="javascript:void(0)" class="easyui-linkbutton"  onclick="fnPreview542()"><font color=#fff>Preview</a>								
									<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="fnPrint_transaksi542_text('myPop1',1000,600)"><font color=#fff> Print Text</a>
									<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="fnPrint_transaksi542('myPop1',1000,600)"><font color=#fff> Print</a>								
								</div>

				   		   
						</div>

						</form>
					</div>
		
		</div>  

</div>

<script type="text/javascript">
function fnSearch_542() {
	$('#542_dtglaporan').datagrid('load',{
		temp_tableKeyword: $('#542_txttemp_table').val()
	});
}
$(function() {


    $('#542startdate').datebox({  
    required:true,
   formatter:myformatter	
    }); 
    $('#542finishdate').datebox({  
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
function fnPreview542(){
	$('#542_dtglaporan').datagrid('load',{
		StartKeyword: $('#542startdate').datebox('getValue'),
		FinishKeyword: $('#542finishdate').datebox('getValue'),
		LayananKeyword: $('#542layanan').val(),
		LoketKeyword: $('#542loket').val(),
		UserKeyword: $('#542user').val(),
		
	});
}
function fnPrint_transaksi542( title,w,h) {
 		var startKeyword = $('#542startdate').datebox('getValue') || 'all';
		var finishKeyword = $('#542finishdate').datebox('getValue') || 'all';
		var LayananKeyword = $('#542layanan').val() || 'all';
		var LoketKeyword = $('#542loket').val() || 'all';
		var UserKeyword = $('#542user').val() || 'all';
 
			var left = (screen.width/2)-(w/2);
			var top = (screen.height/2)-(h/2);
			var targetWin = window.open ('index.php/md_laporan_waktu_tunggu_customer/fntransaksiDataPrint/'+startKeyword+'/'+finishKeyword+'/'+LayananKeyword+'/'+LoketKeyword+'/'+UserKeyword, title, 'toolbar=yes, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
		
}

function fnPrint_transaksi542_text( title,w,h) {
 		var startKeyword = $('#542startdate').datebox('getValue') || 'all';
		var finishKeyword = $('#542finishdate').datebox('getValue') || 'all';
		var LayananKeyword = $('#542layanan').val() || 'all';
		var LoketKeyword = $('#542loket').val() || 'all';
		var UserKeyword = $('#542user').val() || 'all';
 
			var left = (screen.width/2)-(w/2);
			var top = (screen.height/2)-(h/2);
			var targetWin = window.open ('index.php/md_laporan_waktu_tunggu_customer/fntransaksiDataPrintText/'+startKeyword+'/'+finishKeyword+'/'+LayananKeyword+'/'+LoketKeyword+'/'+UserKeyword, title, 'toolbar=yes, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
		
}
</script>