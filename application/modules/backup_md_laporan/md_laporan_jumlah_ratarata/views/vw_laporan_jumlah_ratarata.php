<div class="easyui-layout" data-options="fit:true">

        <div data-options="region:'center',title:'Laporan Antrian'" style="padding:5px;background-color:#efefef;">

					<table id="546_dtglaporan" class="easyui-datagrid" data-options="title:'',url:'<?php echo base_url(); ?>index.php/md_laporan_jumlah_ratarata/fntransaksiData/',toolbar:'#546_tlblaporan',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
					<thead>
						<tr>


  					           
										   <th data-options="field:'id_transaksi',title:'<b>Id</b>',hidden:true,width:40,sortable:true" halign="center"></th>
										   
										   <th data-options="field:'tanggal_transaksi',title:'<b>Tanggal</b>',align:'center',width:80,sortable:true" halign="center"></th>
								           
										   <th data-options="field:'id_loket',title:'<b>Loket</b>',align:'center',width:80,sortable:true" halign="center"></th>

										   <th data-options="field:'rata-rata',title:'<b>Rata-Rata</b>',align:'center',width:80,sortable:false" halign="center"></th>

					           	
					
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
									<label>Tanggal Awal</label>
									<input id="546startdate" name="546startdate" ></input>   	

									<label>Tanggal Akhir</label>
									<input id="546finishdate" name="546finishdate" ></input>  
								</div>
								<br>
								
								<div class="frmItem">
									<a href="javascript:void(0)" class="easyui-linkbutton"  onclick="fnPreview546()"><font color=#fff>Preview</a>								
									<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="fnPrint_transaksi546('myPop1',1000,600)"><font color=#fff> Print</a>								
								</div>

				   		   
						</div>

						</form>
					</div>
		
		</div>  

</div>

<script type="text/javascript">
function fnSearch_546() {
	$('#546_dtglaporan').datagrid('load',{
		temp_tableKeyword: $('#546_txttemp_table').val()
	});
}
$(function() {


    $('#546startdate').datebox({  
    required:true,
   formatter:myformatter	
    }); 
    $('#546finishdate').datebox({  
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
function fnPreview546(){
	$('#546_dtglaporan').datagrid('load',{
		StartKeyword: $('#546startdate').datebox('getValue'),
		FinishKeyword: $('#546finishdate').datebox('getValue'),
		
	});
}
function fnPrint_transaksi546( title,w,h) {
 		var startKeyword = $('#546startdate').datebox('getValue');
		var finishKeyword = $('#546finishdate').datebox('getValue');
 
			var left = (screen.width/2)-(w/2);
			var top = (screen.height/2)-(h/2);
			var targetWin = window.open ('index.php/md_laporan_jumlah_ratarata/fntransaksiDataPrint/'+startKeyword+'/'+finishKeyword, title, 'toolbar=yes, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
		
}
</script>