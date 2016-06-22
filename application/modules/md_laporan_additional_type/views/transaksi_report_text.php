<html>
<body style="font-size:12px;">
<?php 

print"<table width=100%>
			<tr><td><b>".$data_company['f_comp_name']."</b> 
			<tr><td>

			<tr><th><font size=12px>Data Laporan Additional Type</font><BR> 
		</table>";
print"<p></p>";
$tgl=date("d-m-Y");
print"<table width=100%>
			<tr><td width=10%>Tanggal Cetak:<td> : $tgl		 
		</table>";

print"<table width=100% border=1 cellpadding=3 cellspacing=0 >
			<tr><th width=5%  > NO
				 <th width=10% > No Antrian 
				 <th width=40% > Info 
				 <th width=30% > Note		 
				 <th width=15% > Entry Date
";

$no=1;			
foreach($data_master as $data_master_result):
  	print"<tr>
  			<td align=center width=5% >$no
  	
  			<td>".$data_master_result['no_antrian']."
  			<td>".$data_master_result['adty_type_info']."
  			<td>".$data_master_result['adty_note']."
  			<td>".$data_master_result['adty_entrydate']."

  			";
  			
$no++;  			
endforeach;
?>
</body>
</html>