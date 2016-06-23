<div id="967_tlbfooter" style="padding:5px;">
	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddfooter_967()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditfooter_967()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeletefooter_967()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="967_txtfooter" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_967()">Find</a>
	</div>
</div>
<table id="967_dtgfooter" class="easyui-datagrid" data-options="title:'Data footer',url:'<?php echo base_url(); ?>index.php/md_footer/fnfooterData/',toolbar:'#967_tlbfooter',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'id_footer',title:'<b>Id</b>',width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'text_footer',title:'<b>Text</b>',width:500,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
<div id="967_dlgfooter" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_967(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="967_divWait" align="left" style="padding:10px; height:200px;"><img src="<?php echo base_url(); ?>images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="967_frafooter" id="967_frafooter" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_967() {
	$('#967_dtgfooter').datagrid('load',{
		footerKeyword: $('#967_txtfooter').val()
	});
}
function fnResize_967(width,height) {
	$('#967_frafooter').width(width-14);
	$('#967_frafooter').height(height-40);
}
function fnResize_967(width,height) {
	$('#967_frafooter').width(width-14);
	$('#967_frafooter').height(height-40);
}
function fnAddfooter_967() {
	$('#967_dlgfooter').dialog({
		title: 'Input Data footer',
		width: 510,
		height: 390
	});
	$('#967_divWait').show();
	$('#967_frafooter').hide();
	$('#967_frafooter').attr('src','<?php echo base_url(); ?>index.php/md_footer/fnfooterAdd');
	$('#967_dlgfooter').window('open');
}
function fnEditfooter_967() {
	var singleRow = $('#967_dtgfooter').datagrid('getSelected');
	if(singleRow) {
		$('#967_dlgfooter').dialog({
			title: 'Edit Data footer',
			width: 510,
			height: 390
		});
		$('#967_divWait').show();
		$('#967_frafooter').hide();
						
		$('#967_frafooter').attr('src','<?php echo base_url(); ?>index.php/md_footer/fnfooterEdit/'+singleRow.id_footer);
				

		$('#967_dlgfooter').window('open');
	} else {
		alert('Select which footer data you want to edit.');
	}
}
function fnSelectfooter_967() {
	var singleRow = $('#967_dtgfooter').datagrid('getSelected');
	if(singleRow) {
		var vfooterId = singleRow.footer_uid;
		var vfooterLogin = singleRow.footer_ulogin;
		$('#967_dlgfooter').dialog({
			title: 'Select footer for '+vfooterLogin,
			width: 365,
			height: 290
		});
		$('#967_divWait').show();
		$('#967_frafooter').hide();
				
		$('#967_frafooter').attr('src','<?php echo base_url(); ?>index.php/md_footer/fnfooterChoose/'+vid_footer);
				
		$('#967_dlgfooter').window('open');
	} else {
		alert('Select footer Datagrid row first.');
	}
}
function fnDeletefooter_967() {
	var singleRow = $('#967_dtgfooter').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_footer/fnfooterDelete/',{Id:singleRow.id_footer},function(result) {
				
					if (result.success) {
						$('#967_dtgfooter').datagrid('reload');
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