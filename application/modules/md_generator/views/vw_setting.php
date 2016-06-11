<!--
Module Id	: 10_
Module Code	: md_generator
Module Name	: Module Generator
Description	: Modul ini dipergunakan untuk membuat membuat template module lain
-->
<div class="easyui-layout" data-options="fit:true">
	<div data-options="region:'center',border:false,split:false">
		<div class="easyui-layout" data-options="fit:true"style="background-color:#FFF;">
			<div data-options="region:'center',border:false"style="background-color:#F9F9F9">
				<div id="10_formDiv" style="padding:10px 20px;">
					<form name="10_frmGenerator" id="10_frmGenerator" method="post" novalidate>
					<input type="hidden" id="10_txtActive" value="0">
					<div class="frmTitle">Generate Module</div>
					<div><h2>Select Module</h1></div>
                    <div class="frmItem">
						<label>Module ID</label>
						<input name="10_fldId" id="10_fldId" readonly="readonly" size="5" style="background-color:#E8E8E8"> <a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSelectModule_10()">Select</a>
					</div>
					<div class="frmItem">
						<label>Module Code</label>
						<input name="10_fldCode" id="10_fldCode" readonly="readonly" size="20" style="background-color:#E8E8E8">
					</div>
					<div class="frmItem">
						<label>Module Name</label>
						<input name="10_fldName" id="10_fldName"  readonly="readonly" size="50" style="background-color:#E8E8E8">
					</div>
                    <div class="frmItem">
						<label>Module Description</label>
						<input name="10_fldDesc" id="10_fldDesc" readonly="readonly" size="100" style="background-color:#E8E8E8">
					</div>
                    <br>
                    <div><h2>Select Table</h1></div>
                    <div class="frmItem">
						<label>Module Table</label>
                        <select id="10_fldModuleTable" class="easyui-combobox" name="10_fldModuleTable" style="width:280px;">  
                        </select>  
					</div>
                    <br>
                    <div><h2>Grid Setting</h1></div>
                    <div class="frmItem">
						<label>Grid Title</label>
						<input name="10_fldGridTitle" id="10_fldGridTitle" size="50">
					</div>
                    <div class="frmItem">
						<label>Grid Top Menus</label>
						<input type="checkbox" name="10_fldGridAdd" id="10_fldGridAdd" > Add &nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="10_fldGridEdit" id="10_fldGridEdit" > Edit &nbsp;&nbsp;&nbsp;&nbsp;  <input type="checkbox" name="10_fldGridDelete" id="10_fldGridDelete" > Delete &nbsp;&nbsp;&nbsp;&nbsp;  <input type="checkbox" name="10_fldGridSearch" id="10_fldGridSearch" > Search
					</div>

                    <div class="frmItem">
                    	<table cellpadding="0" cellspacing="0">
                            <tr>
                                <td valign="top">
                                    <label>Datagrid Field(s)</label>
                                </td>
                                <td>
                                	&nbsp;
                                </td>
                                <td>
	<table id="dg" class="easyui-datagrid" style="width:850px;height:auto"
			data-options="
				iconCls: 'icon-edit',
				singleSelect: true,
				toolbar: '#tb',
				url: 'datagrid_data1.json',
				onClickRow: onClickRow
			">
		<thead>
			<tr>
				<th data-options="field:'f_field_name',width:150,editor:'text'">Field Name</th>
				<th data-options="field:'f_field_text',width:150,editor:'text'">Field Text</th>
				
				<th data-options="field:'f_field_visible',width:100,
						formatter:function(value,row){
							return row.visiblevalue;
						},
						editor:{
							type:'combobox',
							options:{
								valueField:'visiblevalue',
								textField:'visiblevalue',
								url:'visible.json',
								required:true
							}
						}">Visible</th>

				<th data-options="field:'f_field_align',width:100,
						formatter:function(value,row){
							return row.alignvalue;
						},
						editor:{
							type:'combobox',
							options:{
								valueField:'alignvalue',
								textField:'alignvalue',
								url:'align.json',
								required:true
							}
						}">Align</th>
				<th data-options="field:'f_field_width',width:70,required:true,editor:'numberbox'">Width</th>
				<th data-options="field:'f_field_sort',width:100,
						formatter:function(value,row){
							return row.sortvalue;
						},
						editor:{
							type:'combobox',
							options:{
								valueField:'sortvalue',
								textField:'sortvalue',
								url:'sort.json',
								required:true								
							}
						}">Sort</th>
				<th data-options="field:'f_field_type',width:100,
						formatter:function(value,row){
							return row.typevalue;
						},
						editor:{
							type:'combobox',
							options:{
								valueField:'typevalue',
								textField:'typevalue',
								url:'type.json',
								required:true
							}
						}">Type</th>
						
			</tr>
		</thead>
	</table>
								<div id="tb" style="height:auto">
									<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" onclick="remove()">Remove</a>
									<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',plain:true" onclick="accept()">Accept</a>
									<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-undo',plain:true" onclick="reject()">Reject</a>
								</div>
                                </td>
                            </tr>
                        </table>
                        </span>
                    </div>
					</form>

					
				</div>
			</div>
			<div data-options="region:'south',border:false" style="height:35px; background-color:#E3E3E3;">
				<div id="10_btn" align="right" style="padding:5px;">
					<div id="10_footBarLeft" style="float:left; width:auto; margin:5px 0px 0px 5px;">
						<span style="background-color:#FF9; border:1px solid #666">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Must be filled.
					</div>
					<div id="10_footBarRight" style="float:right; width:auto; clear:right;">
						<a href="javascript:void(0)" id="10_btnSave" name="10_btnSave" class="easyui-linkbutton" iconCls="icon-ok" onclick="fnGenerate_10()">Generate</a>
                        <a href="javascript:void(0)" id="10_btnSave" name="10_btnSave" class="easyui-linkbutton" iconCls="icon-save" onclick="fnSave_10()">Save</a>
						<a href="javascript:void(0)" id="10_btnCancel" name="10_btnCancel" class="easyui-linkbutton" iconCls="icon-cancel" onclick="fnCancel_10()">Close</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="10_dlgModal" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_10(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="10_divWait" align="left" style="padding:10px; height:200px;"><img src="<?php echo base_url(); ?>images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="10_fraModal" id="10_fraModal" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
$(document).ready(function() {
	//fnLoad_10('md_test');
});

function fnResize_10(width,height) {
	$('#10_fraModal').width(width-14);
	$('#10_fraModal').height(height-40);
}

function fnGenerate_10() {
	$('#10_frmGenerator').form('submit',{
		url: '<?php echo base_url(); ?>index.php/md_generator/fnGenerate/',
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				
			} else {
				
			}
		}
	});
}

