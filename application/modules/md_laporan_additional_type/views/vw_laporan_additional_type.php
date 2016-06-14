<div class="easyui-layout" data-options="fit:true">

        <div data-options="region:'center',title:'Laporan Antrian'" style="padding:5px;background-color:#efefef;">

					<table id="007_dtglaporan" class="easyui-datagrid" data-options="title:'',url:'<?php echo base_url(); ?>index.php/md_laporan_additional_type/fnAdditionalTypeData/',toolbar:'#007_tlblaporan',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
					<thead>
						<tr>


  					           
										   <th data-options="field:'adty_id',title:'<b>Id</b>',hidden:true,width:40,sortable:true" halign="left"></th>

										   <th data-options="field:'adty_type_info',title:'<b>Info</b>',align:'left',width:510,sortable:true" halign="left"></th>

										   <th data-options="field:'adty_note',title:'<b>Note</b>',width:210,sortable:false" halign="left"></th>
								           
										   <th data-options="field:'adty_entrydate',title:'<b>Entry Date</b>',width:110,sortable:true" halign="left"></th>

					           	
					
					   </tr>
					</thead>
					</table>
		</div>  

        <div data-options="region:'south',title:'Filter',split:true" style="height:180px; ">
					<div style="padding:0px 15px;">
						<form name="frmlaporan" id="frmlaporan" accept-charset="utf-8" enctype="multipart/form-data" method="post" novalidate>
						<br>
						<div style="padding:0 10px;width:850px;border:0px dotted #CCCCCC;border-radius:5px;float:left;clear:left;">
								<div class="frmItem">
									<div style="display:inline-block;width:100px;">Keyword</div>
									<input style="display:inline-block;" id="007additionalTypeKeyword" name="007additionalTypeKeyword" ></input>
								</div>
								<br>
								<div class="frmItem">
									<div style="display:inline-block;width:100px;">Tanggal Awal</div>
									<input style="display:inline-block;" id="007startdate" name="007startdate" ></input>   	

									<div style="display:inline-block;">Tanggal Akhir</div>
									<input style="display:inline-block;" id="007finishdate" name="007finishdate" ></input>  
								</div>
								<br>
								
								<div class="frmItem">
									<a href="javascript:void(0)" class="easyui-linkbutton"  onclick="fnPreview()"><font color=#fff>Preview</a>								
									<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="fnPrint_transaksi_text('myPop1',1000,600)"><font color=#fff> Print Text</a>
									<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="fnPrint_transaksi('myPop1',1000,600)"><font color=#fff> Print</a>								
								</div>

				   		   
						</div>

						</form>
					</div>
		
		</div>  

</div>

<script type="text/javascript">
function fnSearch_007() {
	$('#007_dtglaporan').datagrid('load',{
		temp_tableKeyword: $('#007_txttemp_table').val()
	});
}
$(function() {
    $('#007startdate').datebox({  
    required:true,
   formatter:myformatter	
    }); 
    $('#007finishdate').datebox({  
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
function fnPreview(){
	$('#007_dtglaporan').datagrid('load',{
		StartKeyword: $('#007startdate').datebox('getValue'),
		FinishKeyword: $('#007finishdate').datebox('getValue'),
		AdditionalTypeKeyword: $('#007additionalTypeKeyword').val(),
	});
}
function fnPrint_transaksi( title,w,h) {
 		var startKeyword = $('#007startdate').datebox('getValue') || 'all';
		var finishKeyword = $('#007finishdate').datebox('getValue') || 'all';
		var AdditionalTypeKeyword = $('#007additionalTypeKeyword').val();
 
			var left = (screen.width/2)-(w/2);
			var top = (screen.height/2)-(h/2);
			var targetWin = window.open ('index.php/md_laporan_additional_type/fnAdditionalTypeDataPrint/'+startKeyword+'/'+finishKeyword+'/'+AdditionalTypeKeyword, title, 'toolbar=yes, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
		
}

function fnPrint_transaksi_text( title,w,h) {
 		var startKeyword = $('#007startdate').datebox('getValue') || 'all';
		var finishKeyword = $('#007finishdate').datebox('getValue') || 'all';
		var AdditionalTypeKeyword = $('#007additionalTypeKeyword').val();
 
			var left = (screen.width/2)-(w/2);
			var top = (screen.height/2)-(h/2);
			var targetWin = window.open ('index.php/md_laporan_additional_type/fnAdditionalTypeDataPrintText/'+startKeyword+'/'+finishKeyword+'/'+AdditionalTypeKeyword, title, 'toolbar=yes, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
		
}
</script>