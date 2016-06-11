<div class="easyui-layout" data-options="fit:true">

        <div data-options="region:'center',title:'Laporan Antrian'" style="padding:5px;background-color:#efefef;">

					<table id="5443_dtglaporan" class="easyui-datagrid" data-options="title:'',url:'<?php echo base_url(); ?>index.php/md_laporan_waktu_layanan_summary/fntransaksiData/',toolbar:'#5443_tlblaporan',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
					<thead>
						<tr>

										   <th data-options="field:'info',title:'<b>Info</b>',align:'center',width:100,sortable:false" halign="center"></th>

										   <th data-options="field:'tanggal_transaksi',title:'<b>Tanggal Transaksi</b>',align:'left',width:150,sortable:true" halign="center"></th>

										   <th data-options="field:'rata_rata',title:'<b>Rata-Rata</b>',width:110,sortable:false" halign="center"></th>

										   <th data-options="field:'service_rate',title:'<b>Service Rate</b>',width:110,sortable:false" halign="center"></th>
					
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
									<input type="radio" style="display:inline-block;" name="5443rdpilihan" value="all" checked="checked" />
									<div style="display:inline-block;width:84px;">All</div>
								</div>
								<div class="frmItem" style="margin-bottom:5px;">
									<input type="radio" style="display:inline-block;" name="5443rdpilihan" value="id_layanan" />
									<div style="display:inline-block;width:100px;">Layanan</div>
								</div>
								<div class="frmItem" style="margin-bottom:5px;">
									<input type="radio" style="display:inline-block;" name="5443rdpilihan" value="id_loket" />
									<div style="display:inline-block;width:100px;">Loket</div>
								</div>
								<div class="frmItem" style="margin-bottom:5px;">
									<input type="radio" style="display:inline-block;" name="5443rdpilihan" value="id_user" />
									<div style="display:inline-block;width:100px;">User</div>
								</div>
								<div class="frmItem" style="margin-bottom:5px;">
									<div style="display:inline-block;width:100px;">Unit Time</div>
									<input style="display:inline-block;" name="5443unittime" id="5443unittime" class="easyui-numberbox" /> (Minute)
								</div>
								<div class="frmItem">
									<div style="display:inline-block;width:100px;">Tanggal Awal</div>
									<input style="display:inline-block;" id="5443startdate" name="5443startdate" ></input>   	

									<div style="display:inline-block;">Tanggal Akhir</div>
									<input style="display:inline-block;" id="5443finishdate" name="5443finishdate" ></input>  
								</div>
								<br>
								
								<div class="frmItem">
									<a href="javascript:void(0)" class="easyui-linkbutton"  onclick="fnPreview5443()"><font color=#fff>Preview</a>								
									<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="fnPrint_transaksi5443('myPop1',1000,600)"><font color=#fff> Print</a>								
								</div>

				   		   
						</div>

						</form>
					</div>
		
		</div>  

</div>

<script type="text/javascript">
function fnSearch_5443() {
	$('#5443_dtglaporan').datagrid('load',{
		temp_tableKeyword: $('#5443_txttemp_table').val()
	});
}
$(function() {


    $('#5443startdate').datebox({  
    required:true,
   formatter:myformatter	
    }); 
    $('#5443finishdate').datebox({  
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
function fnPreview5443(){
	$('#5443_dtglaporan').datagrid('load',{
		StartKeyword: $('#5443startdate').datebox('getValue'),
		FinishKeyword: $('#5443finishdate').datebox('getValue'),
		PilihanKeyword: $('input[name="5443rdpilihan"]:checked').val(),
		UnitTimeKeyword: $('#5443unittime').val(),
		
	});
}
function fnPrint_transaksi5443( title,w,h) {
 		var startKeyword = $('#5443startdate').datebox('getValue') || 'all';
		var finishKeyword = $('#5443finishdate').datebox('getValue') || 'all';
		var PilihanKeyword = $('input[name="5443rdpilihan"]:checked').val() || 'all';
		var UnitTimeKeyword = $('#5443unittime').val() || 'all';
 
			var left = (screen.width/2)-(w/2);
			var top = (screen.height/2)-(h/2);
			var targetWin = window.open ('index.php/md_laporan_waktu_layanan_summary/fntransaksiDataPrint/'+startKeyword+'/'+finishKeyword+'/'+PilihanKeyword+'/'+UnitTimeKeyword, title, 'toolbar=yes, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
		
}
</script>