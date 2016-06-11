<!---
Module Id   : {module_id}
Module Code : {module_code}
Module Name : {module_name}
Description : {module_desc}
--->
<div id="{module_id}_tlbTopMenu" style="padding:5px;">
	<div style="float:left;">
    	{php_open_first} if(isset($btAdd)) {{php_close_first}
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAdd_{module_id}()">Add Closing</a>
        {php_open_first} } {php_close_first}
        {php_open_first} if(isset($btUpdate)) {{php_close_first}
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEdit_{module_id}()">Edit Closing</a>
        {php_open_first} } {php_close_first}
        {php_open_first} if(isset($btPrint)) {{php_close_first}
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="fnPrint_{module_id}()">Print Template</a>
        {php_open_first} } {php_close_first}
	</div>
	<div style="float:right;clear:right;">
		<span>Insured:</span>
		<input id="{module_id}_txtSearch" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_{module_id}()">Cari</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnReset_{module_id}()">Reset</a>
	</div>
</div>
<table id="{module_id}_dtgData" class="easyui-datagrid" data-options="title:'Datagrid Register Closing',url:'{php_open_first} echo base_url(); {php_close_first}index.php/{module_code}/fnData/',toolbar:'#{module_id}_tlbTopMenu',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,striped:true,pageList:[20,50,100,500]">
<thead>
	<tr>
		<th data-options="field:'closing_regslip_id',title:'<b>ID#</b>',width:80,sortable:true" halign="center"></th>
        <th data-options="field:'closing_regslip_insured',title:'<b>Insured</b>',width:360,sortable:true" halign="center"></th>
		<th data-options="field:'closing_regslip_date',title:'<b>Date</b>',width:120,sortable:true" align="center" halign="center"></th>
		<th data-options="field:'closing_segment',title:'<b>Segment</b>',width:100,sortable:true" halign="center"></th>
		<th data-options="field:'closing_regslip_classrisk',title:'<b>Risk</b>',width:100" halign="center"></th>
		<th data-options="field:'closing_regslip_desc',title:'<b>Description</b>',width:300" halign="center"></th>
	</tr>
</thead>
</table>
<div id="{module_id}_dlgModal" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_{module_id}(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="{module_id}_divWait" align="left" style="padding:10px; height:200px;"><img src="{php_open_first} echo base_url(); {php_close_first}images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="{module_id}_fraModal" id="{module_id}_fraModal" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_{module_id}() {
	$('#{module_id}_dtgData').datagrid('load',{
		InsuredKeyword: $('#{module_id}_txtSearch').val()
	});
}
function fnReset_{module_id}() {
	$('#{module_id}_txtSearch').val('');
	$('#{module_id}_dtgData').datagrid('load',{
		InsuredKeyword: $('#{module_id}_txtSearch').val()
	});
}
function fnResize_{module_id}(width, height) {
	$('#{module_id}_fraModal').width(width-14);
	$('#{module_id}_fraModal').height(height-40);
}
function fnAdd_{module_id}() {

}
function fnEdit_{module_id}() {

}
</script>