<div id="93_tlbwaktu_layanan" style="padding:5px;">
	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddwaktu_layanan_93()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditwaktu_layanan_93()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeletewaktu_layanan_93()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="93_txtwaktu_layanan" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_93()">Find</a>
	</div>
</div>
<table id="93_dtgwaktu_layanan" class="easyui-datagrid" data-options="title:'Data waktu_layanan',url:'<?php echo base_url(); ?>index.php/md_waktu_layanan/fnwaktu_layananData/',toolbar:'#93_tlbwaktu_layanan',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'waktu_awal_1',title:'<b>Waktu Awal 1</b>',width:120,sortable:true" halign="center"></th>
           
		   <th data-options="field:'waktu_akhir_1',title:'<b>Waktu Akhir 1</b>',width:120,sortable:true" halign="center"></th>
           
		   <th data-options="field:'waktu_awal_2',title:'<b>Waktu Awal 2</b>',width:120,sortable:true" halign="center"></th>
           
		   <th data-options="field:'waktu_akhir_2',title:'<b>Waktu Akhir 2</b>',width:120,sortable:true" halign="center"></th>
           
		   <th data-options="field:'waktu_awal_3',title:'<b>Waktu Awal 3</b>',width:120,sortable:true" halign="center"></th>
           
		   <th data-options="field:'waktu_akhir_3',title:'<b>Waktu Akhir 3</b>',width:120,sortable:true" halign="center"></th>
           
		   <th data-options="field:'keterangan',title:'<b>Keterangan</b>',width:150,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
<div id="93_dlgwaktu_layanan" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_93(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="93_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/antrian_admin/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="93_frawaktu_layanan" id="93_frawaktu_layanan" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_93() {
	$('#93_dtgwaktu_layanan').datagrid('load',{
		waktu_layananKeyword: $('#93_txtwaktu_layanan').val()
	});
}
function fnResize_93(width,height) {
	$('#93_frawaktu_layanan').width(width-14);
	$('#93_frawaktu_layanan').height(height-40);
}
function fnResize_93(width,height) {
	$('#93_frawaktu_layanan').width(width-14);
	$('#93_frawaktu_layanan').height(height-40);
}
function fnAddwaktu_layanan_93() {
	$('#93_dlgwaktu_layanan').dialog({
		title: 'Input Data waktu_layanan',
		width: 510,
		height: 390
	});
	$('#93_divWait').show();
	$('#93_frawaktu_layanan').hide();
	$('#93_frawaktu_layanan').attr('src','<?php echo base_url(); ?>index.php/md_waktu_layanan/fnwaktu_layananAdd');
	$('#93_dlgwaktu_layanan').window('open');
}
function fnEditwaktu_layanan_93() {
	var singleRow = $('#93_dtgwaktu_layanan').datagrid('getSelected');
	if(singleRow) {
		$('#93_dlgwaktu_layanan').dialog({
			title: 'Edit Data Waktu_layanan',
			width: 510,
			height: 390
		});
		$('#93_divWait').show();
		$('#93_frawaktu_layanan').hide();
						
		$('#93_frawaktu_layanan').attr('src','<?php echo base_url(); ?>index.php/md_waktu_layanan/fnwaktu_layananEdit/'+singleRow.id_waktu_layanan);
				

		$('#93_dlgwaktu_layanan').window('open');
	} else {
		alert('Select which waktu_layanan data you want to edit.');
	}
}
function fnSelectwaktu_layanan_93() {
	var singleRow = $('#93_dtgwaktu_layanan').datagrid('getSelected');
	if(singleRow) {
		var vwaktu_layananId = singleRow.waktu_layanan_uid;
		var vwaktu_layananLogin = singleRow.waktu_layanan_ulogin;
		$('#93_dlgwaktu_layanan').dialog({
			title: 'Select waktu_layanan for '+vwaktu_layananLogin,
			width: 365,
			height: 290
		});
		$('#93_divWait').show();
		$('#93_frawaktu_layanan').hide();
				
		$('#93_frawaktu_layanan').attr('src','<?php echo base_url(); ?>index.php/md_waktu_layanan/fnwaktu_layananChoose/'+vid_waktu_layanan);
				
		$('#93_dlgwaktu_layanan').window('open');
	} else {
		alert('Select waktu_layanan Datagrid row first.');
	}
}
function fnDeletewaktu_layanan_93() {
	var singleRow = $('#93_dtgwaktu_layanan').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_waktu_layanan/fnwaktu_layananDelete/',{Id:singleRow.id_waktu_layanan},function(result) {
				
					if (result.success) {
						$('#93_dtgwaktu_layanan').datagrid('reload');
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