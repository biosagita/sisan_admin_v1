<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href='{base_url}assets/easyui/themes/gray/easyui-modified.css'>
<link rel="stylesheet" type="text/css" href='{base_url}assets/bens.css'>
<link rel="stylesheet" type="text/css" href='{base_url}assets/easyui/themes/icon.css'>
<script type="text/javascript" src='{base_url}assets/easyui/jquery.min.js'></script>
<script type="text/javascript" src='{base_url}assets/easyui/jquery.easyui.min.js'></script>
</head>
<body>
<div class="easyui-layout" style="width:495px; height:350px; background-color:#FFF;">
	<div data-options="region:'center',border:false">
		<div style="padding:0px 15px;">
			<form name="frm{table_name_label}" id="frm{table_name_label}" method="post" novalidate>
			<div class="frmTitle">Data {table_name_label}</div>
			
         {fields_tabel}
			<div class="frmItem">
				<label>{text_field_table}</label>
				<input name='{name_field_table}' id='{name_field_table}' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
       {/fields_tabel}			
	   
			</form>
		</div>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btn{table_name_label}" align="right" style="padding:5px;">
			<div id="footBarLeft" style="float:left; width:auto; margin:5px 0px 0px 5px;">
				<span style="background-color:#FF9; border:1px solid #666">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Must be filled.
			</div>
			<div id="footBarRight" style="float:right; width:auto; clear:right;">
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="fnSave()">Save</a>
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="fnCancel()">Cancel</a>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
	window.parent.$('#{module_id}_divWait').hide();
	window.parent.$('#{module_id}_fra{table_name_label}').show();
});
{php_open} if(isset($v{table_name_label}Id)) { {php_close}
$('#frm{table_name_label}').form('load','{php_open} echo base_url(){php_close}index.php/md_{table_name_label}/fn{table_name_label}Row/{php_open} echo $v{table_name_label}Id; {php_close}');
url = '{php_open} echo base_url(); {php_close}index.php/md_{table_name_label}/fn{table_name_label}Update/{php_open} echo $v{table_name_label}Id; {php_close}';
{php_open} } else { {php_close}
$('#frm{table_name_label}').form('clear');
url = '{php_open} echo base_url(); {php_close}index.php/md_{table_name_label}/fn{table_name_label}Create/';
{php_open} } {php_close}
$.fn.validatebox.defaults.missingMessage = 'Must be filled.';
$(function() {
	$('#fldType').combobox({
		valueField:'f_{table_name_label}_type_id',
		textField:'f_{table_name_label}_type_name',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',
		url:'{php_open} echo base_url(); {php_close}index.php/md_{table_name_label}/fn{table_name_label}TypeData/'
	});

	{php_open} if(isset($v{table_name_label}Id)) { {php_close}
	$('#fldLogin').attr('disabled','disabled');
	{php_open} } {php_close}
});
function fnSave() {
	fnSaveData();
}
function fnSaveData() {
	$('#frm{table_name_label}').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				window.parent.$('#{module_id}_dtg{table_name_label}').datagrid('reload');
				window.parent.$('#{module_id}_dlg{table_name_label}').dialog('close');
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel() {
	window.parent.$('#{module_id}_dlg{table_name_label}').dialog('close');
}
</script>