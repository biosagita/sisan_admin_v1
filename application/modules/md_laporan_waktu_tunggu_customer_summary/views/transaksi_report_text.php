<?php
function average_time($total, $count, $rounding = 0) {
    $total = explode(":", strval($total));
    if (count($total) !== 3) return false;
    $sum = $total[0]*60*60 + $total[1]*60 + $total[2];
    $average = $sum/(float)$count;
    $hours = floor($average/3600);
    $minutes = floor(fmod($average,3600)/60);
    $seconds = number_format(fmod(fmod($average,3600),60),(int)$rounding);
    return ($hours < 10 ? ('0' . $hours) : $hours).":".($minutes < 10 ? ('0' . $minutes) : $minutes).":".($seconds < 10 ? ('0' . $seconds) : $seconds);
}

function sum_time($total_time_h, $total_time_m, $total_time_s) {
	$total_time_s_exceed = floor($total_time_s / 60);
	$second = $total_time_s % 60;

	$total_time_m += $total_time_s_exceed;
	$total_time_m_exceed = floor($total_time_m / 60);
	$minute = $total_time_m % 60;

	$total_time_h += $total_time_m_exceed;
	$total_time_h_exceed = floor($total_time_h / 60);
	//$hour = $total_time_h % 60;
	$hour = $total_time_h;

	return $hour . ':' . $minute . ':' . $second;
}
?>

<html>
<body style="font-size:12px;">
<?php 

print"<table width=100%>
			<tr><td><b>".$data_company['f_comp_name']."</b> 
			<tr><td>

			<tr><th><font size=12px>Data Laporan Waktu Tunggu Summary Antrian</font><BR> 
		</table>";
print"<p></p>";
$tgl=date("d-m-Y");
print"<table width=100%>
			<tr><td width=10%>Tanggal Cetak:<td> : $tgl		 
		</table>";

print"<table width=100% border=1 cellpadding=3 cellspacing=0 >
			<tr><th width=5%  > NO
				 <th width=20% > Info
				 <th width=10% > Tanggal Transaksi		 
				 <th width=10% > Rata-Rata			 
";

$no=1;			

$total_time_h = 0;
$total_time_m = 0;
$total_time_s = 0;
foreach($data_master as $data_master_result):
  	print"<tr>
  			<td align=center width=5% >$no
  	
  			<td align=center  >".$data_master_result['info']."
  			<td align=center >".$data_master_result['tanggal_transaksi']."
  			<td align=center >".$data_master_result['rata_rata']."

  			";
  			
$tmp = explode(':', $data_master_result['rata_rata']);
$total_time_h += (int) $tmp[0];
$total_time_m += (int) $tmp[1];
$total_time_s += (int) $tmp[2];

$no++;  			
endforeach;
?>

<tr>
			<td align=center colspan=3>Average Time
			<td align=center><?php echo average_time(sum_time($total_time_h, $total_time_m, $total_time_s), ($no-1)); ?>

</body>
</html>