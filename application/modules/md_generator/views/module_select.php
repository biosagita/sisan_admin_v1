<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/themes/gray/easyui-modified.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bro.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/themes/icon.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui/jquery.easyui.min.js"></script>
</head>
<body>
<div class="easyui-layout" style="width:425px; height:400px; background-color:#FFF;">
    <div data-options="region:'center',border:false">
		<table id="trgModules" class="easyui-treegrid" idField="f_mod_id" treeField="f_mod_name" data-options="title:'Available Modules',url:'<?php echo base_url(); ?>index.php/md_generator/fnSelectModule',border:false,singleSelect:true,width:425,height:336">
		<thead>
			<tr>
				<th data-options="field:'f_mod_id',title:'<b>Module ID</b>',hidden:true"></th>
                <th data-options="field:'f_mod_parent',title:'<b>Module Parent</b>',hidden:true"></th>
                <th data-options="field:'f_mod_code',title:'<b>Module Code</b>',hidden:true"></th>
                <th data-options="field:'f_mod_desc',title:'<b>Module Desc</b>',hidden:true"></th>
                <th data-options="field:'f_mod_name',title:'<b>Module Name</b>',width:350"></th>
			</tr>
		</thead>
		</table>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnRoleMod_Modules" align="right" style="padding:5px;">
			<div id="footBarLeft" style="float:left; width:auto; margin:5px 0px 0px 5px;"></div>
			<div id="footBarRight" style="float:right; width:auto; clear:right;">
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="fnSelect()">Select</a>
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="fnCancel()">Cancel</a>
			</div>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
$(document).ready(function() {
	window.parent.$('#10_divWait').hide();
	window.parent.$('#10_fraModal').show();
});


function fnSelect() {
	var singleRow = $('#trgModules').datagrid('getSelected');
	if(!singleRow || singleRow.f_mod_parent == 1) {
		alert('Silahkan pilih dahulu Module yang diinginkan.');
		return false;
	} 
	else 
	{
		var v_mod_id = singleRow.f_mod_id;
		var v_mod_code = singleRow.f_mod_code;
		var v_mod_name = singleRow.f_mod_name;
		var v_mod_desc = singleRow.f_mod_desc;
	}
	window.parent.$('#10_fldId').val(v_mod_id);
	window.parent.$('#10_fldCode').val(v_mod_code);
	window.parent.$('#10_fldName').val(v_mod_name);
	window.parent.$('#10_fldDesc').val(v_mod_desc);
	//window.parent.fnLoad_10(v_mod_code);
	window.parent.$('#10_dlgModal').dialog('close');
}
function fnCancel() {
	window.parent.$('#10_dlgModal').dialog('close');
}
</script>