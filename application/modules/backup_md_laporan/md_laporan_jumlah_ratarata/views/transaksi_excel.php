<html>
<body style="font-size:12px;">
<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename = data_antrian.xls");
header("Pragma: no-cache");
header("Expires: 0"); 

print"<table width=100%>
			<tr><td><b>Imigrasi Jakarta Utara</b> 
			<tr><td>

			<tr><th><font size=12px>Data Laporan Jumlah Rata-Rata Antrian</font><BR> 
		</table>";
print"<p></p>";
$tgl=date("d-m-Y");
print"<table width=100%>
			<tr><td width=10%>Tanggal Cetak:<td> : $tgl		 
		</table>";

print"<table width=100% border=1 cellpadding=3 cellspacing=0 >
			<tr><th width=5%  > NO
				 <th width=20% > Tanggal Transaksi 
				 <th width=10% > Loket		 
				 <th width=12% > Rata-Rata				 
";

$no=1;			
foreach($data_master as $data_master_result):
  	print"<tr>
  			<td align=center width=5% >$no
  	
  			<td align=center  >".$data_master_result['tanggal_transaksi']."
  			<td align=center >".$data_master_result['id_loket']."
  			<td align=center >".$data_master_result['rata-rata']."

  			";
  			
$no++;  			
endforeach;
?>
</body>
</html>