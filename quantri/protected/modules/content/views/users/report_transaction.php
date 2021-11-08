

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div class="widget-box">
    <div class="widget-header">
        <h4>Thống Kế Người Dùng</h4>
    </div>
    <div class="widget-body">
        <div class="report" id="reportUser" style="background:#f75030;">
            <label><b>Số người dùng hệ thống</b><?php echo $data ?></label>
            <ul>
                <li><b>Đăng ký mới/ Day  </b><?php echo $dataNow ?></li>
                <li><b>Đăng ký mới/ Week  </b><?php echo $dataWeek ?></li>
                <li><b>Đăng ký mới/ Month </b><?php echo $dataMonth ?></li>
            </ul>
        </div>
        <div class="report" id="reportUserActive" style="background:#639613;">
            <label><b>Activated </b><?php echo $dataActive ?></label>
            <label><b>Not activated</b><?php echo $dataNotActive ?></label>

        </div>
       
        <div id="container"  style="min-width: 310px; max-width: 600px; margin: 0 auto">
                
        </div>
    </div>
</div>

<script type="text/javascript">
    Highcharts.setOptions({
            time: {
                timezone: 'Asia/Ho_Chi_Minh'
            }
        });
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Thống kê level user trong hệ thống'
    },
  
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: <?php echo $dataLevelArr ?>
    }]
});
    </script>

