<html>
<body style="font-size:12px;">
<?php 

print"<table width=100%>
			<tr><td><b>".$data_company['f_comp_name']."</b> 
			<tr><td>

			<tr><th><font size=12px>Data Laporan Waktu Tunggu Antrian</font><BR> 
		</table>";
print"<p></p>";
$tgl=date("d-m-Y");
print"<table width=100%>
			<tr><td width=10%>Tanggal Cetak:<td> : $tgl		 
		</table>";

print"<table width=100% border=1 cellpadding=3 cellspacing=0 >
			<tr><th width=5%  > NO
				 <th width=20% > Tanggal Transaksi
				 <th width=10% > No Ticket		 
				 <th width=2% > Waktu Ambil
				 <th width=25% > Waktu Tunggu
				 <th width=15% > Waktu Panggil
				 <th width=10% > Layanan			 
				 <th width=10% > User
				 <th width=10% > Loket				 
";

$no=1;			
foreach($data_master as $data_master_result):
  	print"<tr>
  			<td align=center width=5% >$no
  	
  			<td align=center  >".$data_master_result['tanggal_transaksi']."
  			<td align=center >".$data_master_result['no_ticket']."
  			<td align=center >".$data_master_result['waktu_ambil']."
  			<td  >".$data_master_result['waktu_tunggu']."
  			<td align=center >".$data_master_result['waktu_panggil']."
  			<td  >".$data_master_result['id_layanan']."
  			<td align=center >".$data_master_result['id_user']."
  			<td  >".$data_master_result['id_loket']."

  			";
  			
$no++;  			
endforeach;
?>
</body>
</html>