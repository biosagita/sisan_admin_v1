<div class="easyui-layout" data-options="fit:true">

        <div data-options="region:'center',title:'Laporan Antrian'" style="padding:5px;background-color:#efefef;">

					<table id="547_dtglaporan" class="easyui-datagrid" data-options="title:'',url:'<?php echo base_url(); ?>index.php/md_laporan_all_summary/fntransaksiData/',toolbar:'#547_tlblaporan',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
					<thead>
						<tr>

										   <th data-options="field:'namax',title:'<b>Layanan</b>',align:'left',width:80,sortable:true" halign="center"></th>

										   <th data-options="field:'jumlah_customer',title:'<b>Jumlah Customer</b>',align:'center',width:150,sortable:true" halign="center"></th>
					
					   </tr>
					</thead>
					</table>
		</div>  

        <div data-options="region:'south',title:'Filter',split:true" style="height:180px; ">
					<div style="padding:0px 15px;">
						<form name="frmlaporan" id="frmlaporan" accept-charset="utf-8" enctype="multipart/form-data" method="post" novalidate>
						<br>
						<div style="padding:10px;width:850px;border:0px dotted #CCCCCC;border-radius:5px;float:left;clear:left;">
								<div class="frmItem">
									<label><input type="radio" class="easyui-validatebox" name="547pilihan" value="tanggal" checked="checked" /> Tanggal</label>
								</div>
								<br>
								<div class="frmItem">
									<label><input type="radio" class="easyui-validatebox" name="547pilihan" value="layanan" /> Layanan</label>
								</div>
								<br>
								<div class="frmItem">
									<label><input type="radio" class="easyui-validatebox" name="547pilihan" value="loket" /> Loket</label>
								</div>
								<br>
								
								<div class="frmItem">
									<a href="javascript:void(0)" class="easyui-linkbutton"  onclick="fnPreview547()"><font color=#fff>Preview</a>								
									<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="fnPrint_transaksi547('myPop1',1000,600)"><font color=#fff> Print</a>								
								</div>

				   		   
						</div>

						</form>
					</div>
		
		</div>  

</div>

<script type="text/javascript">
function fnSearch_547() {
	$('#547_dtglaporan').datagrid('load',{
		temp_tableKeyword: $('#547_txttemp_table').val()
	});
}
$(function() {


    $('#547startdate').datebox({  
    required:true,
   formatter:myformatter	
    }); 
    $('#547finishdate').datebox({  
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
function fnPreview547(){
	$('#547_dtglaporan').datagrid('load',{
		StartKeyword: $('input[name="547pilihan"]:checked').val(),
		
	});
}
function fnPrint_transaksi547( title,w,h) {
 		var startKeyword = $('input[name="547pilihan"]:checked').val();
 
			var left = (screen.width/2)-(w/2);
			var top = (screen.height/2)-(h/2);
			var targetWin = window.open ('index.php/md_laporan_all_summary/fntransaksiDataPrint/'+startKeyword, title, 'toolbar=yes, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
		
}
</script>