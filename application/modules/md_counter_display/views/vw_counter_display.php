<div id="92_tlbcounter_display" style="padding:5px;">
	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddcounter_display_92()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditcounter_display_92()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeletecounter_display_92()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="92_txtcounter_display" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_92()">Find</a>
	</div>
</div>
<table id="92_dtgcounter_display" class="easyui-datagrid" data-options="title:'Data counter_display',url:'<?php echo base_url(); ?>index.php/md_counter_display/fncounter_displayData/',toolbar:'#92_tlbcounter_display',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'Address_cd',title:'<b>Address CD</b>',width:100,sortable:true" halign="center"></th>
           
		   <th data-options="field:'id_loket',title:'<b>Nama Loket</b>',width:100,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
<div id="92_dlgcounter_display" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_92(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="92_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/antrian_admin/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="92_fracounter_display" id="92_fracounter_display" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_92() {
	$('#92_dtgcounter_display').datagrid('load',{
		counter_displayKeyword: $('#92_txtcounter_display').val()
	});
}
function fnResize_92(width,height) {
	$('#92_fracounter_display').width(width-14);
	$('#92_fracounter_display').height(height-40);
}
function fnResize_92(width,height) {
	$('#92_fracounter_display').width(width-14);
	$('#92_fracounter_display').height(height-40);
}
function fnAddcounter_display_92() {
	$('#92_dlgcounter_display').dialog({
		title: 'Input Data counter_display',
		width: 510,
		height: 390
	});
	$('#92_divWait').show();
	$('#92_fracounter_display').hide();
	$('#92_fracounter_display').attr('src','<?php echo base_url(); ?>index.php/md_counter_display/fncounter_displayAdd');
	$('#92_dlgcounter_display').window('open');
}
function fnEditcounter_display_92() {
	var singleRow = $('#92_dtgcounter_display').datagrid('getSelected');
	if(singleRow) {
		$('#92_dlgcounter_display').dialog({
			title: 'Edit Data Counter_display',
			width: 510,
			height: 390
		});
		$('#92_divWait').show();
		$('#92_fracounter_display').hide();
						
		$('#92_fracounter_display').attr('src','<?php echo base_url(); ?>index.php/md_counter_display/fncounter_displayEdit/'+singleRow.id_counter_display);
				

		$('#92_dlgcounter_display').window('open');
	} else {
		alert('Select which counter_display data you want to edit.');
	}
}
function fnSelectcounter_display_92() {
	var singleRow = $('#92_dtgcounter_display').datagrid('getSelected');
	if(singleRow) {
		var vcounter_displayId = singleRow.counter_display_uid;
		var vcounter_displayLogin = singleRow.counter_display_ulogin;
		$('#92_dlgcounter_display').dialog({
			title: 'Select counter_display for '+vcounter_displayLogin,
			width: 365,
			height: 290
		});
		$('#92_divWait').show();
		$('#92_fracounter_display').hide();
				
		$('#92_fracounter_display').attr('src','<?php echo base_url(); ?>index.php/md_counter_display/fncounter_displayChoose/'+vid_counter_display);
				
		$('#92_dlgcounter_display').window('open');
	} else {
		alert('Select counter_display Datagrid row first.');
	}
}
function fnDeletecounter_display_92() {
	var singleRow = $('#92_dtgcounter_display').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_counter_display/fncounter_displayDelete/',{Id:singleRow.id_counter_display},function(result) {
				
					if (result.success) {
						$('#92_dtgcounter_display').datagrid('reload');
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