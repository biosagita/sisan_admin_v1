<!doctype html>
<html>
    <head>
        <title>Bar Chart</title>
        <link href="<?php echo base_url();?>assets/chartjs/demo.css" rel="stylesheet" type="text/css">
        <script src="<?php echo base_url();?>assets/chartjs/Chart.min.js"></script>
        <script src="<?php echo base_url();?>assets/chartjs/legend.js"></script>
    </head>
    <body>
        <div style="width: 960px;margin:auto;">
            <h3 style="text-align:center;"><?php echo $data_company['f_comp_name']; ?></h3>
            <h3 style="text-align:center;">Chart Waktu Tunggu Antrian</h3>
            <h3 style="text-align:center;">Periode : <?php echo $result['periode']; ?></h3>
            <div style="margin:10px;">
                <canvas id="canvas" height="500" width="940"></canvas>
            </div>
            <div>
                <h4 style="margin-bottom:10px;">Keterangan :</h4>
                <ul style="margin:0;">
                    <?php $cnt = 1; ?>
                    <?php foreach($result['keterangan'] as $key2 => $val2) : ?>
                        <li><?php echo $cnt; ?>. <?php echo $val2; ?></li>
                        <?php $cnt++; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <script>
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

    var barChartData = {
        labels : [<?php echo implode(',', $result['list_x']); ?>],
        datasets : [
        {
                fillColor : "<?php echo $result['listwarna'][0][0]; ?>",
                strokeColor : "<?php echo $result['listwarna'][0][1]; ?>",
                highlightFill : "<?php echo $result['listwarna'][0][2]; ?>",
                highlightStroke : "<?php echo $result['listwarna'][0][3]; ?>",
                data : [<?php echo implode(',', $result['list_y']); ?>],
                label : "<?php echo $result['legend'][0]; ?>"
            }
        ]

    }
    window.onload = function(){
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx).Bar(barChartData, {
            responsive : true
        });
        legend(document.getElementById("barLegend"), barChartData);
    }

    </script>
    </body>
</html>
