<style>
td{
 color:#fff;
}
</style>
	<div class="easyui-layout" data-options="fit:true">
		<div data-options="region:'center',title:'Setting Display'">
		<div style="padding:0px 15px;color:#fff;">
			<form name="frmsetting" id="frmsetting" method="post" novalidate>
		 
		<?php foreach($data_row as $key => $val) : ?>
		<fieldset>
			<legend><?php echo $key; ?>:</legend>
			<table width=100% cellpadding=15px cellspacing=15px>
			<?php foreach($val as $key2 => $val2) : ?>
				<?php if($val2['type_input'] == 'slider') : ?>
					<tr style="height:70px;">
					 	<td width="200">
							<?php echo $val2['setting']; ?>
						</td>
						<td>
							<input name='own_input_<?php echo $val2['id_setting']; ?>' id='own_input_<?php echo $val2['id_setting']; ?>' class="easyui-slider" value="<?php echo $val2['nilai']; ?>" style="width:300px;" data-options="showTip:true,rule:[0,'|',25,'|',50,'|',75,'|',100]">
							<script type="text/javascript">
								$(function() {
									//$('#own_input_<?php echo $val2['id_setting']; ?>').slider('setValue',25);
								});
							</script>
						</td>
					</tr>
				<?php elseif($val2['type_input'] == 'timespinner') : ?>
					<tr>
					 	<td width="200">
							<?php echo $val2['setting']; ?>
						</td>
						<td>
							<input style="width:100%;" name='own_input_<?php echo $val2['id_setting']; ?>' id='own_input_<?php echo $val2['id_setting']; ?>' class="easyui-timespinner" data-options="showSeconds:true" value="<?php echo $val2['nilai']; ?>">
						</td>
					</tr>
				<?php elseif($val2['type_input'] == 'refertable') : ?>
					<tr>
					 	<td width="200">
							<?php echo $val2['setting']; ?>
						</td>
						<td>
							<select name='own_input_<?php echo $val2['id_setting']; ?>' id='own_input_<?php echo $val2['id_setting']; ?>'>
								<option value="">-- Pilihan --</option>
								<?php foreach($val2['option_refer_table'] as $key => $val) : ?>
									<?php
										$selected = ($key == $val2['nilai']) ? 'selected="selected"' : '';
									?>
									<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
				<?php else : ?>
					<tr>
					 	<td width="200">
							<?php echo $val2['setting']; ?>
						</td>
						<td>
							<input style="width:100%;" name='own_input_<?php echo $val2['id_setting']; ?>' id='own_input_<?php echo $val2['id_setting']; ?>' data-options="required:true" value="<?php echo $val2['nilai']; ?>">
						</td>
					</tr>
				<?php endif; ?>
			<?php endforeach; ?>
			</table>
		</fieldset>
		<br />
		<?php endforeach; ?>
		
		</div>		
		</div>
	
		<div data-options="region:'south',split:true" style="height:80px;padding:20px;">
						<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="fnSave()"><font color=#fff>Save</font></a>
			
		</div>

			</form>

	</div>


<div id="85_dlgsetting" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_85(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="85_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/antrian/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="85_frasetting" id="85_frasetting" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">

url = '<?php echo base_url(); ?>index.php/md_setting/fnUpdatesetting_New/';			 

function fnSave() {
	$('#frmsetting').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				window.parent.$('#85_dtgsetting').datagrid('reload');
				window.parent.$('#85_dlgsetting').dialog('close');
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}

function fnSearch_85() {
	$('#85_dtgsetting').datagrid('load',{
		settingKeyword: $('#85_txtsetting').val()
	});
}
function fnResize_85(width,height) {
	$('#85_frasetting').width(width-14);
	$('#85_frasetting').height(height-40);
}
function fnResize_85(width,height) {
	$('#85_frasetting').width(width-14);
	$('#85_frasetting').height(height-40);
}
function fnAddsetting_85() {
	$('#85_dlgsetting').dialog({
		title: 'Input Data setting',
		width: 510,
		height: 390
	});
	$('#85_divWait').show();
	$('#85_frasetting').hide();
	$('#85_frasetting').attr('src','<?php echo base_url(); ?>index.php/md_setting/fnsettingAdd');
	$('#85_dlgsetting').window('open');
}
function fnEditsetting_85() {
	var singleRow = $('#85_dtgsetting').datagrid('getSelected');
	if(singleRow) {
		$('#85_dlgsetting').dialog({
			title: 'Edit Data Setting',
			width: 510,
			height: 390
		});
		$('#85_divWait').show();
		$('#85_frasetting').hide();
						
		$('#85_frasetting').attr('src','<?php echo base_url(); ?>index.php/md_setting/fnsettingEdit/'+singleRow.id_setting);
				

		$('#85_dlgsetting').window('open');
	} else {
		alert('Select which setting data you want to edit.');
	}
}
function fnSelectsetting_85() {
	var singleRow = $('#85_dtgsetting').datagrid('getSelected');
	if(singleRow) {
		var vsettingId = singleRow.setting_uid;
		var vsettingLogin = singleRow.setting_ulogin;
		$('#85_dlgsetting').dialog({
			title: 'Select setting for '+vsettingLogin,
			width: 365,
			height: 290
		});
		$('#85_divWait').show();
		$('#85_frasetting').hide();
				
		$('#85_frasetting').attr('src','<?php echo base_url(); ?>index.php/md_setting/fnsettingChoose/'+vid_setting);
				
		$('#85_dlgsetting').window('open');
	} else {
		alert('Select setting Datagrid row first.');
	}
}
function fnDeletesetting_85() {
	var singleRow = $('#85_dtgsetting').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_setting/fnsettingDelete/',{Id:singleRow.id_setting},function(result) {
				
					if (result.success) {
						$('#85_dtgsetting').datagrid('reload');
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