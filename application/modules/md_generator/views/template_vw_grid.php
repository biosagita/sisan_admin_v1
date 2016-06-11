<div id="{module_id}_tlb{table_name_label}" style="padding:5px;">
	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAdd{table_name_label}_{module_id}()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEdit{table_name_label}_{module_id}()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDelete{table_name_label}_{module_id}()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="{module_id}_txt{table_name_label}" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_{module_id}()">Find</a>
	</div>
</div>
<table id="{module_id}_dtg{table_name_label}" class="easyui-datagrid" data-options="title:'Data {table_name_label}',url:'{base_url}index.php/md_{table_name_label}/fn{table_name_label}Data/',toolbar:'#{module_id}_tlb{table_name_label}',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           {fields_tabel}
		   <th data-options="field:'{name_field_table}',title:'<b>{text_field_table}</b>',width:{width_field_table},sortable:true" halign="center"></th>
           {/fields_tabel}	

   </tr>
</thead>
</table>
<div id="{module_id}_dlg{table_name_label}" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_{module_id}(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="{module_id}_divWait" align="left" style="padding:10px; height:200px;"><img src="<?php echo base_url(); ?>images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="{module_id}_fra{table_name_label}" id="{module_id}_fra{table_name_label}" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_{module_id}() {
	$('#{module_id}_dtg{table_name_label}').datagrid('load',{
		{table_name_label}Keyword: $('#{module_id}_txt{table_name_label}').val()
	});
}
function fnResize_{module_id}(width,height) {
	$('#{module_id}_fra{table_name_label}').width(width-14);
	$('#{module_id}_fra{table_name_label}').height(height-40);
}
function fnResize_{module_id}(width,height) {
	$('#{module_id}_fra{table_name_label}').width(width-14);
	$('#{module_id}_fra{table_name_label}').height(height-40);
}
function fnAdd{table_name_label}_{module_id}() {
	$('#{module_id}_dlg{table_name_label}').dialog({
		title: 'Input Data {table_name_label}',
		width: 510,
		height: 390
	});
	$('#{module_id}_divWait').show();
	$('#{module_id}_fra{table_name_label}').hide();
	$('#{module_id}_fra{table_name_label}').attr('src','{base_url}index.php/md_{table_name_label}/fn{table_name_label}Add');
	$('#{module_id}_dlg{table_name_label}').window('open');
}
function fnEdit{table_name_label}_{module_id}() {
	var singleRow = $('#{module_id}_dtg{table_name_label}').datagrid('getSelected');
	if(singleRow) {
		$('#{module_id}_dlg{table_name_label}').dialog({
			title: 'Edit Data {k_table_name}',
			width: 510,
			height: 390
		});
		$('#{module_id}_divWait').show();
		$('#{module_id}_fra{table_name_label}').hide();
		{primary_key_tabel}				
		$('#{module_id}_fra{table_name_label}').attr('src','{base_url}index.php/md_{table_name_label}/fn{table_name_label}Edit/'+singleRow.{name_primary});
		{/primary_key_tabel}		

		$('#{module_id}_dlg{table_name_label}').window('open');
	} else {
		alert('Select which {table_name_label} data you want to edit.');
	}
}
function fnSelect{table_name_label}_{module_id}() {
	var singleRow = $('#{module_id}_dtg{table_name_label}').datagrid('getSelected');
	if(singleRow) {
		var v{table_name_label}Id = singleRow.{table_name_label}_uid;
		var v{table_name_label}Login = singleRow.{table_name_label}_ulogin;
		$('#{module_id}_dlg{table_name_label}').dialog({
			title: 'Select {table_name_label} for '+v{table_name_label}Login,
			width: 365,
			height: 290
		});
		$('#{module_id}_divWait').show();
		$('#{module_id}_fra{table_name_label}').hide();
		{primary_key_tabel2}		
		$('#{module_id}_fra{table_name_label}').attr('src','{base_url}index.php/md_{table_name_label}/fn{table_name_label}Choose/'+v{name_primary});
		{/primary_key_tabel2}		
		$('#{module_id}_dlg{table_name_label}').window('open');
	} else {
		alert('Select {table_name_label} Datagrid row first.');
	}
}
function fnDelete{table_name_label}_{module_id}() {
	var singleRow = $('#{module_id}_dtg{table_name_label}').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				{primary_key_tabel3}
				$.post('{base_url}index.php/md_{table_name_label}/fn{table_name_label}Delete/',{Id:singleRow.{name_primary}},function(result) {
				{/primary_key_tabel3}
					if (result.success) {
						$('#{module_id}_dtg{table_name_label}').datagrid('reload');
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