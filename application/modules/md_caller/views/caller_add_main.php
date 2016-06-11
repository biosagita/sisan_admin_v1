<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href='<?php echo base_url(); ?>assets/easyui/themes/gray/easyui-modified.css'>
<link rel="stylesheet" type="text/css" href='<?php echo base_url(); ?>assets/bens.css'>
<link rel="stylesheet" type="text/css" href='<?php echo base_url(); ?>assets/easyui/themes/icon.css'>
<script type="text/javascript" src='<?php echo base_url(); ?>assets/easyui/jquery.min.js'></script>
<script type="text/javascript" src='<?php echo base_url(); ?>assets/easyui/jquery.easyui.min.js'></script>
</head>
<body>
<div class="easyui-layout" style="width:495px; height:350px; background-color:#FFF;">
	<div data-options="region:'center',border:false">
		<div style="padding:0px 15px;">
			<form name="frmcaller" id="frmcaller" method="post" novalidate>
			<div class="frmTitle">Data caller</div>
       
			<div class="frmItem">
				<label>Address Caller</label>
				<input name='address_caller' id='address_caller' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>ID Loket</label>
				<select name='id_loket' id='id_loket' class="easyui-validatebox" data-options="required:true">
					<option value="">--Pilih Loket--</option>
					<?php echo $listloket; ?>
				</select>
			</div>
       
			<div class="frmItem">
				<label>Status Off</label>
				<input name='status_off' id='status_off' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
       			
	   
			</form>
		</div>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btncaller" align="right" style="padding:5px;">
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
	window.parent.$('#91_divWait').hide();
	window.parent.$('#91_fracaller').show();
});
<?php if(isset($vcallerId)) { ?>
$('#frmcaller').form('load','<?php echo base_url()?>index.php/md_caller/fncallerRow/<?php echo $vcallerId; ?>');
url = '<?php echo base_url(); ?>index.php/md_caller/fncallerUpdate/<?php echo $vcallerId; ?>';
<?php } else { ?>
$('#frmcaller').form('clear');
url = '<?php echo base_url(); ?>index.php/md_caller/fncallerCreate/';
<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Must be filled.';
$(function() {
	$('#fldType').combobox({
		valueField:'f_caller_type_id',
		textField:'f_caller_type_name',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_caller/fncallerTypeData/'
	});

	<?php if(isset($vcallerId)) { ?>
	$('#fldLogin').attr('disabled','disabled');
	<?php } ?>
});
function fnSave() {
	fnSaveData();
}
function fnSaveData() {
	$('#frmcaller').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				window.parent.$('#91_dtgcaller').datagrid('reload');
				window.parent.$('#91_dlgcaller').dialog('close');
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel() {
	window.parent.$('#91_dlgcaller').dialog('close');
}
</script>