function fnSave_10() {
	$('#10_frmGenerator').form('submit',{
		url: '<?php echo base_url(); ?>index.php/md_generator/fnSave/',
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				
			} else {
				
			}
		}
	});
}

function fnLoad_10(pModCode) {
	$('#10_frmGenerator').form('clear').form('load','<?php echo base_url(); ?>index.php/md_generator/fnLoadForm/'+pModCode);
}

function fnCancel_10() {
	
}

function fnSelectModule_10() {
	$('#10_dlgModal').dialog({
		title: 'Input Data Role',
		width: 439,
		height: 440
	});
	$('#10_divWait').show();
	$('#10_fraModal').hide();
	$('#10_fraModal').attr('src','<?php echo base_url()?>index.php/md_generator/fnViewModule');
	$('#10_dlgModal').window('open');
}
$(function() {
	$('#10_fldModuleTable').combobox({
		valueField:'table_val',
		textField:'table_text',
		mode:'remote',
		panelWidth:175,
		panelHeight:'auto',
		onChange:function() {
		fnModuleTableChange();
		},
		url:'<?php echo base_url(); ?>index.php/md_generator/fnModuleTableData/'
	});
});
function fnModuleTableChange() {
	var vModuleTableCode = $('#10_fldModuleTable').combobox('getValue');
	if(vModuleTableCode) {
		$('#dg').datagrid({
			url:'<?php echo base_url(); ?>index.php/md_generator/fnFieldData/'+vModuleTableCode
		});	
		} else {
	alert("");
	}
}


		var editIndex = undefined;
		function endEditing(){
			if (editIndex == undefined){return true}
			if ($('#dg').datagrid('validateRow', editIndex)){
				var f_visible = $('#dg').datagrid('getEditor', {index:editIndex,field:'f_field_visible'});
				var visiblevalue = $(f_visible.target).combobox('getText');
				$('#dg').datagrid('getRows')[editIndex]['visiblevalue'] = visiblevalue;

				var f_align = $('#dg').datagrid('getEditor', {index:editIndex,field:'f_field_align'});
				var alignvalue = $(f_align.target).combobox('getText');
				$('#dg').datagrid('getRows')[editIndex]['alignvalue'] = alignvalue;

				var f_sort = $('#dg').datagrid('getEditor', {index:editIndex,field:'f_field_sort'});
				var sortvalue = $(f_sort.target).combobox('getText');
				$('#dg').datagrid('getRows')[editIndex]['sortvalue'] = sortvalue;

				var f_type = $('#dg').datagrid('getEditor', {index:editIndex,field:'f_field_type'});
				var typevalue = $(f_type.target).combobox('getText');
				$('#dg').datagrid('getRows')[editIndex]['typevalue'] = typevalue;
				$('#dg').datagrid('endEdit', editIndex);							
				
				var vFieldName =$('#dg').datagrid('getRows')[editIndex]['f_field_name'];
				var vFieldText =$('#dg').datagrid('getRows')[editIndex]['f_field_text'];
				var vFieldVisible = visiblevalue;  
				var vFieldAlign = alignvalue;  
				var vFieldWidth =$('#dg').datagrid('getRows')[editIndex]['f_field_width'];				
				var vFieldSort = sortvalue;  
				var vFieldType = typevalue;  
				var vModuleTableCode = $('#10_fldModuleTable').combobox('getValue');

				$('#dg').datagrid({
					url:'<?php echo base_url(); ?>index.php/md_generator/fnSaveDetFields/'+vFieldName+'/'+vFieldText+ '/'+vFieldVisible+ '/'+vFieldAlign+ '/'+vFieldWidth+ '/'+vFieldSort+ '/'+vFieldType+ '/'+vModuleTableCode  
				});	
				
				editIndex = undefined;

				return true;
			} else {
				return false;
			}
		}
		function onClickRow(index){
			if (editIndex != index){
				if (endEditing()){
					$('#dg').datagrid('selectRow', index)
							.datagrid('beginEdit', index);
					editIndex = index;
				} else {
					$('#dg').datagrid('selectRow', editIndex);
				}
			}
		}
		function append(){
			if (endEditing()){
				$('#dg').datagrid('appendRow',{status:'P'});
				editIndex = $('#dg').datagrid('getRows').length-1;
				$('#dg').datagrid('selectRow', editIndex)
						.datagrid('beginEdit', editIndex);
			}
		}
		function remove(){
			if (editIndex == undefined){return}
			$('#dg').datagrid('cancelEdit', editIndex)
					.datagrid('deleteRow', editIndex);
			editIndex = undefined;
		}
		function accept(){
			if (endEditing()){

				$('#dg').datagrid('acceptChanges');

				
			}
		}
		function reject(){
			$('#dg').datagrid('rejectChanges');
			editIndex = undefined;
		}
		function getChanges(){
			var rows = $('#dg').datagrid('getChanges');
			alert(rows.length+' rows are changed!');
		}

</script>