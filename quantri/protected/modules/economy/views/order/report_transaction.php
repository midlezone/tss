

<script src="https://dev-cms.retail.myc.mvalpay.net/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="https://dev-cms.retail.myc.mvalpay.net/assets/js/pages/form-select2.js"></script>
<script src="https://dev-cms.retail.myc.mvalpay.net/assets/plugins/select2/js/select2.min.js"></script>
<script src="https://dev-cms.retail.myc.mvalpay.net/assets/plugins/highchart/highcharts.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<script src="https://dev-cms.retail.myc.mvalpay.net/assets/plugins/moment/moment.js"></script>
<script src="https://dev-cms.retail.myc.mvalpay.net/assets/plugins/moment/moment-timezone-with-data.js"></script>
<script src="/quantri/js/custom.js"></script>
    <link href="https://dev-cms.retail.myc.mvalpay.net/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
    <link href="https://dev-cms.retail.myc.mvalpay.net/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>


<div class="widget-body">
    <div class="widget-header">
        <h4>Thống Kế Doanh Thu</h4>
    </div>
    <div class="widget-main">
        <div class="search-active-form" style="position: relative; margin-top: 10px;">
            <form class="form-inline filterByDate" method="GET" action="/quantri/economy/order/ReportTransaction">
                   <div class="modal fade" id="custom_term" tabindex="-1" role="dialog" aria-labelledby="custom_term" aria-hidden="true">
                      <div class="modal-dialog modal-sm">
                         <div class="modal-content">
                            <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                               <h4 class="modal-title" id="modaltitle">Tùy chọn thời gian</h4>
                            </div>
                            <div class="modal-body">
                               <div class="form-group">
                                  <label class="sr-only" for="">From</label>
                                  <input type="text" class="form-control date-picker" id="date_from" name="date_from" style="width:auto!important;" value="" readonly="" required="" placeholder="Bắt đầu">
                               </div>
                               <div class="form-group">
                                  <label class="sr-only" for="">Tới</label>
                                  <input type="text" class="form-control date-picker" name="date_to" id="date_to" style="width:auto!important;" value="" readonly="" required="" placeholder="Kết thúc">
                               </div>
                            </div>
                            <div class="modal-footer">
                               <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
                               <button type="button" id="custom_date_filter" class="btn btn-danger">Gửi</button>
                            </div>
                         </div>
                      </div>
                   </div>
                   <input type="hidden" name="type" value="">
                   <div class="form-group">
                      <div class="btn-group">
                        <?php if (!isset($filter_days) ||  $filter_days == 7): ?>
                          <button type="button" value="7" class="btn btn-default filter  active ">7 ngày</button>
                        <?php else: ?>  
                            <button type="button" value="7" class="btn btn-default filter">7 ngày</button>
                        <?php endif; ?>

                        <?php if (isset($filter_days) && $filter_days == 30): ?>
                          <button type="button" value="30" class="btn btn-default filter active">30 ngày</button>
                        <?php else: ?>  
                           <button type="button" value="30" class="btn btn-default filter ">30 ngày</button>
                        <?php endif; ?>

                         <?php if (isset($filter_days) && $filter_days == 90): ?>
                           <button type="button" value="90" class="btn btn-default filter active">90 ngày</button>
                        <?php else: ?>  
                           <button type="button" value="90" class="btn btn-default filter ">90 ngày</button>
                        <?php endif; ?>                     
                        

                         <button type="button" class="btn btn-default " 
                         data-toggle="modal" data-target="#custom_term"> Tùy chỉnh</button>
                         <input type="hidden" id="filter_days" name="filter_days" value=" 7 ">
                      </div>
                   </div>
            </form>
        </div>
    </div>
    
     <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    
</div>

<script type="text/javascript">
    Highcharts.setOptions({
            time: {
                timezone: 'Asia/Ho_Chi_Minh'
            }
        });
    
    Highcharts.chart('container', {
     time:{
        useUTC:false
     },
     chart: {
        height: 400,
     },
      title: {
          text: 'Báo cáo Doanh Thu'
      },

      subtitle: {
                text: 'Tổng: 1000 VNĐ'
            },
      exporting: {
                buttons: {
                    customButton: {
                        text: 'Chi tiết',
                        onclick: function () {
                            var url="{{route('balance.index')}}?vendor_id={{request('vendor_id')}}&date_from={{get_date_range()['from']}}&date_to={{get_date_range()['to']}}&status=1&&balance_type=1";
                            var win = window.open(url, '_blank');
                            win.focus();
                        }
                    },
                }
         },

       yAxis: {
          title: {
               text: 'VNĐ'
          }
      },
       xAxis: {
                type: 'datetime',
            },

       legend: {
                enabled: false
            },


        plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    marker: {
                        enabled: false
                    },
                }
            },

      series: [{
          name: 'Doanh Thu',
          data: <?php echo $report ?>,
          pointStart: <?php echo $start_date ?>000,
          pointInterval: 86400 * 1000
      }],

     responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

  });

    </script>
