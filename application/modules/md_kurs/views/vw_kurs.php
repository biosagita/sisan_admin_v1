<div id="200_tlbkurs" style="padding:5px;">
	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddkurs_200()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditkurs_200()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeletekurs_200()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="200_txtkurs" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_200()">Find</a>
	</div>
</div>
<table id="200_dtgkurs" class="easyui-datagrid" data-options="title:'Data kurs',url:'<?php echo base_url(); ?>index.php/md_kurs/fnkursData/',toolbar:'#200_tlbkurs',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
            <th data-options="field:'id_kurs',title:'<b>id kurs</b>',hidden:true, width:40,sortable:true" halign="center"></th>
            <th data-options="field:'nama_kurs',title:'<b>Nama Kurs</b>',width:200,sortable:true" halign="center"></th>
            <th data-options="field:'simbol_kurs',title:'<b>Simbol Kurs</b>',width:200,sortable:true" halign="center"></th> 	
		    <th data-options="field:'kurs_jual',title:'<b>Jenis Kurs Jual</b>',width:200,sortable:true" halign="center"></th>
            <th data-options="field:'kurs_beli',title:'<b>Kurs Beli</b>',width:200,sortable:true" halign="center"></th> 	

   </tr>
</thead>
</table>
<div id="200_dlgkurs" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_200(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="200_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/generator/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="200_frakurs" id="200_frakurs" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_200() {
	$('#200_dtgkurs').datagrid('load',{
		kursKeyword: $('#200_txtkurs').val()
	});
}
function fnResize_200(width,height) {
	$('#200_frakurs').width(width-14);
	$('#200_frakurs').height(height-40);
}
function fnResize_200(width,height) {
	$('#200_frakurs').width(width-14);
	$('#200_frakurs').height(height-40);
}
function fnAddkurs_200() {
	$('#200_dlgkurs').dialog({
		title: 'Input Data kurs',
		width: 510,
		height: 390
	});
	$('#200_divWait').show();
	$('#200_frakurs').hide();
	$('#200_frakurs').attr('src','<?php echo base_url(); ?>index.php/md_kurs/fnkursAdd');
	$('#200_dlgkurs').window('open');
}
function fnEditkurs_200() {
	var singleRow = $('#200_dtgkurs').datagrid('getSelected');
	if(singleRow) {
		$('#200_dlgkurs').dialog({
			title: 'Edit Data Kurs',
			width: 510,
			height: 390
		});
		$('#200_divWait').show();
		$('#200_frakurs').hide();
						
		$('#200_frakurs').attr('src','<?php echo base_url(); ?>index.php/md_kurs/fnkursEdit/'+singleRow.id_kurs);
				

		$('#200_dlgkurs').window('open');
	} else {
		alert('Select which kurs data you want to edit.');
	}
}
function fnSelectkurs_200() {
	var singleRow = $('#200_dtgkurs').datagrid('getSelected');
	if(singleRow) {
		var vkursId = singleRow.kurs_uid;
		var vkursLogin = singleRow.kurs_ulogin;
		$('#200_dlgkurs').dialog({
			title: 'Select kurs for '+vkursLogin,
			width: 365,
			height: 290
		});
		$('#200_divWait').show();
		$('#200_frakurs').hide();
				
		$('#200_frakurs').attr('src','<?php echo base_url(); ?>index.php/md_kurs/fnkursChoose/'+vid_kurs);
				
		$('#200_dlgkurs').window('open');
	} else {
		alert('Select kurs Datagrid row first.');
	}
}
function fnDeletekurs_200() {
	var singleRow = $('#200_dtgkurs').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_kurs/fnkursDelete/',{Id:singleRow.id_kurs},function(result) {
				
					if (result.success) {
						$('#200_dtgkurs').datagrid('reload');
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