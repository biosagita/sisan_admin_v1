<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href='<?php echo base_url(); ?>assets/easyui/themes/gray/easyui-modified.css'>
<link rel="stylesheet" type="text/css" href='<?php echo base_url(); ?>assets/bens.css'>
<link rel="stylesheet" type="text/css" href='<?php echo base_url(); ?>assets/easyui/themes/icon.css'>
<script type="text/javascript" src='<?php echo base_url(); ?>assets/easyui/jquery.min.js'></script>
<script type="text/javascript" src='<?php echo base_url(); ?>assets/easyui/jquery.easyui.min.js'></script>
<style type="text/css">
	.spinner{width:100px !important;}
	.easyui-timespinner{width:78px !important;}
</style>
</head>
<body>
<div class="easyui-layout" style="width:495px; height:350px; background-color:#FFF;">
	<div data-options="region:'center',border:false">
		<div style="padding:0px 15px;">
			<form name="frmwaktu_layanan" id="frmwaktu_layanan" method="post" novalidate>
			<div class="frmTitle">Data waktu_layanan</div>
       
			<div class="frmItem">
				<label>Waktu Awal 1</label>
				<input name='waktu_awal_1' id='waktu_awal_1' class="easyui-timespinner" style="width:100px;" data-options="showSeconds:true">
			</div>
       
			<div class="frmItem">
				<label>Waktu Akhir 1</label>
				<input name='waktu_akhir_1' id='waktu_akhir_1' class="easyui-timespinner" style="width:100px;" data-options="showSeconds:true">
			</div>
       
			<div class="frmItem">
				<label>Waktu Awal 2</label>
				<input name='waktu_awal_2' id='waktu_awal_2' class="easyui-timespinner" style="width:100px;" data-options="showSeconds:true">
			</div>
       
			<div class="frmItem">
				<label>Waktu Akhir 2</label>
				<input name='waktu_akhir_2' id='waktu_akhir_2' class="easyui-timespinner" style="width:100px;" data-options="showSeconds:true">
			</div>
       
			<div class="frmItem">
				<label>Waktu Awal 3</label>
				<input name='waktu_awal_3' id='waktu_awal_3' class="easyui-timespinner" style="width:100px;" data-options="showSeconds:true">
			</div>
       
			<div class="frmItem">
				<label>Waktu Akhir 3</label>
				<input name='waktu_akhir_3' id='waktu_akhir_3' class="easyui-timespinner" style="width:100px;" data-options="showSeconds:true">
			</div>
       
			<div class="frmItem">
				<label>Keterangan</label>
				<input name='keterangan' id='keterangan' class="easyui-validatebox" style="width:100px;" data-options="required:true">
			</div>
       			
	   
			</form>
		</div>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnwaktu_layanan" align="right" style="padding:5px;">
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
	window.parent.$('#93_divWait').hide();
	window.parent.$('#93_frawaktu_layanan').show();
});
<?php if(isset($vwaktu_layananId)) { ?>
$('#frmwaktu_layanan').form('load','<?php echo base_url()?>index.php/md_waktu_layanan/fnwaktu_layananRow/<?php echo $vwaktu_layananId; ?>');
url = '<?php echo base_url(); ?>index.php/md_waktu_layanan/fnwaktu_layananUpdate/<?php echo $vwaktu_layananId; ?>';
<?php } else { ?>
$('#frmwaktu_layanan').form('clear');
url = '<?php echo base_url(); ?>index.php/md_waktu_layanan/fnwaktu_layananCreate/';
<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Must be filled.';
$(function() {
	$('#fldType').combobox({
		valueField:'f_waktu_layanan_type_id',
		textField:'f_waktu_layanan_type_name',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_waktu_layanan/fnwaktu_layananTypeData/'
	});

	<?php if(isset($vwaktu_layananId)) { ?>
	$('#fldLogin').attr('disabled','disabled');
	<?php } ?>
});
function fnSave() {
	fnSaveData();
}
function fnSaveData() {
	$('#frmwaktu_layanan').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				window.parent.$('#93_dtgwaktu_layanan').datagrid('reload');
				window.parent.$('#93_dlgwaktu_layanan').dialog('close');
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel() {
	window.parent.$('#93_dlgwaktu_layanan').dialog('close');
}
</script>