<html>
<body style="font-size:12px;">
<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename = data_antrian.xls");
header("Pragma: no-cache");
header("Expires: 0"); 

print"<table width=100%>
			<tr><td><b>".$data_company['f_comp_name']."</b> 
			<tr><td>

			<tr><th><font size=12px>Data Laporan Jumlah Per Layanan Antrian</font><BR> 
		</table>";
print"<p></p>";
$tgl=date("d-m-Y");
print"<table width=100%>
			<tr><td width=10%>Tanggal Cetak:<td> : $tgl		 
		</table>";

print"<table width=100% border=1 cellpadding=3 cellspacing=0 >
			<tr><th width=5%  > NO
				 <th width=20% > Info
				 <th width=20% > Tanggal Transaksi 
				 <th width=20% > Jumlah Customer	 
				 <th width=20% > Jumlah Customer Skip
				 <th width=20% > Jumlah Customer Tak Terlayani
";

$no=1;			

$total_customer 				= 0;
$total_customer_skip 			= 0;
$total_customer_tidak_terlayani = 0;
foreach($data_master as $data_master_result):
  	print"<tr>
  			<td align=center width=5% >$no
  			<td align=center  >".$data_master_result['info']."
  			<td align=center  >".$data_master_result['tanggal_transaksi']."
  			<td align=center >".$data_master_result['jumlah_customer']."
  			<td align=center >".$data_master_result['jumlah_customer_skip']."
  			<td align=center >".$data_master_result['jumlah_customer_tidak_terlayani']."

  			";
  		
$total_customer 				+= $data_master_result['jumlah_customer'];
$total_customer_skip 			+= $data_master_result['jumlah_customer_skip'];
$total_customer_tidak_terlayani += $data_master_result['jumlah_customer_tidak_terlayani'];	
$no++;  			
endforeach;
?>

<tr>
			<td align=center colspan=3>Total
			<td align=center><?php echo $total_customer; ?>
			<td align=center><?php echo $total_customer_skip; ?>
			<td align=center><?php echo $total_customer_tidak_terlayani; ?>
				
</body>
</html>