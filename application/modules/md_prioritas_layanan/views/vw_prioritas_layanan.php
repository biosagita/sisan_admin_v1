<div id="94_tlbprioritas_layanan" style="padding:5px;">
	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddprioritas_layanan_94()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditprioritas_layanan_94()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeleteprioritas_layanan_94()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="94_txtprioritas_layanan" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_94()">Find</a>
	</div>
</div>
<table id="94_dtgprioritas_layanan" class="easyui-datagrid" data-options="title:'Data prioritas_layanan',url:'<?php echo base_url(); ?>index.php/md_prioritas_layanan/fnprioritas_layananData/',toolbar:'#94_tlbprioritas_layanan',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'id_group_loket',title:'<b>Group Loket</b>',width:100,sortable:true" halign="center"></th>
           
		   <th data-options="field:'id_group_layanan',title:'<b>Group Layanan</b>',width:100,sortable:true" halign="center"></th>
           
		   <th data-options="field:'Prioritas',title:'<b>Prioritas</b>',width:100,sortable:true" halign="center"></th>
           
		   <th data-options="field:'keterangan',title:'<b>Keterangan</b>',width:100,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
<div id="94_dlgprioritas_layanan" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_94(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="94_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/antrian_admin/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="94_fraprioritas_layanan" id="94_fraprioritas_layanan" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_94() {
	$('#94_dtgprioritas_layanan').datagrid('load',{
		prioritas_layananKeyword: $('#94_txtprioritas_layanan').val()
	});
}
function fnResize_94(width,height) {
	$('#94_fraprioritas_layanan').width(width-14);
	$('#94_fraprioritas_layanan').height(height-40);
}
function fnResize_94(width,height) {
	$('#94_fraprioritas_layanan').width(width-14);
	$('#94_fraprioritas_layanan').height(height-40);
}
function fnAddprioritas_layanan_94() {
	$('#94_dlgprioritas_layanan').dialog({
		title: 'Input Data prioritas_layanan',
		width: 510,
		height: 390
	});
	$('#94_divWait').show();
	$('#94_fraprioritas_layanan').hide();
	$('#94_fraprioritas_layanan').attr('src','<?php echo base_url(); ?>index.php/md_prioritas_layanan/fnprioritas_layananAdd');
	$('#94_dlgprioritas_layanan').window('open');
}
function fnEditprioritas_layanan_94() {
	var singleRow = $('#94_dtgprioritas_layanan').datagrid('getSelected');
	if(singleRow) {
		$('#94_dlgprioritas_layanan').dialog({
			title: 'Edit Data Prioritas_layanan',
			width: 510,
			height: 390
		});
		$('#94_divWait').show();
		$('#94_fraprioritas_layanan').hide();
						
		$('#94_fraprioritas_layanan').attr('src','<?php echo base_url(); ?>index.php/md_prioritas_layanan/fnprioritas_layananEdit/'+singleRow.id_prioritas);
				

		$('#94_dlgprioritas_layanan').window('open');
	} else {
		alert('Select which prioritas_layanan data you want to edit.');
	}
}
function fnSelectprioritas_layanan_94() {
	var singleRow = $('#94_dtgprioritas_layanan').datagrid('getSelected');
	if(singleRow) {
		var vprioritas_layananId = singleRow.prioritas_layanan_uid;
		var vprioritas_layananLogin = singleRow.prioritas_layanan_ulogin;
		$('#94_dlgprioritas_layanan').dialog({
			title: 'Select prioritas_layanan for '+vprioritas_layananLogin,
			width: 365,
			height: 290
		});
		$('#94_divWait').show();
		$('#94_fraprioritas_layanan').hide();
				
		$('#94_fraprioritas_layanan').attr('src','<?php echo base_url(); ?>index.php/md_prioritas_layanan/fnprioritas_layananChoose/'+vid_prioritas);
				
		$('#94_dlgprioritas_layanan').window('open');
	} else {
		alert('Select prioritas_layanan Datagrid row first.');
	}
}
function fnDeleteprioritas_layanan_94() {
	var singleRow = $('#94_dtgprioritas_layanan').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_prioritas_layanan/fnprioritas_layananDelete/',{Id:singleRow.id_prioritas},function(result) {
				
					if (result.success) {
						$('#94_dtgprioritas_layanan').datagrid('reload');
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