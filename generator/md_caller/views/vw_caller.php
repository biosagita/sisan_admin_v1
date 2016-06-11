<div id="91_tlbcaller" style="padding:5px;">
	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddcaller_91()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditcaller_91()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeletecaller_91()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="91_txtcaller" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_91()">Find</a>
	</div>
</div>
<table id="91_dtgcaller" class="easyui-datagrid" data-options="title:'Data caller',url:'<?php echo base_url(); ?>index.php/md_caller/fncallerData/',toolbar:'#91_tlbcaller',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'id_caller',title:'<b>Caller</b>',width:80,sortable:true" halign="center"></th>
           
		   <th data-options="field:'address_caller',title:'<b>Address%20Caller</b>',width:100,sortable:true" halign="center"></th>
           
		   <th data-options="field:'id_loket',title:'<b>ID%20Loket</b>',width:100,sortable:true" halign="center"></th>
           
		   <th data-options="field:'status_off',title:'<b>Status%20Off</b>',width:100,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
<div id="91_dlgcaller" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_91(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="91_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/antrian_admin/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="91_fracaller" id="91_fracaller" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_91() {
	$('#91_dtgcaller').datagrid('load',{
		callerKeyword: $('#91_txtcaller').val()
	});
}
function fnResize_91(width,height) {
	$('#91_fracaller').width(width-14);
	$('#91_fracaller').height(height-40);
}
function fnResize_91(width,height) {
	$('#91_fracaller').width(width-14);
	$('#91_fracaller').height(height-40);
}
function fnAddcaller_91() {
	$('#91_dlgcaller').dialog({
		title: 'Input Data caller',
		width: 510,
		height: 390
	});
	$('#91_divWait').show();
	$('#91_fracaller').hide();
	$('#91_fracaller').attr('src','<?php echo base_url(); ?>index.php/md_caller/fncallerAdd');
	$('#91_dlgcaller').window('open');
}
function fnEditcaller_91() {
	var singleRow = $('#91_dtgcaller').datagrid('getSelected');
	if(singleRow) {
		$('#91_dlgcaller').dialog({
			title: 'Edit Data Caller',
			width: 510,
			height: 390
		});
		$('#91_divWait').show();
		$('#91_fracaller').hide();
						
		$('#91_fracaller').attr('src','<?php echo base_url(); ?>index.php/md_caller/fncallerEdit/'+singleRow.id_caller);
				

		$('#91_dlgcaller').window('open');
	} else {
		alert('Select which caller data you want to edit.');
	}
}
function fnSelectcaller_91() {
	var singleRow = $('#91_dtgcaller').datagrid('getSelected');
	if(singleRow) {
		var vcallerId = singleRow.caller_uid;
		var vcallerLogin = singleRow.caller_ulogin;
		$('#91_dlgcaller').dialog({
			title: 'Select caller for '+vcallerLogin,
			width: 365,
			height: 290
		});
		$('#91_divWait').show();
		$('#91_fracaller').hide();
				
		$('#91_fracaller').attr('src','<?php echo base_url(); ?>index.php/md_caller/fncallerChoose/'+vid_caller);
				
		$('#91_dlgcaller').window('open');
	} else {
		alert('Select caller Datagrid row first.');
	}
}
function fnDeletecaller_91() {
	var singleRow = $('#91_dtgcaller').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_caller/fncallerDelete/',{Id:singleRow.id_caller},function(result) {
				
					if (result.success) {
						$('#91_dtgcaller').datagrid('reload');
					} else {
						$.messager.show({title:'Error',msg:result.msg});
					}
				},'json');
			}
		});
	} else {
		alert('Select the data that you want to Delete.');
	}
}
</script>